<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Gerant extends User
{
     use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function settingGer(){
        return $this->hasMany('App\Setting','Gerant_id','id');
    }
    
}
