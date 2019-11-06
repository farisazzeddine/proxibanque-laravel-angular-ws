<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function operation(){
        return $this->belongsToMany('App\Operation');
    }
    public function compteEpargne(){
        return $this->hasMany('App\CompteEpargne','Compte_id','id');
    }
    public function compteCourant(){
        return $this->hasMany('App\CompteCourant','Compte_id','id');
    }
}
