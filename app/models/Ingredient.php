<?php

class Ingredient extends Eloquent {
	public function ingredientType() {
		return $this->belongsTo('IngredientTypes');
	}
}