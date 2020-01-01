<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeCharge extends Model
{
    protected $fillable = ['chargCategory_id','chargHead_id','class_id','feeAmount','transactionType'];

    
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
