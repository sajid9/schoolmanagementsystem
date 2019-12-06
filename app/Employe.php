<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = ['emp_name','employeeGrade_id'];


    public function employeeGrades()
    {
    	return $this->hasOne('App\EmployeeGrade','id','employeeGrade_id');
    }
}
