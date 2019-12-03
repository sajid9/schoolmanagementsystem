<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Day::all();

        return view('pages.day.days-list',compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.day.days');

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
      
      'day_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $days = Day::create($values);
        // return back();
       return redirect()->to('days-list')->with(compact('days'))->with('message', 'day added successfully');
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
         $day = Day::find($id);
       return view('pages.day.editDays',compact('day'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Day $day)
    {
         $request->validate([
      
      'day_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $days = Day::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('days-list')->with('message', 'Day updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $day = Day::find($request->id);
        if ($day->delete()) {
            return redirect()->to('days-list')->with('message','Day deleted successfully');
        }
    }
}
