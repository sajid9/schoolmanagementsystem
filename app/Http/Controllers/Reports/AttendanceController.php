<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admission;
use App\Attendence;
use App\MClass;
use App\Section;
use App\TimeTable;
class AttendanceController extends Controller
{
    public function attendance_report($value='')
    {
    	$students = Admission::with('registrations')->get();
    	$classes = MClass::all();
    	$sections = Section::all();
    	$attendance = array();
    	return view('pages.attendence.attendancereport',compact('students','classes','sections','attendance'));
    }
    public function attendance_search(Request $request)
    {
    	$student = $request->student;
    	$class   = $request->class;
    	$section = $request->section;
    	$search  = Attendence::with('admissions.registrations','timeTables.periods.times','timeTables.periods.days','timeTables.periods.classRooms','timeTables.subjects','timeTables.batches.classes','timeTables.batches.sections','timeTables.batches.years');
    	if($student != null){
    		$search->whereHas('admissions',function($q) use($student){
    			$q->where('id',$student);
    		});
    	}
    	if($class != null){
    		$search->whereHas('timeTables.batches',function($q) use($class){
    			$q->where('class_id',$class);
    		});
    	}
    	if($section != null){
    		$search->whereHas('timeTables.batches',function($q) use($section){
    			$q->where('section_id',$section);
    		});
    	}
    	$attendance = $search->get();
    	$students = Admission::with('registrations')->get();
    	$classes = MClass::all();
    	$sections = Section::all();
    	return view('pages.attendence.attendancereport',compact('students','classes','sections','attendance'));
    		
    }
}
