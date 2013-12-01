<?php

class Food extends Eloquent {
	public function type() {
		return $this->belongsTo('FoodType');
	}
}