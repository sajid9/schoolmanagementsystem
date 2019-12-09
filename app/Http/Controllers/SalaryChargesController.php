<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryChargType;
use App\SalaryChargCategory;
use App\SalaryChargHead;
use App\EmployeeGrade;
use App\SalaryCharge;

class SalaryChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $salaryCharges = SalaryCharge::with('chargTypes','chargCategories','chargHeads','employeeGrades')->get();

          // dd($timeTables);
        return view('pages.salaryCharge.salaryCharges-list',compact('salaryCharges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chargTypes = SalaryChargType::all();
        $chargCategories = SalaryChargCategory::all();
        $chargHeads = SalaryChargHead::all();
        $employeeGrades = EmployeeGrade::all();
         return view('pages.salaryCharge.salaryCharges',compact('chargTypes','chargHeads','chargCategories','employeeGrades'));
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
  
      'chargType_id' => 'required',
      'chargCategory_id' => 'required',
      'chargHead_id' => 'required',
      'employeeGrade_id' => 'required',
      'salaryAmount' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $salaryCharges = SalaryCharge::create($values);
        // return back();
       return redirect()->to('salaryCharges-list')->with(compact('salaryCharges'))->with('message', 'SalaryCharge added successfully');
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
        $chargTypes = SalaryChargType::all();
        $chargCategories = SalaryChargCategory::all();
        $chargHeads = SalaryChargHead::all();
        $employeeGrades = EmployeeGrade::all();
        $salaryCharges = SalaryCharge::find($id);
        return view('pages.salaryCharge.editSalaryCharges ',compact('chargTypes','chargCategories','salaryCharges','chargHeads','employeeGrades'));
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
      
      'chargType_id' => 'required',
      'chargCategory_id' => 'required',
      'chargHead_id' => 'required',
      'employeeGrade_id' => 'required',
      'salaryAmount' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $salaryCharges = SalaryCharge::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('salaryCharges-list')->with('message', 'SalaryCharge updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $salaryCharges = SalaryCharge::find($request->id);
        if($salaryCharges->delete()) {
            return redirect()->to('salaryCharges-list')->with('message','SalaryCharge deleted successfully');
        }
    }
}
