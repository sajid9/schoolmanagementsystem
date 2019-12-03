<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamTerm;

class ExamTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $examTerms = ExamTerm::all();

        return view('pages.examTerm.examTerm-list',compact('examTerms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('pages.examTerm.examTerm');

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
      
      'examTermName' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $examTerms = ExamTerm::create($values);
        // return back();
       return redirect()->to('examTerm-list')->with(compact('examTerms'))->with('message', 'ExamTerm added successfully');
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
         $examTerm = ExamTerm::find($id);
       return view('pages.examTerm.editExamTerm',compact('examTerm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamTerm $examTerm)
    {
         $request->validate([
      
      'examTermName' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $examTerms = ExamTerm::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('examTerm-list')->with('message', 'ExamTerm updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $examTerm = ExamTerm::find($request->id);
        if ($examTerm->delete()) {
            return redirect()->to('examTerm-list')->with('message','ExamTerm deleted successfully');
        }
    }
}
