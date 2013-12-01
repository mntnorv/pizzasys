<?php

class DiscountType extends Eloquent {
	public function discounts() {
		return $this->hasMany('Discount');
	}
}