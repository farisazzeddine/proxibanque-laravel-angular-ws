<?php

namespace App\Http\Controllers;

use App\Agence;
use App\Gerant;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings =Setting::with('gerant','agence')->get();
        return response()->json($settings);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $settings = new Setting;
        $settings->Gerant_id=1;
        $settings->Agence_id=request('nomAgence');
        $settings->commissionVirement = request('commissionVirement');
        $settings->commissionRetrait = request('commissionRetrait');
        $settings->commissionRetraitCheque = request('commissionRetraitCheque');
        $settings->commissionVersement = request('commissionVersement');
        $settings->fraisOuvertureCompte = request('fraisOuvertureCompte');
        $settings->fraisDotation = request('fraisDotation');
        $settings->choixChangementCrtGuichet = request('choixChangementCrtGuichet');
        $settings->DemandeCheque = request('DemandeCheque');
        $settings->TransferSldEtranger = request('TransferSldEtranger');
        $settings->NbrMxconseillersParclient = request('NbrMxconseillersParclient');  
        $settings->nbrMxconseillers = request('nbrMxconseillers'); 
        $settings->save();
        return response()->json($settings);
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settings = Setting::findOrFail($id);
        return response()->json($settings);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = Setting::findOrFail($id);
       $settings->Gerant_id=1;
        $settings->Agence_id=request('nomAgence');
        $settings->commissionVirement = request('commissionVirement');
        $settings->commissionRetrait = request('commissionRetrait');
        $settings->commissionRetraitCheque = request('commissionRetraitCheque');
        $settings->commissionVersement = request('commissionVersement');
        $settings->fraisOuvertureCompte = request('fraisOuvertureCompte');
        $settings->fraisDotation = request('fraisDotation');
        $settings->choixChangementCrtGuichet = request('choixChangementCrtGuichet');
        $settings->DemandeCheque = request('DemandeCheque');
        $settings->TransferSldEtranger = request('TransferSldEtranger');
        $settings->NbrMxconseillersParclient = request('NbrMxconseillersParclient');  
        $settings->nbrMxconseillers = request('nbrMxconseillers'); 
        $settings->update();
        return response()->json($settings); 
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $settings = Setting::latest('id')->first();
        $settings->delete();
        return response()->json($settings); 
    }
}
