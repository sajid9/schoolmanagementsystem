<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = ['batchName','class_id','section_id','year_id','employe_id'];

    public function classes()
    {
    	return $this->hasOne('App\MClass','id','class_id');
    }
    public function sections()
    {
    	return $this->hasOne('App\Section','id','section_id');
    }

    public function years()
    {
    	return $this->hasOne('App\Year','id','year_id');
    }
    public function employees()
    {
    	return $this->hasMany('App\Employe','id','employe_id');
    }
    public function classenroll()
    {
        return $this->hasMany('App\CEnrollment','batch_id','id')->where('is_active','yes');
    }
}
