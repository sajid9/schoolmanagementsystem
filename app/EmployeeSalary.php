<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
   protected $fillable = ['employee_id','emp_cnic','chargHead_id','month_id','salary_date','salaryAmount','receptType'];

    public function employees()
    {
    	return $this->hasOne('App\Employe','id','employee_id');
    }

    public function chargHeads()
    {
    	return $this->hasOne('App\SalaryChargHead','id','chargHead_id');
    }

    public function months()
    {
    	return $this->hasOne('App\Month','id','month_id');
    }
}
