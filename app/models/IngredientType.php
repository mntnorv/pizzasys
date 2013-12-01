<?php

class IngredientType extends Eloquent {
	public function ingredients() {
		return $this->hasMany('Ingredient');
	}
}