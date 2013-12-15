<?php

class ApiController extends BaseController {

	/*
	| GET /api/get/user/{id}
	*/
	public function getUser($id){
		
		$user = User::find($id);

		if($user == NULL) {
			return $this->jsonError("INVALID_USER_ID");
		}

		return $user;
	}

	/*
	| GET /api/get/food
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
	| GET /api/get/foodtypes
	*/
	public function getFoodTypes() {
		$foodTypes = FoodType::all();

		return Response::json(
			$foodTypes->toArray()
		);
	}

	/*
	| GET /api/get/food/{type}
	*/
	public function getFoodByType($type_id) {
		$type = FoodType::where('name', '=', $type_id)->first();

		if ($type == NULL) {
			return $this->jsonError("INVALID_FOOD_TYPE_ID");
		}

		$food = Food::where('food_type_id', '=', $type->id)->get();

		return Response::json(array(
			'food' => $food->toArray()
		));
	}

	/*
	| GET /api/get/pizzerias/{city_id}
	*/
	public function getPizzeriasByCity($city_id) {
		$city = City::find($city_id);

		if ($city == NULL) {
			return $this->jsonError('INVALID_CITY_ID');
		}

		$pizzerias = Pizzeria::where('city_id', '=', $city->id)->get();

		return Response::json($pizzerias->toArray());
	}

	/*
	| GET /api/get/tables/{pizzeria_id}
	*/
	public function getTablesByPizzeria($pizzeria_id) {
		$pizzeria = Pizzeria::find($pizzeria_id);

		if ($pizzeria == NULL) {
			return $this->jsonError('INVALID_PIZZERIA_ID');
		}

		$tables = Table::where('pizzeria_id', '=', $pizzeria->id)->get();

		return Response::json($tables->toArray());
	}
}