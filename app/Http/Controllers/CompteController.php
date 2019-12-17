<?php

namespace App\Http\Controllers;

use App\Compte;
use App\CompteCourant;
use App\CompteEpargne;
use Illuminate\Http\Request;


class CompteController extends Controller
{
    public function getCompte(){  
        $compte = Compte::with('compteEpargne','compteCourant')->get();
        return response()->json($compte);
    }
    public function create(){
        
    }
}
