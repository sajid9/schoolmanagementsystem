<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
   
    public function account()
    {
    	return $this->hasOne('App\accounts','id','account_id');
    }
    
}
