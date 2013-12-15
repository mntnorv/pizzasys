<?php

class FoodType extends Eloquent {
	protected $hidden = array('created_at', 'updated_at');
	
	public function food() {
		return $this->hasMany('Food');
	}

	public function foodTypeDiscounts() {
		return $this->hasMany('Discount');
	}
}