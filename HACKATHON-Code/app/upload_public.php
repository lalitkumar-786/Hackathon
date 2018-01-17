<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upload_public extends Model
{
    protected $table = "upload_public";
    protected $primaryKey = ['username','filename'];
    public $incrementing = false;
}
