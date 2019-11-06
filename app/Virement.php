<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Virement extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function opVirement(){
        return $this->belongsTo('App\Operation','operation_id','id');
    }
}
