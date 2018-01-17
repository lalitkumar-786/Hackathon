<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discussion_replies extends Model
{
    protected $table = 'discussion_replies';
    protected $primaryKey = ['id','username','created_at'];
    public $incrementing = false;
  
}
