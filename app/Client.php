<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function compte(){
        return $this->hasOne('App\Compte');
    }
}
