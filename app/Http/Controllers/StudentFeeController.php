<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentTotalFee;
use App\FeeChargHead;
use App\FeeChargType;
use App\FeeCharge;
use App\StudentFee;

class StudentFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {

        //   $studentFees = StudentFee::with('stdTotalFees','chargTypes','chargHeads')->get();

        //   // dd($timeTables);
        // return view('pages.employeeSalary.employeeSalary-list',compact('employeeSalaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stdTotalFees = StudentTotalFee::with('enrollments.admissions.registrations','enrollments.batches.classes','months')->get();
        $chargHeads = FeeChargHead::all();
        $chargTypes = FeeChargType::all();

         // dd($stdTotalFees);

        return view('pages.studentFee.studentFee',compact('stdTotalFees','chargHeads','chargTypes'));
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
  
      'stdTotalFee_id' => 'required',
      'chargHead_id' => 'required',
      'chargType_id' => 'required',
      'feeAmount' => 'required',
      'transactionType' => 'required',
    ]); 
       
    StudentFee::create(['stdTotalFee_id'=>$request->stdTotalFee_id,'chargHead_id'=>$request->chargHead_id,'chargType_id'=>$request->chargType_id,'feeAmount'=>$request->feeAmount,'transactionType'=>$request->transactionType,'remarksremarks'=>$request->remarks]);
   if ($request->transactionType=='credit') {

 $check=StudentTotalFee::where('enrollment_id',$request->stdTotalFee_id)->where('month_id',$request->month_id)->first();
   
 if (isset($check->totalAmount)) {
   $totalamount=$check->totalAmount+$request->feeAmount;
    
     StudentTotalFee::where('enrollment_id',$request->stdTotalFee_id)->where('month_id',$request->month_id)->update(['totalAmount'=>$totalamount]);
 }
    

    }else{ 

 $check=StudentTotalFee::where('enrollment_id',$request->stdTotalFee_id)->where('month_id',$request->month_id)->first();

     if (isset($check->totalAmount)) {
   $totalamount=$check->totalAmount-$request->feeAmount;
    
     StudentTotalFee::where('enrollment_id',$request->stdTotalFee_id)->where('month_id',$request->month_id)->update(['totalAmount'=>$totalamount]);
 }
    }

   return redirect()->to('studentTotalFee-list')->with('message', 'StudentFee updated successfully');
  
      
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
        // $employees = Employe::all();
        // $months = Month::all();
        // $chargHeads = SalaryChargHead::all();
        // $employeeSalaries = EmployeeSalary::find($id);
        // return view('pages.employeeSalary.editEmployeeSalary ',compact('employees','months','employeeSalaries','chargHeads'));
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
    //       $request->validate([
      
    //   'empTotalSalary_id' => 'required',
    //   'chargHead_id' => 'required',
    //   'chargType_id' => 'required',
    //   'salaryAmount' => 'required',
    //   'transactionType' => 'required',
    // ]);


    //     $values = array_except($request->all(),['_token']);

    //     $employeeSalaries = EmployeeSalary::where('id',$request->id)->update($values);
    //     // return back();
    //    return redirect()->to('employeeSalary-list')->with('message', 'EmployeeSalary updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //  $employeeSalaries = EmployeeSalary::find($request->id);
        // if($employeeSalaries->delete()) {
        //     return redirect()->to('employeeSalary-list')->with('message','EmployeeSalary deleted successfully');
        // }
    }

     public  function headAmount(Request $request){
        $headAmounts = FeeCharge::where('chargHead_id',$request->chargHead)->where('class_id',$request->stdTotalFee_id)->get();
        return json_encode($headAmounts);

    }
}
