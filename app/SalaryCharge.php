<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryCharge extends Model
{
    protected $fillable = ['chargCategory_id','chargHead_id','employeeGrade_id','salaryAmount','transactionType'];

   
    public function chargCategories()
    {
    	return $this->hasOne('App\SalaryChargCategory','id','chargCategory_id');
    }

    public function chargHeads()
    {
    	return $this->hasOne('App\SalaryChargHead','id','chargHead_id');
    }

    public function employeeGrades()
    {
    	return $this->hasOne('App\EmployeeGrade','id','employeeGrade_id');
    }
}
