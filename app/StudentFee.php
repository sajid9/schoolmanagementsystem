<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    protected $fillable = ['stdTotalFee_id','chargHead_id','chargType_id','feeAmount','transactionType','remarks'];

    public function stdTotalFees()
    {
    	return $this->hasOne('App\StudentTotalFee','id','stdTotalFee_id');
    }

    public function chargHeads()
    {
    	return $this->hasOne('App\FeeChargHead','id','chargHead_id');
    }

    public function chargTypes()
    {
    	return $this->hasOne('App\FeeChargType','id','chargType_id');
    }
}
