<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
   protected $fillable = ['min_marks','max_marks','grade_name'];
}
