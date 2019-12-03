<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Batch;
use App\TimeTable;
class TimetableController extends Controller
{
    public function timetable_report()
    {
    	$batches = Batch::with('classes','sections','years')->get();
    	$timetable =array();
    	return view('pages.timeTable.timetablereport',compact('batches','timetable'));
    }
    public function timetable_search(Request $request)
    {
    	$timetable = TimeTable::with('periods.times','periods.days','periods.classRooms','subjects','batches.classes','batches.sections','batches.years')->where('batch_id',$request->batch)->get();
    	$batches = Batch::with('classes','sections','years')->get();
    	return view('pages.timeTable.timetablereport',compact('batches','timetable'));
    	
    }
}
