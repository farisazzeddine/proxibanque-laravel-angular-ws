<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerant extends User
{
    protected $dates = ['deleted_at'];
    
}
