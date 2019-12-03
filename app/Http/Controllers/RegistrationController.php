<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\MClass;
use App\Session;

class RegistrationController extends Controller
{
     */
   public function __construct()
   {
   }
   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function myHome()
   {
       return view('pages.dashboard');
   }

   public function regform(){
    $classes = MClass::all();
    $sessions = Session::all();
    $register = Registration::orderBy('id','desc')->take(1)->first();
    return view('pages.registrationform',compact('register','classes','sessions'));
   }
   
   public function viewlist(){
    $registrations = Registration::all();
    return view('pages.student-list',compact('registrations'));
   }

   public function candidate_list(){
    $registrations = Registration::with('classes','session')->get();
    return view('pages.registeredStd',compact('registrations'));
   }

   
   public function edit_registration($id){
    $classes = MClass::all();
    $sessions = Session::all();
    $reg = Registration::find($id);
    return view('pages.editRegistration',compact('reg','classes','sessions'));
   }

   

   public function add_registration(Request $request){

    $request->validate([
      
      'firstName' => 'required',
      'dateBirth' => 'required',
      'gender' => 'required',
      'gfirstName' => 'required',
      'class_id' => 'required',
      'session_id' => 'required',
      
    ]);


        $values = array_except($request->all(),['_token']);

        $registrations = Registration::create($values);
        // return back();
       return redirect()->to('registeredStd')->with(compact('registrations'))->with('message', 'record added successfully');
   }

 
   public function update_registration(Request $request){
    $request->validate([
      'firstName' => 'required',
      'dateBirth' => 'required',
      'gender' => 'required',
      'gfirstName' => 'required',
      'class_id' => 'required',
      'session_id' => 'required',
    ]);
    $values = array_except($request->all(),['_token']);
     $registrations = Registration::where('id',$request->id)->update($values);

    return redirect()->to('registeredStd')->with('message', 'record updated successfully');
}

   public function del_registration(Request $request){
    $registration = Registration::find($request->id);
    if ($registration->delete()) {
         return redirect()->to('registeredStd')
            ->with('message' , 'registration deleted successfully');
    }
   }

    
   /**
    * Show the my users page.
    *
    * @return \Illuminate\Http\Response
    */
   public function myUsers()
   {
       return view('myUsers');
   }
}
