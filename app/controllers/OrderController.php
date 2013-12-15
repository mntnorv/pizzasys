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

	/*
	| GET /admin/order/{id}
	*/

	public function showEditOrder($id) {
		$order          = Order::find($id);
		$types          = OrderType::all()->lists('name', 'id');
		$states         = OrderState::all()->lists('name', 'id');
		$payment_states = OrderPaymentState::all()->lists('name', 'id');
		$pizzerias      = Pizzeria::all()->lists('name', 'id');
		$cities         = Pizzeria::join('cities', 'pizzerias.city_id', '=', 'cities.id')
			->get()->lists('name', 'id');

		return View::make('admin.edit_order', array(
			'order'          => $order,
			'types'          => $types,
			'states'         => $states,
			'payment_states' => $payment_states,
			'pizzerias'      => $pizzerias,
			'cities'         => $cities,
		));
	}

}