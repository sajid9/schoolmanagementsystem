<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admission;
use App\ExamSchedule;
use App\Grade;
use App\Result;
use App\MClass;
use App\Section;
use App\ExamTerm;

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
    public function student_result()
    {
        $students = Admission::with('registrations')->get();
        $classes = MClass::all();
        $sections = Section::all();
        $terms = ExamTerm::all();
        $results = array();
        return view('pages.result.student-result',compact('students','classes','sections','results','terms'));
    }
    public function result_search(Request $request)
    {
        $student = $request->student;
        $class   = $request->class;
        $section = $request->section;
        $term    = $request->term;
        $search = Result::with('admissions.registrations','examSchedules.batches','grades');
        if($student != null){
            $search->whereHas('admissions',function($q) use($student){
                $q->where('id',$student);
            });
        }
        if($class != null){
            $search->whereHas('examSchedules.batches',function($q) use($class){
                $q->where('class_id',$class);
            });
        }
        if($section != null){
            $search->whereHas('examSchedules.batches',function($q) use($section){
                $q->where('section_id',$section);
            });
        }
        if($term != null){
            $search->whereHas('examSchedules',function($q) use($term){
                $q->where('examTerm_id',$term);
            });
        }
        $results = $search->get();
        $students = Admission::with('registrations')->get();
        $classes = MClass::all();
        $sections = Section::all();
        $terms = ExamTerm::all();
        return view('pages.result.student-result',compact('students','classes','sections','results','terms'));
    }
    public function result_summary()
    {
        $results = array();
        $classes = MClass::all();
        $sections = Section::all();
        $terms = ExamTerm::all();
        return view('pages.result.result-summary',compact('classes','sections','results','terms'));
    }
    public function search_result_summary(Request $request)
    {
        $class   = $request->class;
        $section = $request->section;
        $term    = $request->term;
        $search = Result::with('admissions.registrations','examSchedules.batches','grades');
        if($class != null){
            $search->whereHas('examSchedules.batches',function($q) use($class){
                $q->where('class_id',$class);
            });
        }
        if($section != null){
            $search->whereHas('examSchedules.batches',function($q) use($section){
                $q->where('section_id',$section);
            });
        }
        if($term != null){
            $search->whereHas('examSchedules',function($q) use($term){
                $q->where('examTerm_id',$term);
            });
        }
        $results  = $search->get();
        $classes  = MClass::all();
        $sections = Section::all();
        $terms    = ExamTerm::all();
       
        return view('pages.result.result-summary',compact('classes','sections','results','terms'));
    }
}
