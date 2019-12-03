<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = ['registration_id','gfirstName','admissionNum','admissionDate','rollnumber','bloodGroup','birthPlace','nationality','tongue','religion','category_id','disease','country','image'];

    public function registrations()
    {
    	return $this->hasOne('App\Registration','id','registration_id');
    }

    public function categories()
    {
    	return $this->hasOne('App\Category','id','category_id');
    }
}
