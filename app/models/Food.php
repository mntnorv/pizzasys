<?php

class Food extends Eloquent {
	protected $table = "food";
	
	public function foodType() {
		return $this->belongsTo('FoodType');
	}

	public function foodIngredients() {
		return $this->hasMany('FoodIngredient');
	}

	public function orderFood() {
		return $this->hasMany('OrderFood');
	}
}