<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function opVersement(){
        return $this->belongsTo('App\Operation','operation_id','id');
    }
}
