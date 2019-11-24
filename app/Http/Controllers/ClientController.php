<?php

namespace App\Http\Controllers;

use App\CarteBancaire;
use App\User;
use App\Client;
use App\Conseiller;
use App\Compte;
use App\Agence;
use App\CompteCourant;
use App\CompteEpargne;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
//use App\Http\Resources\ClientResource;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::orderByDesc('id')->with('compte')->get(); 
        
        return response()->json($client);
        // return ClientResource::collection(Client::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $client = new Client;
        $client->Conseiller_id = 1;
        $client->Agence_id=request("agence");
        $client->nom = request('name');
        $client->prenom = request('prenom');
        $client->adresse = request('adresse');
        $client->cin = request('cin');
        $client->codePostal = request('codePostal');
        $client->ville = request('ville');
        $client->telephone = request('telephone');
        $client->compteCourant =  request('compteCourant');
        $client->compteEpargne = request('compteEpargne');
        $client->save();
        
            $conseillers = new Conseiller;
            $conseillers->Conseiller_id=1;
            $conseillers->Client_id =$client->id;
            $conseillers->save();
        
        if($client->compteCourant == true){
            $comptes = new Compte();
            $comptes->client_id = $client->id;
            $comptes->numCompte = Str::uuid();
            $comptes->solde = request('solde');
            // request('sold');
            $comptes->save();

            $compteCourant = new CompteCourant();
            $compteCourant->Compte_id = $comptes->id;
            $compteCourant->montant = $comptes->solde;
            $compteCourant->carteBancaire = request('cartebancaire');
            // ;
            $compteCourant->save();

            if($compteCourant->carteBancaire == true){
                $carteBancaire = new CarteBancaire();
                $carteBancaire->numCartebancair = Str::uuid();
                $idsc = rand(1000, 9999);
                $carteBancaire->codeSecretCarte = $idsc;
                $ldate = (date('Y')+5)."-".date('m')."-".date('d');
                $carteBancaire->dateExperation = $ldate;
                $carteBancaire->typeCarte = "Visa";
                $carteBancaire->save();  
            }
        }else{
            $comptes = new Compte;
            $comptes->client_id = $client->id;
            $comptes->numCompte = Str::uuid();
            $comptes->solde = request('solde');
            // request('sold');
            $comptes->save();
            
            $compteEpargnes = new CompteEpargne();
            $compteEpargnes->Compte_id = $comptes->id;
            $compteEpargnes->tauxDeRum = $comptes->solde*0.02+$comptes->solde; 
            $compteEpargnes->save(); 
        }
        return response()->json($client);
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $client->nom = request('name');
        $client->prenom = request('prenom');
        $client->adresse = request('adresse');
        $client->codePostal = request('codePostal');
        $client->ville = request('ville');
        $client->telephone = request('telephone');
        $client->compteCourant =  request('compteCourant');
        $client->compteEpargne = request('compteEpargne');
        $client->update();
        return response()->json($client);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        $Compte_id=$id;
        $comptes = Compte::findOrFail($Compte_id);
        $comptes->delete();
        $comptes = CompteCourant::findOrFail($Compte_id);
        $comptes->delete();
        $comptes = CompteEpargne::findOrFail($Compte_id);
        $comptes->delete();

        return response()->json($client);
    }
}
