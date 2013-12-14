<?php

class OrderController extends BaseController {

	/*
	| GET /admin/orders
	*/

	public function showOrderList() {
		$orders = Order::where('order_state_id', '<>', 1)
			->where('order_state_id', '<>', 5)->get();

		return View::make('admin.orders', array(
			'orders' => $orders
		));
	}

}