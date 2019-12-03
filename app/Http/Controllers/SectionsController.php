<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();

        return view('pages.section.sections-list',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('pages.section.sections');
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
      
      'sec_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $sections = Section::create($values);
        // return back();
       return redirect()->to('sections-list')->with(compact('sections'))->with('message', 'Section added successfully');
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
         $section = Section::find($id);
       return view('pages.section.editSections',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Section $section)
    {
         $request->validate([
      
      'sec_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $sections = Section::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('sections-list')->with('message', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $section = Section::find($request->id);
        if ($section->delete()) {
            return redirect()->to('sections-list')->with('message','Section deleted successfully');
        }
    }
}
