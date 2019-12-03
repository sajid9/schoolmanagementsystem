<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use App\Registration;
use App\Charge;
use App\Guardian;
use App\PreviousData;
class co extends Controller
{
   /**
    * Create a new controller instance.
    *
    * @return void
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
    $register = Registration::orderBy('id','desc')->take(1)->first();
    return view('pages.registrationform',compact('register'));
   }
   
   public function viewlist(){
    $registrations = Registration::all();
    return view('pages.student-list',compact('registrations'));
   }

   public function candidate_list(){
    $registrations = Registration::with('guardian')->get();
    return view('pages.candidate-list',compact('registrations'));
   }

   
   public function edit_registration($id){
    $reg = Registration::find($id);
    return view('pages.editRegistration',compact('reg'));
   }

   

   public function add_registration(Request $request){

    $request->validate([
      'admissionNum' => 'required',
      'admissionDate' => 'required',
      'firstName' => 'required',
      'dateBirth' => 'required',
      'religion' => 'required',
      'class' => 'required',
      'batch' => 'required',
      
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
      

    ]);
    $name = '';
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        }
        $values = array_except($request->all(),['_token']);

        $registrations = Registration::create($values);

     return view('pages.guardianDetails',compact('registrations'));
   /* $registration = new Registration;
    $registration->admissionNum = $request->admissionNum;
    $registration->admissionDate = $request->admissionDate;
    $registration->firstName = $request->firstName;
    $registration->middleName = $request->middleName;
    $registration->lastName = $request->lastName;
    $registration->dateBirth = $request->dateBirth;
    $registration->gender = $request->gender;
    $registration->bloodGroup = $request->bloodGroup;
    $registration->birthPlace = $request->birthPlace;
    $registration->nationality = $request->nationality;
    $registration->tongue = $request->tongue;
    $registration->category = $request->category;
    $registration->religion = $request->religion;
    $registration->address = $request->address;
    $registration->city = $request->city;
    $registration->pin = $request->pin;
    $registration->country = $request->country;
    $registration->phone = $request->phone;
    $registration->mobile = $request->mobile;
    $registration->email = $request->email;
    $registration->course = $request->course;
    $registration->batch = $request->batch;
    $registration->rollnumber = $request->rollnumber;
    $registration->biometric = $request->biometric;
    $registration->enableEmail = $request->enableEmail;
    $registration->assignTransport = $request->assignTransport;
    $registration->transport = $request->transport;
    $registration->pickupRoute = $request->pickupRoute;
    $registration->dropRoute = $request->dropRoute;
    $registration->pickupStop = $request->pickupStop;
    $registration->dropStop = $request->dropStop;
    $registration->fee = $request->fee;
    $registration->image = $name;
    $registration->save(); */
    
     //return redirect()->to('student-list')->with('message', 'record added successfully');

   }

 
   
   public function update_registration(Request $request){
    $request->validate([
      'name' => 'required',
      'f_name' => 'required',
      'phone' => 'required',
      'email' => 'required|email',
    ]);
    $registration = Registration::find($request->id);
    $registration->name = $request->name;
    $registration->f_name = $request->f_name;
    $registration->phone = $request->phone;
    $registration->email = $request->email;
    $registration->save();
    return redirect()->to('student-list')->with('message', 'record updated successfully');
}

   public function del_registration(Request $request){
    $registration = Registration::find($request->id);
    if ($registration->delete()) {
         return redirect()->to('student-list')
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
   public function guardianDetails(){
    return view('pages.guardianDetails');
   }

   public function previousData(){
    return view('pages.previousData');
   }

   public function charges(){
    return view('pages.charges');
   }
   public function chargeList(){
    $charges = Charge::all();
    return view('pages.charges-list',compact('charges'));
   }

public function edit_charges($id){
    $charge = Charge::find($id);
    return view('pages.editCharges',compact('charge'));
   }

   public function del_charges(Request $request){
    $charge = Charge::find($request->id);
    if ($charge->delete()) {
         return redirect()->to('charges-list')
            ->with('message' , 'charges deleted successfully');
    }
   }

public function update_charges(Request $request){
    $request->validate([
      'name' => 'required',
      'price' => 'required|numeric',
    ]);

    $charge = Charge::find($request->id);
    $charge->name = $request->name;
    $charge->price = $request->price;
    $charge->save();
    return redirect()->to('charges-list')->with('message','Charges updated successfully');
   }
public function add_charges(Request $request){
    $request->validate([
      'name' => 'required',
      'price' => 'required|numeric',
    ]);

    $charge = new Charge;
    $charge->name = $request->name;
    $charge->price = $request->price;
    $charge->save();
    return redirect()->to('charges-list')->with('message','Charges added successfully');
   }

 public function add_previous(Request $request){

        $values = array_except($request->all(),['_token']);

        PreviousData::create($values);
        $registrations = Registration::with('guardian')->get();
        return redirect()->to('candidate-list')->with(compact('registrations'))->with('message', 'record added successfully');
        //return view('pages.candidate-list',compact('registrations'));
   }

     public function add_guardian(Request $request){

    $request->validate([
      
      'gfirstName' => 'required',
      'relation' => 'required',
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
      

    ]);
    $name = '';
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        }

        $values = array_except($request->all(),['_token']);    
    $registration = Guardian::create($values);
    

    return view('pages.previousData',compact('registration'));
    /*$registration = new Guardian;
    $registration->admissionNum = $request->admissionNum;
    $registration->gfirstName = $request->gfirstName;
    $registration->lastName = $request->lastName;
    $registration->relation = $request->relation;
    $registration->dateBirth = $request->dateBirth;
    $registration->education = $request->education;
    $registration->occupation = $request->occupation;
    $registration->income = $request->income;
    $registration->email = $request->email;
    $registration->address = $request->address;
    $registration->city = $request->city;
    $registration->country = $request->country;
    $registration->phone = $request->phone;
    $registration->mobile = $request->mobile;
    $registration->image = $name;
    $registration->save(); */

    
     //return redirect()->to('student-list')->with('message', 'record added successfully');

   }


}