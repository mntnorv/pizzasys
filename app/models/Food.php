<?php

class Food extends Eloquent {
	protected $table = "food";
	protected $hidden = array('created_at', 'updated_at');
	
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