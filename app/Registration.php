<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
	protected $fillable = ['firstName','middleName','lastName','dateBirth','gender','gfirstName','gmiddleName','glastName','cnic','education','occupation','income','class_id','phone','mobile','address','email','session_id'];
    protected $table = 'registration';

    public function classes()
    {
    	return $this->hasOne('App\MClass','id','class_id');
    }
    public function session()
    {
    	return $this->hasOne('App\Session','id','session_id');
    }
}
