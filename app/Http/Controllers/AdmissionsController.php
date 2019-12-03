<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admission;
use App\Registration;
use App\Category;
use App\CEnrollment;

class AdmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admissions = Admission::with('registrations','categories')->get();
    return view('pages.admission.admittedStd',compact('admissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registrations = Registration::all();
        $categories = Category::all();
         return view('pages.admission.admissionForm',compact('registrations','categories'));
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
      
      'registration_id' => 'required',
      'admissionNum' => 'required',
      'admissionDate' => 'required',
      'religion' => 'required',
      'category_id' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $admissions = Admission::create($values);
        // return back();
       return redirect()->to('admittedStd')->with(compact('admissions'))->with('message', 'record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $admission = Admission::find($id);
        $reg = Registration::find($id);
        return view('pages.admission.viewAdmission',compact('reg','admission','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registrations = Registration::all();
        $categories = Category::all();
        $admission = Admission::find($id);
        return view('pages.admission.editAdmission ',compact('registrations','admission','categories'));
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
      
      'registration_id' => 'required',
      'admissionNum' => 'required',
      'admissionDate' => 'required',
      'religion' => 'required',
      'category_id' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $admissions = Admission::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('admittedStd')->with('message', 'record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $admission = Admission::find($request->id);
    if ($admission->delete()) {
         return redirect()->to('admittedStd')
            ->with('message' , 'Admission deleted successfully');
    }
    }

     public  function fetchfatername(Request $request){
        $registrations = Registration::find($request->stdid);
        return json_encode($registrations);

    }
    public function admission_report()
    {
        $enrollments = CEnrollment::with('admissions.registrations','batches.classes','batches.sections','batches.years')->get();
        
        return view('pages.admission.admission_reporting',compact('enrollments'));
    }
}
