<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
     protected $fillable = ['admission_id','timeTable_id','is_active','attendenceDate','lec_type'];

      public function admissions()
    {
    	return $this->hasOne('App\Admission','id','admission_id');
    }

    public function timeTables()
    {
    	return $this->hasOne('App\TimeTable','id','timeTable_id');
    }
}
