<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Month;

class MonthsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = Month::all();

        return view('pages.month.months-list',compact('months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.month.months');

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
      
      'month_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $months = Month::create($values);
        // return back();
       return redirect()->to('months-list')->with(compact('months'))->with('message', 'Month added successfully');
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
         $month = Month::find($id);
       return view('pages.month.editMonths',compact('month'));
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
      
      'month_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $months = Month::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('months-list')->with('message', 'Month updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $month = Month::find($request->id);
        if ($month->delete()) {
            return redirect()->to('months-list')->with('message','Month deleted successfully');
        }
    }
}
