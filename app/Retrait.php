<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Retrait extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function opRetrait(){
        return $this->belongsToMany('App\Operation');
    }
}
