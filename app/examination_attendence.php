<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examination_attendence extends Model
{
	protected $table = 'examination_attendence';
	protected $fillable = ['admission_id','exam_schedule_id','is_active','attendenceDate','lec_type' ];

	public function examschedule()
	{
		return $this->hasOne('App\ExamSchedule','id','exam_schedule_id');
	}
	public function admission()
	{
		return $this->hasOne('App\Admission','id','admission_id');
	}
}
