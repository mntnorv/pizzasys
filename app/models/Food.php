<?php

class Food extends Eloquent {
	protected $table = "food";
	protected $appends = array('discounted_price');
	protected $visible = array('id', 'name', 'food_type_id', 'price', 'discounted_price', 'value');
	
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

	public function getDiscountedPriceAttribute() {
		$fullDiscount = 1;
		$discounts = $this->foodDiscounts;
		$typeDiscounts = $this->foodType->foodTypeDiscounts;

		$discounts->each(function($discount) use (&$fullDiscount) {
			$fullDiscount *= (100 - $discount->percentage) / 100;
		});
		$typeDiscounts->each(function($discount) use (&$fullDiscount) {
			$fullDiscount *= (100 - $discount->percentage) / 100;
		});

		return $fullDiscount * $this->price;
	}
}