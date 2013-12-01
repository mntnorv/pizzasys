<?php

class WaiterTable extends Eloquent {
	public function table() {
		return $this->belongsTo('Table');
	}

	public function user() {
		return $this->belongsTo('User');
	}
}