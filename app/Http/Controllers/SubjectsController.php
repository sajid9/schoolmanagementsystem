<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('pages.subject.subjects-list',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.subject.subjects');

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
      
      'sub_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $subjects = Subject::create($values);
        // return back();
       return redirect()->to('subjects-list')->with(compact('subjects'))->with('message', 'subject added successfully');
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
         $subject = Subject::find($id);
       return view('pages.subject.editSubjects',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
         $request->validate([
      
       'sub_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);
  
        $subjects = Subject::where('id',$request->id)->update($values);
      
       return redirect()->to('subjects-list')->with('message', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $subject = Subject::find($request->id);
        if ($subject->delete()) {
            return redirect()->to('subjects-list')->with('message','Subject deleted successfully');
        }
    }
}
