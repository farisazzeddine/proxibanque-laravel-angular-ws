<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $dates = ['deleted_at'];
}
