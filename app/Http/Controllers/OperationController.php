<?php

namespace App\Http\Controllers;
use App\Compte;
use App\Operation;
use App\Versement;
use App\Virement;
use App\Retrait;
use App\Setting;
use Illuminate\Http\Request;

class OperationController extends Controller
{
   public function getAllOperation(){
  $operations = Operation::with('compte','OpertaionRetrait','OpertaionVirement','OpertaionVersement')->orderBy('id', 'desc')->get();

       return response()->json($operations);

   }
   public function create(){
       $operations = new Operation;
       $operations->numCompte_id = request('numCompte_id');
       $operations->montantOperation = request('montantOperation');
       $operations->versement = request('versement');
       $operations->retrait = request('retrait');
       $operations->virement = request('virement');
       $operations->save();

       $numCompte=$operations->numCompte_id;
       $settings =Setting::with('gerant','agence')->latest('id')->first();

       if($operations->versement == true){
           $versements = new Versement;
           $versements->operation_id = $operations->id;
           $versements->save();
           $comptes = Compte::where('numCompte',$numCompte)->first();
           $comptes->solde=($comptes->solde) + ($operations->montantOperation) - ($settings->commissionVersement);
           $comptes->update();

       } elseif($operations->retrait == true){
           $retraits = new Retrait;
           $retraits->operation_id=$operations->id;
           $retraits->save();
           $comptes = Compte::where('numCompte',$numCompte)->first();
           $comptes->solde=($comptes->solde) - ($operations->montantOperation) - ($settings->commissionRetrait);
           $comptes->update();

       } else{
           $virements = new Virement;
           $virements->operation_id=$operations->id;
           $virements->virementVersCompte=request('virementVersCompte');
           $virements->save();
           $comptes = Compte::where('numCompte',$numCompte)->first();
           $comptes->solde=($comptes->solde) - ($operations->montantOperation) - ($settings->commissionVirement);
           $comptes->update();

           $comptes = Compte::where('numCompte',$virements->virementVersCompte)->first();
           $comptes->solde=($comptes->solde) + ($operations->montantOperation);
           $comptes->update();
       }
       return response()->json($operations);
   }
   public function show($id){
       $operations = Operation::findOrFail($id);
       return response()->json($operations);

   }
   public function edit($id){
    $operations = Operation::findOrFail($id);
    $operations->montantOperation = request('montantOperation');
    $operations->update();

    return response()->json($operations);
   }
   public function destroy($id){
    $operations = Operation::findOrFail($id);
    $operations->delete();
   $versements = Versement::where('idOperation',$id)->delete();
    $versements->delete();
    $retraits = Retrait::where('idOperation',$id)->delete();
    $retraits->delete();
    $virements = Virement::where('idOperation',$id)->delete();
    $virements->delete();
    return response()->json($operations);
   }
}
