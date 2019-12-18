<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantDesignationModel extends Model
{
   protected $fillable = [
        'designation'
    ];
 
    protected $table="applicantdesignations";

}
  