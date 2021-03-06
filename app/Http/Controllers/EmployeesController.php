<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\EmployeeGrade;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
    {
        $employees = Employe::with('employeeGrades')->get();
        return view('pages.employee.employees-list',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeGrades = EmployeeGrade::all();
         return view('pages.employee.employees',compact('employeeGrades'));
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
      'employeeGrade_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $employees = Employe::create($values);
        // return back();
       return redirect()->to('employees-list')->with(compact('employees'))->with('message', 'Employee added successfully');
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
        $employeeGrades = EmployeeGrade::all();
        $employees = Employe::find($id);
        return view('pages.employee.editEmployees ',compact('employeeGrades','employees'));
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
      
      'emp_name' => 'required',
      'employeeGrade_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $employees = Employe::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('employees-list')->with('message', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $employees = Employe::find($request->id);
        if($employees->delete()) {
            return redirect()->to('employees-list')->with('message','Employee deleted successfully');
        }
    }
}
