<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreviousData extends Model
{
	protected $fillable = ['instName','class','year','marks'];
}
