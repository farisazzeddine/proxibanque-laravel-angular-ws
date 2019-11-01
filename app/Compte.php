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
        return $this->hasMany('App\Operation');
    }
}
