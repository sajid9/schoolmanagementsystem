<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
   protected $fillable = ['empTotalSalary_id','chargHead_id','chargType_id','salaryAmount','transactionType'];

    public function empTotalSalaries()
    {
    	return $this->hasOne('App\EmployeeTotalSalary','id','empTotalSalary_id');
    }

    public function chargHeads()
    {
    	return $this->hasOne('App\SalaryChargHead','id','chargHead_id');
    }

    public function chargTypes()
    {
    	return $this->hasOne('App\SalaryChargType','id','chargType_id');
    }
}
