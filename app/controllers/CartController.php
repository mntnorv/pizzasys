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
			'cartPrice' => $cartPrice
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
				'order_type_id'  => 2,
				'order_state_id' => 1,
				'price'          => 0
			));
			Session::put('cart_order_id', $order->id);
		} else {
			$order = Order::find(Session::get('cart_order_id'));
		}

		$food = Food::find($foodId);
		if ($food === NULL) {
			return $this->jsonError('INVALID_REQUEST');
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
		$order->price += $food->price;
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
			return $this->jsonError('INVALID_REQUEST');
		}

		$order->price -= $orderFood->food->price * $orderFood->amount;
		$order->save();
		$orderFood->delete();

		return $this->jsonSuccess('FOOD_REMOVED');
	}

}