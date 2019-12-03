<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamTime;

class ExamTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $examTimes = ExamTime::all();

        return view('pages.examTime.examTime-list',compact('examTimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.examTime.examTime');

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
      
      'examTimeName' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $examTimes = ExamTime::create($values);
        // return back();
       return redirect()->to('examTime-list')->with(compact('examTimes'))->with('message', 'ExamTime added successfully');
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
         $examTime = ExamTime::find($id);
       return view('pages.examTime.editExamTime',compact('examTime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamTime $examTime)
    {
         $request->validate([
      
      'examTimeName' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $examTimes = ExamTime::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('examTime-list')->with('message', 'ExamTime updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $examTime = ExamTime::find($request->id);
        if ($examTime->delete()) {
            return redirect()->to('examTime-list')->with('message','ExamTime deleted successfully');
        }
    }
}
