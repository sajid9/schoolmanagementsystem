<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examination_attendence extends Model
{
	protected $table = 'examination_attendence';
	protected $fillable = ['admission_id','exam_schedule_id','is_active','attendenceDate','lec_type' ];
}
