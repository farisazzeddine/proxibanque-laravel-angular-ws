<?php

namespace App\Http\Controllers;
use App\Agence;

use Illuminate\Http\Request;

class AgenceController extends Controller
{
    public function index(){
        $agence = Agence::all();
        return response()->json($agence);
    }

    public function create(){
        $agence = new Agence;
        $agence->nomAgence = request('nomAgence');
        $agence->save();
        return response()->json($agence);
    }
    public function show($idAgence){
        $agence = Agence::findOrFail($idAgence);
        return response()->json($agence);
    }
    public function update($idAgence){
        $agence = Agence::findOrFail($idAgence);
        $agence->nomAgence = request('nomAgence');
        $agence->update();
    }
    public function destroy($idAgence){
        $agence = Agence::findOrFail($idAgence);
        $agence->delete();
    }
}
