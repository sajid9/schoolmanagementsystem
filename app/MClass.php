<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MClass extends Model
{
	protected $table = 'classes';
    protected $fillable = ['c_name'];
}
