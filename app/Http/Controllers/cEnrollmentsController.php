<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admission;
use App\Batch;
use App\CEnrollment;
use App\Registration;
use App\MClass;
use App\Section;
use App\Year;
class cEnrollmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cenrolls = CEnrollment::with('admissions.registrations','batches.classes','batches.sections','batches.years')->get();
         // dd($cenrolls);
        $classes  = MClass::all();
        $sections = Section::all();
    return view('pages.classEnrollment.classEnrollment-list',compact('cenrolls','classes','sections'));
    }
    public function search_class_students(Request $request)
    {

        $class = $request->class;
        $section = $request->section;
        $search = CEnrollment::with('admissions.registrations','batches.classes','batches.sections','batches.years');
        if ($class != null) {
            $search->whereHas('batches.classes',function($q) use($class){
                $q->where('id',$class);
            });
        }
        if ($section != null) {
            $search->whereHas('batches.sections',function($q) use($section){
                $q->where('id',$section);
            });
        }
        $cenrolls = $search->get();
         // dd($cenrolls);
        $classes  = MClass::all();
        $sections = Section::all();
        return view('pages.classEnrollment.classEnrollment-list',compact('cenrolls','classes','sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admissions = Admission::with('registrations')->get();
        // dd($admissions);
        $batches = Batch::all();
        return view('pages.classEnrollment.classEnrollments',compact('admissions','batches',));
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
      'batch_id' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $cenrolls = CEnrollment::create($values);
        // return back();
       return redirect()->to('cEnrollments-list')->with(compact('cenrolls'))->with('message', 'Enrollment added successfully');
       
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
        $admissions = Admission::with('registrations')->get();
        $batches = Batch::all();
        $cenrolls = CEnrollment::find($id);
        return view('pages.classEnrollment.editcEnrollment ',compact('admissions','batches','cenrolls'));
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
      'batch_id' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);
        $append = array('is_active'=>'no');
       if(!$request->has('is_active')){
        $values = array_merge($values,$append);
       }
       
        $cenrolls = CEnrollment::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('cEnrollments-list')->with('message', 'Enrollment updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $cenrolls = CEnrollment::find($request->id);
    if ($cenrolls->delete()) {
         return redirect()->to('cEnrollments-list')
            ->with('message' , 'Enrollment deleted successfully');
    }
    }
}
