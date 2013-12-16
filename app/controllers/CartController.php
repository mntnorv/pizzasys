<?php

class CartController extends BaseController {

	/*
	| GET /cart
	*/

	public function showContents() {
		$cartItems = NULL;
		$cartPrice = 0;
		if (Session::has('cart_order_id')) {
			$cartOrder = Order::find(Session::get('cart_order_id'));
			$cartPrice = $cartOrder->price;
			$cartItems = OrderFood::where('order_id', '=', $cartOrder->id)->get();
		} else {
			$cartItems = OrderFood::where('order_id', '=', 0)->get();
		}

		return View::make('cart', array(
			'cartItems' => $cartItems,
			'cartPrice' => $cartPrice,
		));
	}

	/*
	| GET /cart/order
	*/

	public function handleOrder() {
		$order = Order::find(Session::get('cart_order_id'));
		$order->order_state_id = 2; // Set order state to accepted
		$order->save();

		Session::forget('cart_order_id');

		return Redirect::route('home')
			->with('flash_message', 'Sėkmingai užsakyta')
			->with('flash_type', 'success');
	}

	/*
	| GET /cart/delivery
	*/

	public function showDelivery() {
		$cartOrder = Order::find(Session::get('cart_order_id'));
		$cities = Pizzeria::join('cities', 'pizzerias.city_id', '=', 'cities.id')
			->get()->lists('name', 'id');

		$orderInfo = new stdClass();
		$orderInfo->city_id = Input::old('city_id') == NULL
			? Input::old('city_id')
			: $cartOrder->city->name;
		$orderInfo->street = Input::old('street') == NULL
			? Input::old('street')
			: $cartOrder->street;
		$orderInfo->building_no = Input::old('building_no') == NULL
			? Input::old('building_no')
			: $cartOrder->building_no;
		$orderInfo->flat_no = Input::old('flat_no') == NULL
			? Input::old('flat_no')
			: $cartOrder->flat_no;
		$orderInfo->tel_no = Input::old('tel_no') == NULL
			? Input::old('tel_no')
			: $cartOrder->tel_no;
		$orderInfo->door_code = Input::old('door_code') == NULL
			? Input::old('door_code')
			: $cartOrder->door_code;
		$orderInfo->comment = Input::old('comment') == NULL
			? Input::old('comment')
			: $cartOrder->comment;

		return View::make('cart.delivery', array(
			'orderInfo' => $orderInfo,
			'cities'    => $cities,
		));
	}

	/*
	| POST /cart/delivery
	*/

	public function setDelivery() {
		$data = array(
			'city_id'     => Input::get('city_id', null),
			'street'      => Input::get('street', null),
			'building_no' => Input::get('building_no', null),
			'flat_no'     => Input::get('flat_no', null),
			'tel_no'      => Input::get('tel_no', null),
			'door_code'   => Input::get('door_code', null),
			'comment'     => Input::get('comment', null),
		);

		$rules = array(
			'city_id'     => 'Required',
			'street'      => 'Required|Max:256',
			'building_no' => 'Required|AlphaNum|Min:0',
			'flat_no'     => 'Numeric|Min:1',
			'tel_no'      => 'Between:5,16',
			'door_code'   => 'Max:16',
			'comment'     => 'Max:1024',
		);

		$validator = Validator::make($data, $rules);
		if ($validator->fails()) {
			$errors = $validator->messages()->all();
			$error_messages = implode('<br/>', $errors);

			Input::flash();
			return Redirect::route('cart.delivery')
				->with('flash_message', $error_messages)
				->with('flash_type', 'error');
		}

		$order = Order::find(Session::get('cart_order_id'));
		$order->city_id     = Input::get('city_id');
		$order->street      = Input::get('street');
		$order->building_no = Input::get('building_no');
		$order->flat_no     = Input::get('flat_no');
		$order->tel_no      = Input::get('tel_no');
		$order->door_code   = Input::get('door_code');
		$order->comment     = Input::get('comment');
		$order->save();

		return Redirect::route('cart.confirm');
	}

	/*
	| GET /cart/confirm
	*/

	public function showConfirmation() {
		$cartOrder = Order::find(Session::get('cart_order_id'));
		return View::make('cart.confirm', array(
			'cartOrder' => $cartOrder
		));
	}

	/*
	| POST /api/cart/add
	*/
	public function addFood() {
		if (!Input::has('food_id')) {
			return $this->jsonError('INVALID_REQUEST');
		}

		$foodId = Input::get('food_id');

		$order = NULL;
		if (!Session::has('cart_order_id')) {
			$order = Order::create(array(
				'order_type_id'          => 2,
				'order_state_id'         => 1,
				'order_payment_state_id' => 1,
				'price'                  => 0,
			));
			Session::put('cart_order_id', $order->id);
		} else {
			$order = Order::find(Session::get('cart_order_id'));
		}

		$food = Food::find($foodId);
		if ($food === NULL) {
			return $this->jsonError('INVALID_FOOD_ID');
		}

		$orderFood = OrderFood::where('food_id', '=', $food->id)
			->where('order_id', '=', $order->id)->first();

		if ($orderFood !== NULL) {
			$orderFood->amount++;
		} else {
			$orderFood = new OrderFood();
			$orderFood->amount = 1;
			$orderFood->order()->associate($order);
			$orderFood->food()->associate($food);
		}

		$orderFood->save();
		$order->price += $food->getDiscountedPriceAttribute();
		$order->save();

		return $this->jsonSuccess('FOOD_ADDED');
	}

	/*
	| POST /api/cart/remove
	*/
	public function removeFood() {
		if (!Input::has('food_id')) {
			return $this->jsonError('INVALID_REQUEST');
		}

		if (!Session::has('cart_order_id')) {
			return $this->jsonError('CART_EMPTY');
		}

		$order = Order::find(Session::get('cart_order_id'));
		$orderFood = OrderFood::where('order_id', '=', $order->id)
			->where('food_id', '=', Input::get('food_id'))->get()->first();

		if ($orderFood === NULL) {
			return $this->jsonError('INVALID_FOOD_ID');
		}

		$order->price -= $orderFood->food->getDiscountedPriceAttribute() * $orderFood->amount;
		$order->save();
		$orderFood->delete();

		return $this->jsonSuccess('FOOD_REMOVED');
	}

	/*
	| POST /api/cart/update
	*/
	public function updateFood() {
		if (!Input::has('food_id') || !Input::has('amount')) {
			return $this->jsonError('INVALID_REQUEST');
		}

		if (!Session::has('cart_order_id')) {
			return $this->jsonError('CART_EMPTY');
		}

		$order = Order::find(Session::get('cart_order_id'));
		$orderFood = OrderFood::where('order_id', '=', $order->id)
			->where('food_id', '=', Input::get('food_id'))->get()->first();

		if ($orderFood === NULL) {
			return $this->jsonError('INVALID_FOOD_ID');
		}

		$newAmount = Input::get('amount');
		if ($newAmount < 0 || $newAmount > 1000) {
			return $this->jsonError('INVALID_AMOUNT');
		}

		$amountDiff = $newAmount - $orderFood->amount;
		$orderFood->amount = $newAmount;
		$orderFood->save();

		$order->price += $amountDiff * $orderFood->food->getDiscountedPriceAttribute();
		$order->save();

		return $this->jsonSuccess('FOOD_UPDATED');
	}

}