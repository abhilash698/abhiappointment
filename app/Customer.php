<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';
    protected $fillable = ['name','email','address','age','mobile','sex','notes','branch_id'];

	public function Appointments(){
		return $this->hasMany('App\Appointment', 'customer_id');
	}

	public function Branch(){
		return $this->belongsTo('App\Branch', 'branch_id');
	}
	 
}
