<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upload_private extends Model
{
    protected $table = "upload_private";
    protected $primaryKey = ['username','filename'];
    public $incrementing = false;
}
