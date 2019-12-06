<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeGrade;

class EmployeeGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
        $employeeGrades = EmployeeGrade::all();

        return view('pages.employeeGrade.employeeGrade-list',compact('employeeGrades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.employeeGrade.employeeGrade');

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
      
      'employeeGrade' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $employeeGrades = EmployeeGrade::create($values);
        // return back();
       return redirect()->to('employeeGrade-list')->with(compact('employeeGrades'))->with('message', 'EmployeeGrade added successfully');
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
         $employeeGrades = EmployeeGrade::find($id);
       return view('pages.employeeGrade.editemployeeGrade',compact('employeeGrades'));
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
      
      'employeeGrade' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $employeeGrades = EmployeeGrade::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('employeeGrade-list')->with('message', 'EmployeeGrade updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $employeeGrades = EmployeeGrade::find($request->id);
        if ($employeeGrades->delete()) {
            return redirect()->to('employeeGrade-list')->with('message','EmployeeGrade deleted successfully');
        }
    }
}
