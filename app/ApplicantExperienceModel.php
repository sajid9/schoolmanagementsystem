<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ApplicantExperienceModel extends Model
{
protected $fillable = [
'employer',
'title',
'field', 
'start_date',
'end_date'
];
protected $table="applicantexperiences";
} 
