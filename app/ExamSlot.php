<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSlot extends Model
{
    protected $fillable = ['classRoom_id','day_id','examTime_id','slot_date'];

    public function examTimes()
    {
    	return $this->hasOne('App\ExamTime','id','examTime_id');
    }
    public function days()
    {
    	return $this->hasOne('App\Day','id','day_id');
    }

    public function classRooms()
    {
    	return $this->hasOne('App\ClassRoom','id','classRoom_id');
    }
}
