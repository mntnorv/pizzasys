<?php

class Discount extends Eloquent {
	public function discountType(){
		return $this->belongsTo('DiscountType');
	}

	public function foodType(){
		return $this->belongsTo('FoodType');
	}

	public function food(){
		return $this->belongsTo('Food');
	}

	public function orders(){
		return $this->belongsTo('Order');
	}
}