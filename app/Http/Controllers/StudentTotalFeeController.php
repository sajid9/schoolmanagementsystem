<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CEnrollment;
use App\Month;
use App\StudentTotalFee;

class StudentTotalFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {

          $totalFees = StudentTotalFee::with('enrollments.admissions.registrations','enrollments.batches.classes','months')->get();

          // dd($totalFees);
        return view('pages.studentTotalFee.studentTotalFee-list',compact('totalFees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enrollments = CEnrollment::with('admissions.registrations','batches.classes')->get();
        $months = Month::all();
        // dd($enrollments);

        return view('pages.studentTotalFee.studentTotalFee',compact('enrollments','months'));
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
  
      'enrollment_id' => 'required',
      'month_id' => 'required',
      'totalAmount' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $totalFees = StudentTotalFee::create($values);
        // return back();
       return redirect()->to('studentTotalFee-list')->with(compact('totalFees'))->with('message', 'StudentTotalFee added successfully');
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
        $enrollments = CEnrollment::with('admissions.registrations','batches.classes')->get();
        $months = Month::all();
        $totalFees = StudentTotalFee::find($id);
        return view('pages.studentTotalFee.editStudentTotalFee ',compact('enrollments','months','totalFees'));
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
      
        'enrollment_id' => 'required',
        'month_id' => 'required',
        'totalAmount' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $totalFees = StudentTotalFee::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('studentTotalFee-list')->with('message', 'StudentTotalFee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $totalFees = StudentTotalFee::find($request->id);
        if($totalFees->delete()) {
            return redirect()->to('studentTotalFee-list')->with('message','StudentTotalFee deleted successfully');
        }
    }
}
