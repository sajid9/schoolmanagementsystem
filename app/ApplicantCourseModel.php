<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantCourseModel extends Model
{
    protected $fillable = [
        'name','year', 'institute'
    ];

    protected $table="applicantcourses";
}
