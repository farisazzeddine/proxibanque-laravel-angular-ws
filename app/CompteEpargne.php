<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompteEpargne extends Model
{
    public function clientcpt(){
        return $this->belongsToMany('App\Compte');
    }
}
