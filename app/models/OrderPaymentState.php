<?php

class OrderPaymentState extends Eloquent {
	public function orders() {
		return $this->hasMany('Order');
	}
}