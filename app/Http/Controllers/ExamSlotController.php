<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamTime;
use App\Day;
use App\ClassRoom;
use App\ExamSlot;

class ExamSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examSlots = ExamSlot::with('examTimes','days','classRooms')->get();
        return view('pages.examSlot.examSlot-list',compact('examSlots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $examTimes = ExamTime::all();
        $days = Day::all();
        $classRooms = ClassRoom::all();
         return view('pages.examSlot.examSlot',compact('examTimes','days','classRooms'));
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
      
      'examTime_id' => 'required',
      'day_id' => 'required',
      'classRoom_id' => 'required',
      'slot_date' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $examSlots = ExamSlot::create($values);
        // return back();
       return redirect()->to('examSlot-list')->with(compact('examSlots'))->with('message', 'ExamSlot added successfully');
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
         $examTimes = ExamTime::all();
        $days = Day::all();
        $classRooms = ClassRoom::all();
        $examSlots = ExamSlot::find($id);
        return view('pages.examSlot.editExamSlot ',compact('examTimes','days','classRooms','examSlots'));
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
      
      'examTime_id' => 'required',
      'day_id' => 'required',
      'classRoom_id' => 'required',
      'slot_date' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $examSlots = ExamSlot::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('examSlot-list')->with('message', 'ExamSlot updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $examSlots = ExamSlot::find($request->id);
        if($examSlots->delete()) {
            return redirect()->to('examSlot-list')->with('message','ExamSlot deleted successfully');
        }
    }
}
