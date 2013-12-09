<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHome() {
		$food = Food::all();
		$foodTypes = FoodType::all();
		
		return View::make('home', array(
			'food'      => $food,
			'foodTypes' => $foodTypes
		));
	}

	public function showCategory($category) {
		$categoryObj = FoodType::where('name', '=', $category)->first();
		$food = Food::where('food_type_id', '=', $categoryObj->id)->get();

		return View::make('food_category', array(
			'food' => $food
		));
	}

}