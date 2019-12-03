<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $fillable = ['examSlot_id','class_id','subject_id','examTerm_id'];

    public function examSlots()
    {
    	return $this->hasOne('App\ExamSlot','id','examSlot_id');
    }
    public function subjects()
    {
    	return $this->hasOne('App\Subject','id','subject_id');
    }

    public function classes()
    {
    	return $this->hasOne('App\MClass','id','class_id');
    }

    public function examTerms()
    {
    	return $this->hasOne('App\ExamTerm','id','examTerm_id');
    }
}
