<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use App\Day;
use App\ClassRoom;
use App\Period;

class PeriodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::with('times','days','classRooms')->get();
        return view('pages.period.periods-list',compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $times = Time::all();
        $days = Day::all();
        $classRooms = ClassRoom::all();
         return view('pages.period.periods',compact('times','days','classRooms'));
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
      
      'periodName' => 'required',
      'time_id' => 'required',
      'day_id' => 'required',
      'classRoom_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $periods = Period::create($values);
        // return back();
       return redirect()->to('periods-list')->with(compact('periods'))->with('message', 'Period added successfully');
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
         $times = Time::all();
        $days = Day::all();
        $classRooms = ClassRoom::all();
        $periods = Period::find($id);
        return view('pages.period.editPeriods ',compact('times','days','classRooms','periods'));
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
      
      'periodName' => 'required',
      'time_id' => 'required',
      'day_id' => 'required',
      'classRoom_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $periods = Period::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('periods-list')->with('message', 'Period updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $periods = Period::find($request->id);
        if($periods->delete()) {
            return redirect()->to('periods-list')->with('message','Period deleted successfully');
        }
    }
    
}
