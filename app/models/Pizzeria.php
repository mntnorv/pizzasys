<?php

class Pizzeria extends Eloquent {
	public function city() {
		return $this->belongsTo('City');
	}
}