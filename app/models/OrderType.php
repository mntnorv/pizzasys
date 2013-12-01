<?php

class OrderType extends Eloquent {
	public function orders() {
		return $this->hasMany('Order');
	}
}