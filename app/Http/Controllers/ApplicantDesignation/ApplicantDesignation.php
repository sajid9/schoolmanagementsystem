<?php

namespace App\Http\Controllers\ApplicantDesignation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\ApplicantDesignationModel;
class ApplicantDesignation extends Controller
{
    


     public function index()
    {
    	$applicantdesignations=ApplicantDesignationModel::all();
	return view('pages.designation.index',compact('applicantdesignations'));
    }


   public function addapplicantdesignationview()
   {
	return view('pages.designation.add');
   }

public function insertapplicantdesignation(Request $request)
{
	
	$this->validate($request, [
	'designation'   => 'required|unique:applicantdesignations',
	] );
	$insertapplicantdesignation=ApplicantDesignationModel::create([
	'designation'=>$request->designation,
	]);

	return redirect()->back()->with('status','New Designation Created Successfully');
}


public function deleteapplicantevent($id)
{
	

		$applicantdesignation=ApplicantDesignationModel::find($id);
	    $applicantdesignation->delete();
	    return redirect()->back()->with('status','Designation Deleted Successfully');
}


public function editapplicantdesignation($id)
{
	$applicantdesignation=ApplicantDesignationModel::find($id);
	
    return view('pages.designation.edit')->with('applicantdesignation',$applicantdesignation);
}



public function updateapplicantdesignation(Request $request)
{
	
$this->validate($request, [
	'designation'   => 'required',
	] );
	$updateapplicantdesignation=ApplicantDesignationModel::find($request->d_id);
	$updateapplicantdesignation->update([
	'designation'=>$request->designation,
	]);
return redirect()->back()->with('status',' Designation Updated Successfully');
}
}
