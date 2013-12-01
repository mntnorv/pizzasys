<?php

class OrderState extends Eloquent {
	public function orders() {
		return $this->hasMany('Order');
	}
}