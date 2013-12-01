<?php

class Pizzeria extends Eloquent {
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
}