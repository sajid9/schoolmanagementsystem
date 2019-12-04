<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();

        return view('pages.grade.grades-list',compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.grade.grades');
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
      
      'min_marks' => 'required',
      'max_marks' => 'required',
      'grade_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $grades = Grade::create($values);
        // return back();
       return redirect()->to('grades-list')->with(compact('grades'))->with('message', 'Grade added successfully');
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
          $grade = Grade::find($id);
       return view('pages.grade.editGrades',compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Grade $grade)
    {
          $request->validate([
      
      'min_marks' => 'required',
      'max_marks' => 'required',
      'grade_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $grades = Grade::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('grades-list')->with('message', 'Grade updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
         $grade = Grade::find($request->id);
        if ($grade->delete()) {
            return redirect()->to('grades-list')->with('message','Grade deleted successfully');
        }
    }
}
