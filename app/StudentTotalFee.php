<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTotalFee extends Model
{
    protected $fillable = ['enrollment_id','month_id','totalAmount'];

    public function enrollments()
    {
    	return $this->hasOne('App\CEnrollment','id','enrollment_id');
    }

   
    public function months()
    {
    	return $this->hasOne('App\Month','id','month_id');
    }
}
