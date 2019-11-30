<?php

namespace App\Http\Controllers;
use App\Agence;

use Illuminate\Http\Request;

class AgenceController extends Controller
{
    public function index(){
        $agence = Agence::orderByDesc('id')->get();
        return response()->json($agence);
    }

    public function create(){
        $agence = new Agence();
        $agence->nomAgence = request('nomAgence');
        $agence->adresseAgence = request('adresseAgence');
        $agence->save();
        
    }
    public function show($id){
        $agence = Agence::findOrFail($id);
        return response()->json($agence);
    }
    public function edit($id){
        $agence = Agence::findOrFail($id);
        $agence->nomAgence = request('nomAgence');
        $agence->adresseAgence = request('adresseAgence');
        $agence->update();
    }
    public function destroy($id){
        $agence = Agence::findOrFail($id);
        $agence->delete();
    }
}
