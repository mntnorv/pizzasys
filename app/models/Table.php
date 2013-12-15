<?php

class Table extends Eloquent {
	protected $hidden = array('created_at', 'updated_at');
	
	public function pizzeria() {
		return $this->belongsTo('Pizzeria');
	}

	public function waiterTables() {
		return $this->hasMany('WaiterTable');
	}

	public function orders() {
		return $this->hasMany('Order');
	}
}