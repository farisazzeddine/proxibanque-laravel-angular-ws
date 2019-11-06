<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompteCourant extends Model
{
    public function clientcptCourant(){
        return $this->belongsToMany('App\Compte');
    }
}
