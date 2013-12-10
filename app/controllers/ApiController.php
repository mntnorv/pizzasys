<?php

class ApiController extends BaseController {

	/*
	| GET /user/{id}
	*/
	public function getUser($id){
		
		$user = User::find($id);

		if($user == NULL) {
			return $this->jsonError("User not found");
		}

		return $user;
	}

	/*
	| GET /food
	*/
	public function getFood() {
		$food = Food::all();

		return Response::json(array(
			'food' => $food->toArray()
		));
	}

	/*
	| GET /food/{type}
	*/
	public function getFoodByType($type_id) {
		$type = FoodType::where('name', '=', $type_id)->first();

		if ($type == NULL) {
			return $this->jsonError("Invalid food type");
		}

		$food = Food::where('food_type_id', '=', $type->id)->get();

		return Response::json(array(
			'food' => $food->toArray()
		));
	}
}