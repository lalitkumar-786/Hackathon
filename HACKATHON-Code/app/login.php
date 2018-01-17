<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    //
    protected $table='login';
    protected $primaryKey = 'email';
    public $incrementing = false;
}
