<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $fillable = ['examSlot_id','batch_id','subject_id','examTerm_id'];

    public function examSlots()
    {
    	return $this->hasOne('App\ExamSlot','id','examSlot_id');
    }
    public function subjects()
    {
    	return $this->hasOne('App\Subject','id','subject_id');
    }

    public function batches()
    {
    	return $this->hasOne('App\Batch','id','batch_id');
    }

    public function examTerms()
    {
    	return $this->hasOne('App\ExamTerm','id','examTerm_id');
    }
}
