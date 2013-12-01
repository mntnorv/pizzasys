<?php

class Ingredient extends Eloquent {
	public function type() {
		return $this->belongsTo('IngredientType');
	}

	public function pizzeriaIngredients() {
		return $this->hasMany('PizzeriaIngredient');
	}

	public function foodIngredients() {
		return $this->hasMany('FoodIngredient');
	}
}