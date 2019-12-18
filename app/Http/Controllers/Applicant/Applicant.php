<?php
	namespace App\Http\Controllers\Applicant;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Session;
	use App\ApplicantModel;
	use App\ApplicantCourseModel;
	use App\ApplicantExperienceModel;
	use App\ApplicantQualifictionModel;
	use DB;
	class Applicant extends Controller
	{
	/**
	* Show the application dashboard.
	*
	* @return \Illuminate\Contracts\Support\Renderable
	*/
	public function index()
	{
	$applicants=ApplicantModel::where('is_softdel','no')->get();
	return view('pages.applicants.index',compact('applicants'));
	}


	
	public function addview()
	{
	return view('pages.applicants.addapplicant');
	}



	public function insertapplicant(Request $request)
	{
	
		
	$this->validate($request, [
	'name'   => 'required',
	'cnic' => 'required|unique:applicants',
	'fname' => 'required',
	'dob' => 'required',
	'city'=>'required',
	'address' => 'required',
	'mobile' => 'required',
	'weight' => 'required',
	'height' => 'required',
	] );
	if ($request->hasFile('file') && $request->file->isValid()) {
	$extension=$request->file->extension();
	$filename1=time()."_.".$extension;
	$filename=$filename1;
	$request->file->move(public_path('assets/images'),$filename);
	}else {
	$filename='headshot.jpg';
	}
	$insertapplicant=ApplicantModel::create([
	'name'=>$request->name,
	'cnic'=>$request->cnic,
	'image'=>$filename,
	'fname'=>$request->fname,
	'dob'=>$request->dob,
	'address'=>$request->address,
	'city'=>$request->city,
	'mobile'=>$request->mobile,
	'ptcl'=>$request->ptcl,
	'height'=>$request->height,
	'weight'=>$request->weight,
	]);
	if($insertapplicant){
	foreach ($request->course as $key => $course) {
		
	$post= new ApplicantCourseModel([
	'name'=>$request->course[$key],
	'year'=>$request->year[$key],
	'institute'=>$request->c_institute[$key],
	]);
	$insertapplicant->applicantcourse()->save($post);
	}
	foreach ($request->degree as $key2 => $degree) {
		
	$post= new ApplicantQualifictionModel([
	'degree'=>$request->degree[$key2],
	'total_marks'=>$request->total_marsks[$key2],
	'obtain_marks'=>$request->obtain_marsks[$key2],
	'institute'=>$request->q_institute[$key2],
	'year_of_passing'=>$request->yop[$key2],
	]);
	$insertapplicant->applicantqualifiction()->save($post);
	}
	foreach ($request->employer as $key3 => $employer) {
		
	$post= new ApplicantExperienceModel([
	'employer'=>$request->employer[$key3],
	'title'=>$request->title[$key3],
	'field'=>$request->field[$key3],
	'start_date'=>$request->join_date[$key3],
	'end_date'=>$request->end_date[$key3],
	]);
	$insertapplicant->applicantexperience()->save($post);
	}
	}
	return redirect()->back()->with('status','New Applicant Created Successfully');
	}




	public function editview($id)
	{
	$applicants=ApplicantModel::find($id);
	return view('pages.applicants.editapplicant')->with('applicant',$applicants)->with('courses',ApplicantCourseModel::where('applicant_id',$id)->get())->with('experiences',ApplicantExperienceModel::where('applicant_id',$id)->get())->with('qualifictions',ApplicantQualifictionModel::where('applicant_id',$id)->get());
	}
	public function updateapplicant(Request $request, $id)
	{
	
	$this->validate($request, [
	'name'   => 'required',
	'cnic' => 'required',
	'fname' => 'required',
	'dob' => 'required',
	'city'=>'required',
	'address' => 'required',
	'mobile' => 'required',
	'weight' => 'required',
	'height' => 'required',
	] );
	if ($request->hasFile('file') && $request->file->isValid()) {
	$extension=$request->file->extension();
	$filename1=time()."_.".$extension;
	$filename=$filename1;
	$request->file->move(public_path('assets/images'),$filename);
	}else {
	$filename=$request->image;
	}
	$applicantupdate=ApplicantModel::find($id);
	$applicantupdate->update([
	'name'=>$request->name,
	'cnic'=>$request->cnic,
	'image'=>$filename,
	'fname'=>$request->fname,
	'dob'=>$request->dob,
	'address'=>$request->address,
	'city'=>$request->city,
	'mobile'=>$request->mobile,
	'ptcl'=>$request->ptcl,
	'height'=>$request->height,
	'weight'=>$request->weight,
	]);
	ApplicantCourseModel::where('applicant_id',$id)->delete();
	ApplicantExperienceModel::where('applicant_id',$id)->delete();
	ApplicantQualifictionModel::where('applicant_id',$id)->delete();
	if($applicantupdate){
	foreach ($request->course as $key => $course) {
		
	$post= new ApplicantCourseModel([
	'name'=>$request->course[$key],
	'year'=>$request->year[$key],
	'institute'=>$request->c_institute[$key],
	]);
	$applicantupdate->applicantcourse()->save($post);
	}
	foreach ($request->degree as $key2 => $degree) {
		
	$post= new ApplicantQualifictionModel([
	'degree'=>$request->degree[$key2],
	'total_marks'=>$request->total_marsks[$key2],
	'obtain_marks'=>$request->obtain_marsks[$key2],
	'institute'=>$request->q_institute[$key2],
	'year_of_passing'=>$request->yop[$key2],
	]);
	$applicantupdate->applicantqualifiction()->save($post);
	}
	foreach ($request->employer as $key3 => $employer) {
		
	$post= new ApplicantExperienceModel([
	'employer'=>$request->employer[$key3],
	'title'=>$request->title[$key3],
	'field'=>$request->field[$key3],
	'start_date'=>$request->join_date[$key3],
	'end_date'=>$request->end_date[$key3],
	]);
	$applicantupdate->applicantexperience()->save($post);
	}
	}
	return redirect()->back()->with('status','Applicant Updated Successfully');
	}



	public function applicantdel($id){
	 $applicant=ApplicantModel::find($id);
	$applicant->update([
     'is_softdel'=>'yes'
	]);

	
	
	// $applicant->delete();
	// ApplicantCourseModel::where('applicant_id',$id)->delete();
	// ApplicantExperienceModel::where('applicant_id',$id)->delete();
	// ApplicantQualifictionModel::where('applicant_id',$id)->delete();
	return redirect()->back()->with('status','Applicant Deleted Successfully');
	}



	public function viewapplicant($id)
	{
	

	 $applicant= ApplicantModel::with('applicantcourse','applicantexperience','applicantqualifiction')->where('id',$id)->first();
         return view('pages.applicants.viewapplicant')->with('applicant',$applicant);
	}



	}