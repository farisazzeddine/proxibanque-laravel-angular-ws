<?php

namespace App\Http\Controllers;
use App\User;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();

        return response()->json($client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $client = new Client;
        $client->nom = request('name');
        $client->prenom = request('prenom');
        $client->adresse = request('adresse');
        $client->codePostal = request('codePostal');
        $client->ville = request('ville');
        $client->telephone = request('telephone');
        $client->compteCourant =  request('compteCourant');
        $client->compteEpargne = request('compteEpargne');
        $client->save();
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
        return response()->json($client);
    }
}
