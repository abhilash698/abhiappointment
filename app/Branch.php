<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    protected $table = 'branches';
    protected $fillable = ['name','display_name','address','description'];

	public function Customers(){
		return $this->hasMany('App\Customer', 'branch_id');
	}

	public function Appointments(){
		return $this->hasMany('App\Appointment', 'branch_id');
	}

	public function Users(){
		return $this->hasMany('App\Users','branch_id');
	}
	 
}
