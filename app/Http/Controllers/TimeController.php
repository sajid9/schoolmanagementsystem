<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $times = Time::all();

        return view('pages.time.time-list',compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.time.time');

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
      
      'time_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $times = Time::create($values);
        // return back();
       return redirect()->to('time-list')->with(compact('times'))->with('message', 'Time added successfully');
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
         $time = Time::find($id);
       return view('pages.time.editTime',compact('time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Time $time)
    {
         $request->validate([
      
      'time_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $times = Time::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('time-list')->with('message', 'Time updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $time = Time::find($request->id);
        if ($time->delete()) {
            return redirect()->to('time-list')->with('message','Time deleted successfully');
        }
    }
}
