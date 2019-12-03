<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = ['periodName','time_id','day_id','classRoom_id'];

    public function times()
    {
    	return $this->hasOne('App\Time','id','time_id');
    }
    public function days()
    {
    	return $this->hasOne('App\Day','id','day_id');
    }

    public function classRooms()
    {
    	return $this->hasOne('App\ClassRoom','id','classRoom_id');
    }
}
