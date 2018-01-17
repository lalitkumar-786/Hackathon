<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discussion_thread extends Model
{
    protected $table = 'discussion_thread';
    protected $primaryKey = 'id';
    public $incrementing = true;
  
}
