<?php

class EmployeeShift extends Eloquent{

	public function users(){
		return $this->hasMany('User');
	}
}