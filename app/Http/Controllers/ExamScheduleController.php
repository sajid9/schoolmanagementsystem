<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamSlot;
use App\Batch;
use App\Subject;
use App\ExamTerm;
use App\ExamSchedule;
use App\CEnrollment;
use App\examination_attendence;
use App\Admission;

class ExamScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $examSchedules = ExamSchedule::with('examSlots.days','examSlots.examTimes','examSlots.classRooms','subjects','batches.classes','batches.sections','examTerms')->get();

          // dd($timeTables);
        return view('pages.examSchedule.examSchedule-list',compact('examSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $examSlots = ExamSlot::all();
        $batches = Batch::all();
        $subjects = Subject::all();
        $examTerms = ExamTerm::all();
         return view('pages.examSchedule.examSchedules',compact('examSlots','subjects','batches','examTerms'));
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
  
      'examSlot_id' => 'required',
      'batch_id' => 'required',
      'subject_id' => 'required',
      'examTerm_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $examSchedules = ExamSchedule::create($values);
        // return back();
       return redirect()->to('examSchedule-list')->with(compact('examSchedules'))->with('message', 'ExamSchedule added successfully');
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
        $examSlots = ExamSlot::all();
        $batches = Batch::all();
        $subjects = Subject::all();
        $examTerms = ExamTerm::all();
        $examSchedules = ExamSchedule::find($id);
        return view('pages.examSchedule.editExamSchedule ',compact('examSlots','subjects','examSchedules','batches','examTerms'));
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
      
      'examSlot_id' => 'required',
      'batch_id' => 'required',
      'subject_id' => 'required',
      'examTerm_id' => 'required',
    ]);


        $values = array_except($request->all(),['_token']);

        $examSchedules = ExamSchedule::where('id',$request->id)->update($values);
        // return back();
       return redirect()->to('examSchedule-list')->with('message', 'ExamSchedule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $examSchedules = ExamSchedule::find($request->id);
        if($examSchedules->delete()) {
            return redirect()->to('examSchedule-list')->with('message','ExamSchedule deleted successfully');
        }
    }
    public function axam_attendence_list($scheduleId,$batchId)
    {
       $students = CEnrollment::with('admissions.registrations','batches.classes','batches.sections','batches.years')->where('batch_id',$batchId)->get();
       return view('pages.examSchedule.examAttendence',compact('students','scheduleId'));
    }
    function mark_exam_attendence(Request $request){

        foreach ($request->mydata as  $key => $value) {
            $check = examination_attendence::where('exam_schedule_id',$value['schedule_id'])->where('admission_id',$value['addmission_id'])->get();
            if(sizeof($check) > 0){
                $attendence =  examination_attendence::find($check[0]->id);
                $attendence->admission_id     = $value['addmission_id'];
                $attendence->exam_schedule_id = $value['schedule_id'];
                $attendence->is_active        = $value['attendence'];
                $attendence->attendenceDate   = $value['attendenceDate'];
                $attendence->save();
            }else{
                examination_attendence::create([
                    'admission_id'     => $value['addmission_id'],
                    'exam_schedule_id' => $value['schedule_id'],
                    'is_active'        => $value['attendence'],
                    'attendenceDate'   => $value['attendenceDate'],
                ]);
            }
            
        }
        return json_encode(['message'=>'success']);
    }
    public function examination_attendence()
    {
        $students   = Admission::with('registrations')->get();
        $terms      = ExamTerm::all();
        $attendance = array();
        return view('pages.examSchedule.attendancereport',compact('students','terms','attendance'));
    }
    public function search_exam_attendance(Request $request)
    {
        $students = Admission::with('registrations')->get();
        $terms    = ExamTerm::all();
        $exam     = examination_attendence::with('examschedule.examSlots.examTimes','examschedule.examSlots.days','examschedule.examSlots.classRooms','examschedule.terms','admission.registrations');
        if($request->student != ''){
            $student = $request->student;
            $exam->whereHas('admission',function($q) use($student){
                $q->where('id',$student);
            });
        }
        if($request->term != ''){
            $term = $request->term;
            $exam->whereHas('examschedule.terms',function($q) use($term){
                $q->where('id',$term);
            });
        }
        $attendance = $exam->get();
        return view('pages.examSchedule.attendancereport',compact('students','terms','attendance'));
    }
}
