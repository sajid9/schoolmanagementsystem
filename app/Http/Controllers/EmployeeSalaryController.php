<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeTotalSalary;
use App\SalaryChargHead;
use App\SalaryChargType;
use App\SalaryCharge;
use App\EmployeeSalary;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $employeeSalaries = EmployeeSalary::with('employees','months','chargHeads')->get();

          // dd($timeTables);
        return view('pages.employeeSalary.employeeSalary-list',compact('employeeSalaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empTotalSalaries = EmployeeTotalSalary::with('employees.employeeGrades')->get();
        $chargHeads = SalaryChargHead::all();
        $chargTypes = SalaryChargType::all();

        // dd($chargHeads);

        return view('pages.employeeSalary.employeeSalary',compact('empTotalSalaries','chargHeads','chargTypes'));
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
      'emp_cnic' => 'required',
      'chargHead_id' => 'required',
      'month_id' => 'required',
      'salary_date' => 'required',
      'salaryAmount' => 'required',
      'receptType' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $employeeSalaries = EmployeeSalary::create($values);
        // return back();
       return redirect()->to('employeeSalary-list')->with(compact('employeeSalaries'))->with('message', 'EmployeeSalary added successfully');
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
        $employees = Employe::all();
        $months = Month::all();
        $chargHeads = SalaryChargHead::all();
        $employeeSalaries = EmployeeSalary::find($id);
        return view('pages.employeeSalary.editEmployeeSalary ',compact('employees','months','employeeSalaries','chargHeads'));
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
      'emp_cnic' => 'required',
      'chargHead_id' => 'required',
      'month_id' => 'required',
      'salary_date' => 'required',
      'salaryAmount' => 'required',
      'receptType' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $employeeSalaries = EmployeeSalary::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('employeeSalary-list')->with('message', 'EmployeeSalary updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $employeeSalaries = EmployeeSalary::find($request->id);
        if($employeeSalaries->delete()) {
            return redirect()->to('employeeSalary-list')->with('message','EmployeeSalary deleted successfully');
        }
    }

     public  function headAmount(Request $request){
        $headAmounts = SalaryCharge::where('chargHead_id',$request->amount)->get();
        return json_encode($headAmounts);

    }
}
