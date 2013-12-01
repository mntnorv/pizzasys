<?php

class Pizzeria extends Eloquent {
	protected $fillable = array(
		'name',
		'address',
		'city_id'
	);
}