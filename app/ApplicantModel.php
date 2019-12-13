<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantModel extends Model
{
  
	protected $fillable = [
        'name','fname', 'cnic', 'image','dob','address','city','mobile','ptcl','height','weight','is_shortlist','is_contract','is_secclear','is_selected','is_softdel'
    ];

    protected $table="applicants";

    public function applicantcourse(){

    	return $this->hasMany('App\ApplicantCourseModel','applicant_id','id');

        
    }


 
    public function applicantexperience(){

    	return $this->hasMany('App\ApplicantExperienceModel','applicant_id','id');
    }

    public function applicantqualifiction(){

    	return $this->hasMany('App\ApplicantQualifictionModel','applicant_id','id');
    }


   
    public function applicantcontract(){

        return $this->hasOne('App\ApplicantContractModel','applicant_id','id');
    }
   


    
 
}
