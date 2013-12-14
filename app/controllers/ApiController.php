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
		if(Input::get('term') == NULL){
			$food = Food::all();

			return Response::json(array(
				'food' => $food->toArray()
			));
		}else{
			$query = Input::get('term');
			$foods = Food::where('name', 'LIKE', "%$query%")->get();
			foreach($foods as $food){
				$food['value'] = $food['name'];
			}
			return Response::json($foods);
		}
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