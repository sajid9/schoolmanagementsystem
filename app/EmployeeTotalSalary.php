<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTotalSalary extends Model
{
    protected $fillable = ['employee_id','month_id','totalAmount'];

    public function employees()
    {
    	return $this->hasOne('App\Employe','id','employee_id');
    }

   
    public function months()
    {
    	return $this->hasOne('App\Month','id','month_id');
    }
}
