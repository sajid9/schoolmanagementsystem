<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CEnrollment extends Model
{
    protected $fillable = ['admission_id','batch_id','gfirstName','dateBirth','is_active'];

    public function admissions()
    {
    	return $this->hasOne('App\Admission','id','admission_id');
    }

    public function batches()
    {
    	return $this->hasOne('App\Batch','id','batch_id');
    }
}
