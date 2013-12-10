<?php

class OrderFood extends Eloquent{

	protected $table = 'order_food';
	protected $guarded = array('id');

	public function order(){
		return $this->belongsTo('Order');
	}

	public function food(){
		return $this->belongsTo('Food');
	}
}
