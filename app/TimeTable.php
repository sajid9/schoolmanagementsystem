<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
     protected $fillable = ['period_id','subject_id','batch_id'];

    public function periods()
    {
    	return $this->hasOne('App\Period','id','period_id');
    }
    public function subjects()
    {
    	return $this->hasOne('App\Subject','id','subject_id');
    }

    public function batches()
    {
    	return $this->hasOne('App\Batch','id','batch_id');
    }
}
