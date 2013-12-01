<?php

class Table extends Eloquent {
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