<?php

class CartController extends BaseController {

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
				'order_state_id' => 1
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
			$orderFood->save();
		} else {
			$orderFood = new OrderFood();
			$orderFood->amount = 1;
			$orderFood->order()->associate($order);
			$orderFood->food()->associate($food);
			$orderFood->save();
		}

		return $this->jsonSuccess('Added food to order');
	}

}