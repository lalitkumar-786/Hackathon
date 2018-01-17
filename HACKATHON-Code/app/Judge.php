<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    protected $table = "judge_stats";
    protected $primaryKey = "submission_id";
}
