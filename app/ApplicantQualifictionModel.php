<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ApplicantQualifictionModel extends Model
{
protected $fillable = [
'degree',
'total_marks',
'obtain_marks',
'institute',
'year_of_passing'
];
protected $table="applicantqualifictions";
}