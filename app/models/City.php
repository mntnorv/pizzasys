<?php

class City extends Eloquent {
	public function pizzerias() {
		return $this->hasMany('Pizzeria');
	}
}