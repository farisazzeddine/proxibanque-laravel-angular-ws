<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
   
    protected $dates = ['deleted_at'];
    public function settingAg(){
        return $this->hasMany('App\Setting');
    }
}
