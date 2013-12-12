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
	| POST /api/cart/food
	*/
	public function addFood() {
		if (!Input::has('food_id')) {
			return $this->jsonError('food_id not specified');
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
			return $this->jsonError('Invalid food_id');
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

		return $this->jsonSuccess('Added food to order');
	}

}