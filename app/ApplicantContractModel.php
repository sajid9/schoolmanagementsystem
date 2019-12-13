<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantContractModel extends Model
{
     protected $fillable = [
        'applicant_id','designation_id','salery','reportingdate','jobresponsibility','contractduration','startdate','enddate','is_active','is_join'
    ];
 
    protected $table="applicantcontracts";


    public function getdesignation(){

        return $this->hasOne('App\ApplicantDesignationModel','id','designation_id');
    }
    public function getApplicents(){

        return $this->hasOne('App\ApplicantModel','id','applicant_id')->where('is_shortlist','yes')->where('is_selected','yes')->where('is_softdel','no');
    }
   

}
 