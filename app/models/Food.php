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

	public function foodDiscounts() {
		return $this->hasMany('Discount');
	}

	public function getDiscountAttribute() {
		$fullDiscount = 1;
		$discounts = $this->foodDiscounts;
		$typeDiscounts = $this->foodType->foodTypeDiscounts;

		$discounts->each(function($discount) use (&$fullDiscount) {
			$fullDiscount *= (100 - $discount->percentage) / 100;
		});
		$typeDiscounts->each(function($discount) use (&$fullDiscount) {
			$fullDiscount *= (100 - $discount->percentage) / 100;
		});

		return $fullDiscount;
	}
}