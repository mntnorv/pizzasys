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

	/*
	| POST /api/order/update/{id}
	*/
	public function updateOrder($id) {
		$order = Order::find($id);

		$new_data = array(
			'type_id'     => Input::get('type_id'),
			'pizzeria_id' => Input::get('pizzeria_id'),
			'table_id'    => Input::get('table_id'),
			'city_id'     => Input::get('city_id'),
			'street'      => Input::get('street'),
			'building_no' => Input::get('building_no'),
			'flat_no'     => Input::get('flat_no'),
			'tel_no'      => Input::get('tel_no'),
			'door_code'   => Input::get('door_code'),
			'comment'     => Input::get('comment'),
		);

		$rules = array(
			'type_id'     => 'Exists:order_types,id',
			'pizzeria_id' => 'Exists:pizzerias,id',
			'city_id'     => 'Exists:cities,id',
		);

		$validator = Validator::make($new_data, $rules);
		$validator->sometimes('table_id', 'Exists:tables,id', function($input) {
			return $input->type_id == 1;
		});
		$validator->sometimes(array('street', 'building_no'), 'Required', function($input) {
			return $input->type_id == 2;
		});

		if (!$validator->passes()) {
			return $this->jsonError('INVALID_DATA');
		}

		$order->order_type_id = $new_data['type_id'];
		$order->pizzeria_id   = $new_data['pizzeria_id'];
		$order->city_id       = $new_data['city_id'];

		if ($new_data['type_id'] == 1) {
			$order->table_id    = $new_data['table_id'];
			$order->street      = null;
			$order->building_no = null;
			$order->flat_no     = null;
			$order->tel_no      = null;
			$order->door_code   = null;
			$order->comment     = null;
		} else if ($new_data['type_id'] == 2) {
			$order->street      = $new_data['street'];
			$order->building_no = $new_data['building_no'];
			$order->flat_no     = $new_data['flat_no'];
			$order->tel_no      = $new_data['tel_no'];
			$order->door_code   = $new_data['door_code'];
			$order->comment     = $new_data['comment'];
			$order->table_id    = null;
		}

		$order->save();

		return $this->jsonSuccess('ORDER_UPDATED');
	}

}