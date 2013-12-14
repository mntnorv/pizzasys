<?php

class Order extends Eloquent {
	protected $guarded = array('id');

	public function city() {
		return $this->belongsTo('City');
	}

	public function table() {
		return $this->belongsTo('Table');
	}

	public function orderFood() {
		return $this->hasMany('OrderFood');
	}

	public function discounts() {
		return $this->hasMany('Discount');
	}

	public function orderState() {
		return $this->belongsTo('OrderState');
	}

	public function orderPaymentState() {
		return $this->belongsTo('OrderPaymentState');
	}

	public function orderType() {
		return $this->belongsTo('OrderType');
	}

	public function pizzeria() {
		return $this->belongsTo('Pizzeria');
	}

	public function user() {
		return $this->belongsTo('User');
	}
}