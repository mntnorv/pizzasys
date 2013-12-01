<?php

class FoodIngredient extends Eloquent {
	public function ingredient() {
		return $this->belongsTo('Ingredient');
	}

	public function food() {
		return $this->belongsTo('Food');
	}
}