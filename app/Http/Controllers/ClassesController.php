<?php

namespace App\Http\Controllers;

use App\MClass;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = MClass::all();
        return view('pages.class.classes-list',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.class.classes');
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
      
      'c_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $classes = MClass::create($values);
        // return back();
       return redirect()->to('classes-list')->with(compact('classes'))->with('message', 'class added successfully');
   }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\MClass  $mClass
     * @return \Illuminate\Http\Response
     */
    public function show(MClass $mClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MClass  $mClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $class = MClass::find($id);
       return view('pages.class.editClasses',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MClass  $mClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MClass $mClass)
    {
        $request->validate([
      
      'c_name' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);
        dd($values);

        $classes = MClass::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('classes-list')->with('message', 'class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MClass  $mClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(MClass $mClass,Request $request)
    {
        $class = MClass::find($request->id);
        if ($class->delete()) {
            return redirect()->to('classes-list')->with('message','class deleted successfully');
        }
    }
}
