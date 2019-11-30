<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
class Operation extends Model
{
   // use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function compte(){
        return $this->hasMany('App\Compte','numCompte','numCompte_id');
    }
    /* les operations Start */
    public function OpertaionRetrait(){
        return $this->hasMany('App\Retrait','operation_id','id');
    }
    public function OpertaionVirement(){
        return $this->hasMany('App\Virement','operation_id','id');
    }
    public function OpertaionVersement(){
        return $this->hasMany('App\Versement','operation_id','id');
    }
    /* les operations End */
}
