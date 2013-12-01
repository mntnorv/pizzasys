<?php

class OrderFood extends Eloquent{

	public function order(){
		return $this->belongsTo('Order');
	}

	public function food(){
		return $this->belongsTo('Food');
	}
}
