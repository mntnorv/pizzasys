<?php

class PizzeriaIngredient extends Eloquent {
	public function pizzeria() {
		return $this->belongsTo('Pizzeria');
	}

	public function ingredient() {
		return $this->belongsTo('Ingredient');
	}
}