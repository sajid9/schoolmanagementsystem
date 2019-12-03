<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employe::all();
        return view('pages.employe.employees-list',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employe.employees');
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
      
      'emp_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $employees = Employe::create($values);
        // return back();
       return redirect()->to('employees-list')->with(compact('employees'))->with('message', 'employe added successfully');
   }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\MClass  $mClass
     * @return \Illuminate\Http\Response
     */
    public function show(MClass $mClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MClass  $mClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $year = Year::find($id);
       return view('pages.year.editYears',compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MClass  $mClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Year $year)
    {
        $request->validate([
      
      'yearName' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $years = Year::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('years-list')->with('message', 'year updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MClass  $mClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Year $year,Request $request)
    {
        $year = Year::find($request->id);
        if ($year->delete()) {
            return redirect()->to('years-list')->with('message','year deleted successfully');
        }
    }
}
