<?php

namespace App\helpers;
use DB;
use App\TimeTable;
use App\examination_attendence;
class CustomHelper{
	public function getsubject($day,$time)
	{
		return TimeTable::with('periods.times','periods.days','periods.classRooms','subjects','batches.classes','batches.sections','batches.years')->whereHas('periods.days',function($q) use ($day){
				$q->where('day_name',$day);
			})->whereHas('periods.times',function($q) use ($time){
				$q->where('time_name',$time);
			})->first();
	}
	public function MEA($scheduleId,$admissionId)
	{
		return examination_attendence::where('exam_schedule_id',$scheduleId)->where('admission_id',$admissionId)->first();
	}
}
?>