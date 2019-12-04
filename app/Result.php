<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
     protected $fillable = ['admission_id','examSchedule_id','total_marks','obtain_marks','pass_marks','grade_id'];

    public function admissions()
    {
    	return $this->hasOne('App\Admission','id','admission_id');
    }
    public function examSchedules()
    {
    	return $this->hasOne('App\ExamSchedule','id','examSchedule_id');
    }

    public function grades()
    {
    	return $this->hasOne('App\Grade','id','grade_id');
    }
}
