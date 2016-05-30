<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $table = 'appointments';
    protected $fillable = ['customer_id','branch_id','service_id','appointment_at','priority','user_id'];

	public function Customer(){
		return $this->belongsTo('App\Customer', 'customer_id');
	}

	public function Branch(){
		return $this->belongsTo('App\Branch', 'branch_id');
	}

	public function Service(){
		return $this->belongsTo('App\Service', 'service_id');
	}

	public function User(){
		return $this->belongsTo('App\User', 'user_id');
	}
	 
}
