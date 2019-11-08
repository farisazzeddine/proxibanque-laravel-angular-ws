<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Setting extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function gerant(){
        return $this->belongsTo('App\Gerant','Gerant_id','id');
    }
    public function agence(){
        return $this->belongsTo('App\Agence','Agence_id','id');
    }
}
