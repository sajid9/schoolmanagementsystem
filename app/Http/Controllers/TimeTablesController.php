<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\TimeTable;
use App\Period;
use App\Time;
use App\Day;
use App\ClassRoom;
use App\Batch;
use App\Attendence;

class TimeTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $timeTables = TimeTable::with('periods.times','periods.days','periods.classRooms','subjects','batches.classes','batches.sections','batches.years')->get();
          // dd($timeTables);
        return view('pages.timeTable.timeTable-list',compact('timeTables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $periods = Period::all();
        $subjects = Subject::all();
        $batches = Batch::all();
         return view('pages.timeTable.timeTables',compact('periods','subjects','batches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
  
      'period_id' => 'required',
      'subject_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $timeTables = TimeTable::create($values);
        // return back();
       return redirect()->to('timeTable-list')->with(compact('timeTables'))->with('message', 'TimeTable added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $periods = Period::all();
        $subjects = Subject::all();
        $batches = Batch::all();
        $timeTables = TimeTable::find($id);
        return view('pages.timeTable.editTimeTable ',compact('periods','subjects','timeTables','batches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          $request->validate([
      
      'period_id' => 'required',
      'subject_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $timeTables = TimeTable::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('timeTable-list')->with('message', 'TimeTable updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $timeTables = TimeTable::find($request->id);
        if($timeTables->delete()) {
            return redirect()->to('timeTable-list')->with('message','TimeTable deleted successfully');
        }
    }

    public function attendence(Request $request,$id)
    {
       $data = TimeTable::with('batches.classenroll.admissions.registrations','batches.sections','subjects','periods.times','periods.days')->where('id',$request->id)->first();

       return view('pages.attendence.attendence-list ',compact('data'));

        // $items = DB::table('receipt_detail')->leftJoin('items','receipt_detail.item_id','=','items.id')->where('receipt_detail.type','return')->where('receipt_detail.receipt_id',$id)->get();
          // $attendence =TimeTable::with('batches.classes','batches.sections')->get();
          // dd($attendence);
        // return view('pages.timeTable.timeTable-list',compact('timeTables'));
    }


public function markattendence(Request $request)
    {
      dd($request->all());
    }
}
