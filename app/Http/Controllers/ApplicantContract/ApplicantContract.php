<?php
namespace App\Http\Controllers\ApplicantContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\ApplicantModel;
use App\ApplicantContractModel;
use App\ApplicantDesignationModel;

class ApplicantContract extends Controller
{
public function index()
	{
	
	$securityclearedapplicants=ApplicantContractModel::with('getApplicents')->get();
		 
	$designations=ApplicantDesignationModel::all();
	return view('pages.contracts.index',compact('securityclearedapplicants','designations'));
	}

public function insertcontracts(Request $request)
{


$checkexist=ApplicantContractModel::where('applicant_id',$request->applicant_id)->where('is_active','yes')->get();


if(sizeof($checkexist)>=1)
{ 
 
return redirect()->back()->with('info','Already Contract Exist Please Deactive First Contract');

}else
{

	$insertcontract=ApplicantContractModel::create([
	'applicant_id'=>$request->applicant_id,
	'designation_id'=>$request->designation_id,
	'reportingdate'=>$request->reportingdate,
	'salery'=>$request->salery,
	'contractduration'=>$request->contractduration,
	'jobresponsibility'=>$request->jobresponsibility,
	'is_active'=>$request->is_active,
	]);
	$updatecontract=ApplicantModel::find($request->applicant_id);
	$updatecontract->update([
      'is_contract'=>'yes',
	]);
 
	if ($insertcontract) {
		
return redirect()->back()->with('status',' Contract Added Successfully');
}
}
}
public function updatecontract(Request $request)
{

	$updatecontract=ApplicantContractModel::find($request->contract_id);
	$updatecontract->update([
	'applicant_id'=>$request->applicant_id,
	'designation_id'=>$request->designation_id,
	'reportingdate'=>$request->reportingdate,
	'salery'=>$request->salery,
	'contractduration'=>$request->contractduration,
	'jobresponsibility'=>$request->jobresponsibility,
	'is_active'=>$request->is_active,
	]);
	$updatecontract=ApplicantModel::find($request->applicant_id);
	$updatecontract->update([
      'is_contract'=>'yes',
	]);
	if ($updatecontract) {
		return redirect()->back()->with('status','Contract Updated Successfully');
	}
}


public function viewcontract($id)
{

	$viewcontract=ApplicantContractModel::with('getApplicents')->with('getdesignation')->where('id',$id)->first();
	
	
	
	
return view('pages.contracts.contractprint',compact('viewcontract'));

 
} 

public function joining()
{

$securityclearedandcontractexit=ApplicantContractModel::with('getApplicents')->where('is_active','yes')->get();
	
	$designations=ApplicantDesignationModel::all();
	return view('pages.contracts.joining',compact('securityclearedandcontractexit'));

 
} 

public function updatecontractjoing(Request $request)
{

$updatecontractjoing=ApplicantContractModel::find($request->contract_id);
	if ($request->is_active=='yes') {
		$updatecontractjoing->update([
	'startdate'=>$request->startdate,
	'enddate'=>$request->enddate,
	'is_join'=>'yes',
	]);

	}else{

	$updatecontractjoing->update([
	'startdate'=>NULL,
	'enddate'=>NULL,
	'is_join'=>'no',
	]);
	}
	
	

	if ($updatecontractjoing) {
		return redirect()->back()->with('status','Employe Joing Done Successfully');
	}
}





public function getsecuritycleared_ap(Request $request)
{
	   

   $data = ApplicantModel::select('id','name as text','is_secclear','is_selected','is_softdel','is_shortlist')->where('name','like','%'.$request->term.'%')->orWhere('cnic','like','%'.$request->term.'%')->get()->toArray();
       $items = collect($data)->where('is_selected','yes')->where('is_softdel','no')->where('is_shortlist','yes');
        return json_encode($items);



}


public function checkupdatecontract( Request $request)
{

	if ($request->status=='no') {
		return json_encode(['status'=>'no']);
	}else{

$checkexist2=ApplicantContractModel::where('applicant_id',$request->applicant_id)->where('is_active',$request->status)->get();
if (sizeof($checkexist2) > 0) {
	
return json_encode(['status'=>'yes']);
}
	}
	
}


}