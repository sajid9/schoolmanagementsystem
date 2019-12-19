<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeCharge extends Model
{
    protected $fillable = ['chargType_id','chargCategory_id','chargHead_id','class_id','feeAmount'];

    public function chargTypes()
    {
    	return $this->hasOne('App\FeeChargType','id','chargType_id');
    }
    public function chargCategories()
    {
    	return $this->hasOne('App\FeeChargCategory','id','chargCategory_id');
    }

    public function chargHeads()
    {
    	return $this->hasOne('App\FeeChargHead','id','chargHead_id');
    }

    public function classes()
    {
    	return $this->hasOne('App\MClass','id','class_id');
    }
}
