<?php
namespace App\Http\Controllers\Shortlisting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
	use App\ApplicantModel;
	use App\ApplicantCourseModel;
	use App\ApplicantExperienceModel;
	use App\ApplicantQualifictionModel;
class Shortlisting extends Controller
{



public function index(){
	$applicants=ApplicantModel::with('applicantcourse','applicantexperience','applicantqualifiction')->where('is_softdel','no')->orderBy('id', 'DESC')->paginate(1);
return view('pages.shortlisting.index')->with('applicants',$applicants);
}


public function shortlistingfilter(Request $request){
	$search = ApplicantModel::with('applicantcourse','applicantexperience','applicantqualifiction');
if($request->id){
$search->where('id',$request->id);
}
if($request->cnic){
$search->where('cnic',$request->cnic);
}

if($request->weight){
$search->where('weight','>=',$request->weight);
}
if($request->height){
$search->where('height','>=',$request->height);
}
if($request->dob_from && $request->dob_to){
	//dd($request->dob_to);
$search->whereBetween('dob',[$request->dob_from,$request->dob_to]);
}
if($request->date_from && $request->date_to){
$search->whereBetween('applicants.created_at',[$request->date_from,$request->date_to]);
}
$applicants= $search->where('is_softdel','no')->orderBy('id', 'DESC')->paginate(1);

return view('pages.shortlisting.index')->with('applicants',$applicants);
}



public function marktoshortlist($id){

$applicant=ApplicantModel::where('id',$id)->update([
    'is_shortlist'=>'yes'
]);

return redirect()->back()->with('status','Applicant Shortlisted Successfully');

}

public function unshortlist($id){

$applicant=ApplicantModel::where('id',$id)->update([
    'is_shortlist'=>Null
]);

return redirect()->back()->with('status','Applicant Reset Successfully');

}

public function notshortlist($id){

$applicant=ApplicantModel::where('id',$id)->update([
    'is_shortlist'=>'no'
]);

return redirect()->back()->with('warning','Applicant status change Not Shorted Successfully');

}




public function shortlistingtable(){

$applicants=ApplicantModel::where('is_softdel','no')->get();
return view('pages.shortlisting.shortlistingtable',compact('applicants'));

}

public function shortlistingtableview($id){

	$search = ApplicantModel::with('applicantcourse','applicantexperience','applicantqualifiction');
if($id){
$search->where('id',$id); 
}

$applicants= $search->orderBy('id', 'DESC')->paginate(1);

return view('pages.shortlisting.index')->with('applicants',$applicants);

}

}