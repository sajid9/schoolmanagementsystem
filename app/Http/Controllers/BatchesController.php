<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\MClass;
use App\Section;
use App\Year;
use App\Employe;

class BatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::with('classes','sections','years','employees')->get();
        return view('pages.batch.batches-list',compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = MClass::all();
        $sections = Section::all();
        $years = Year::all();
        $employees = Employe::all();
         return view('pages.batch.batches',compact('classes','sections','years','employees'));
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
      
      'batchName' => 'required',
      'class_id' => 'required',
      'section_id' => 'required',
      'year_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $batches = Batch::create($values);
        // return back();
       return redirect()->to('batches-list')->with(compact('batches'))->with('message', 'batch added successfully');
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
         $classes = MClass::all();
        $sections = Section::all();
        $years = Year::all();
        $employees = Employe::all();
        $batches = Batch::find($id);
        return view('pages.batch.editBatches ',compact('classes','sections','years','employees','batches'));
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
      
      'batchName' => 'required',
      'class_id' => 'required',
      'section_id' => 'required',
      'year_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $batches = Batch::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('batches-list')->with('message', 'batch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $batches = Batch::find($request->id);
        if($batches->delete()) {
            return redirect()->to('batches-list')->with('message','Batch deleted successfully');
        }
    }
}
