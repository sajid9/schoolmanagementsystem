<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Month;
use App\EmployeeTotalSalary;

class EmployeeTotalSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {

          $employeeSalaries = EmployeeTotalSalary::with('employees.employeeGrades','months')->get();

          // dd($timeTables);
        return view('pages.employeeTotalSalary.employeeTotalSalary-list',compact('employeeSalaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employe::with('employeeGrades')->get();
        $months = Month::all();

        return view('pages.employeeTotalSalary.employeeTotalSalary',compact('employees','months'));
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
  
      'employee_id' => 'required',
      'month_id' => 'required',
      'totalAmount' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $employeeSalaries = EmployeeTotalSalary::create($values);
        // return back();
       return redirect()->to('employeeTotalSalary-list')->with(compact('employeeSalaries'))->with('message', 'EmployeeTotalSalary added successfully');
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
        $employees = Employe::with('employeeGrades')->get();
        $months = Month::all();
        $employeeSalaries = EmployeeTotalSalary::find($id);
        return view('pages.employeeTotalSalary.editEmployeeTotalSalary ',compact('employees','months','employeeSalaries'));
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
      
       'employee_id' => 'required',
      'month_id' => 'required',
      'totalAmount' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $employeeSalaries = EmployeeTotalSalary::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('employeeTotalSalary-list')->with('message', 'EmployeeTotalSalary updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $employeeSalaries = EmployeeTotalSalary::find($request->id);
        if($employeeSalaries->delete()) {
            return redirect()->to('employeeTotalSalary-list')->with('message','EmployeeTotalSalary deleted successfully');
        }
    }
}
