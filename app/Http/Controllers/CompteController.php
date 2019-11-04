<?php

namespace App\Http\Controllers;

use App\Compte;
use App\CompteCourant;
use App\CompteEpargne;
use Illuminate\Http\Request;


class CompteController extends Controller
{
    public function index(){  
        $compte = Compte::with('compteEpargne')->get();
        return response()->json($compte);
    }
    public function create(){
        
    }
}
