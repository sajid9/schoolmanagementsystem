<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admission;
use App\ExamSchedule;
use App\Grade;
use App\Result;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
          $results = Result::with('admissions.registrations','examSchedules','grades')->get();
          // dd($timeTables);
        return view('pages.result.results-list',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admissions = Admission::all();
        $examSchedules = ExamSchedule::all();
        $grades = Grade::all();
         return view('pages.result.results',compact('admissions','grades','examSchedules'));
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
  
      'admission_id' => 'required',
      'examSchedule_id' => 'required',
      'total_marks' => 'required',
      'obtain_marks' => 'required',
      'pass_marks' => 'required',
      'grade_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $results = Result::create($values);
        // return back();
       return redirect()->to('results-list')->with(compact('results'))->with('message', 'Result added successfully');
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
       $admissions = Admission::all();
        $examSchedules = ExamSchedule::all();
        $grades = Grade::all();
        $results = Result::find($id);
        return view('pages.result.editResults',compact('admissions','examSchedules','grades','results'));
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
      
      'admission_id' => 'required',
      'examSchedule_id' => 'required',
      'total_marks' => 'required',
      'obtain_marks' => 'required',
      'pass_marks' => 'required',
      'grade_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $results = Result::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('results-list')->with('message', 'Result updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $results = Result::find($request->id);
        if($results->delete()) {
            return redirect()->to('results-list')->with('message','Result deleted successfully');
        }
    }
}
