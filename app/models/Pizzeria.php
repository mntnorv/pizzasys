<?php

class Pizzeria extends Eloquent {
	protected $hidden = array('created_at', 'updated_at');
	
	public function city() {
		return $this->belongsTo('City');
	}

	public function ingredients() {
		return $this->hasMany('PizzeriaIngredient');
	}

	public function orders() {
		return $this->hasMany('Order');
	}

	public function tables() {
		return $this->hasMany('Table');
	}

	public function users(){
		return $this->hasMany('User');
	}
}