<?php

namespace App\Http\Controllers;
use App\Operation;
use App\Versement;
use App\Virement;
use App\Retrait;

use Illuminate\Http\Request;

class OperationController extends Controller
{
   public function index(){
       $operations = Operation::all();

       return response()->json($operations);

   }
   public function create(){
       $operations = new Operation;
       $operations->numCompte = request('numCompte');
       $operations->montantOperation = request('montantOperation');
       $operations->versement = request('versement');
       $operations->retrait = request('retrait');
       $operations->virement = request('virement');
       $operations->save();

       if($operations->versement == true){
           $versements = new Versement;
           $versements->idOperation = $operations->id;
           $versements->save();
       } elseif($operations->retrait == true){
           $retraits = new Retrait;
           $retraits->idOperation=$operations->id;
           $retraits->save();

       } else{
           $virements = new Virement;
           $virements->idOperation=$operations->id;
           $virements->save();
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
   public function destroy($id,$idOperation){
    $operations = Operation::findOrFail($id);
    $operations->delete();
    $versements = Versement::findOrFail($idOperation);
    $versements->delete();
    $retraits = Retrait::findOrFail($idOperation);
    $retraits->delete();
    $virements = Virement::findOrFail($idOperation);
    $virements->delete();
    return response()->json($operations);
   }
}
