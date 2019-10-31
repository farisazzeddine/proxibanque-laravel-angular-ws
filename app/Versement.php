<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
