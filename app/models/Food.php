<?php

class Food extends Eloquent {
	$table = "food";
	
	public function type() {
		return $this->belongsTo('FoodType');
	}

	public function foodIngredients() {
		return $this->hasMany('FoodIngredient');
	}

	public function orderFood() {
		return $this->hasMany('OrderFood');
	}
}