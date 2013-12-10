<?php

class Order extends Eloquent {
	protected $guarded = array('id');

	public function table() {
		return $this->belongsTo('Table');
	}

	public function orderFood() {
		return $this->hasMany('OrderFood');
	}

	public function discounts() {
		return $this->hasMany('Discount');
	}

	public function state() {
		return $this->belongsTo('OrderState');
	}

	public function type() {
		return $this->belongsTo('OrderType');
	}

	public function pizzeria() {
		return $this->belongsTo('Pizzeria');
	}

	public function user() {
		return $this->belongsTo('User');
	}
}