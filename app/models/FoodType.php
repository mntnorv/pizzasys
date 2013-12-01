<?php

class FoodType extends Eloquent {
	public function food() {
		return $this->hasMany('Food');
	}
}