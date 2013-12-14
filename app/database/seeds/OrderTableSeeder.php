<?php

class OrderTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('orders')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$order = new Order(array(
			'street' => 'Studentų',
			'building_no' => '69',
			'flat_no' => '101',
			'tel_no' => '836987444',
			'door_code' => '-',
			'comment' => 'Atvežti greitai',
			'price' => '19.99'
		));
		$order_type = OrderType::where('name', '=', 'Į namus')->first();
		$order->orderType()->associate($order_type);

		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);

		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		// $table = Table::where('name', '=', 'Staliukas 1')->first();
		// $order->table()->associate($table);
		$user = User::where('username', '=', 'admin')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Kaunas')->first();
		$order->city()->associate($city);
		$order->save();
		
		$order = new Order(array(
			'street' => 'Studentų',
			'building_no' => '69',
			'flat_no' => '102',
			'tel_no' => '836987444',
			'door_code' => '-',
			'comment' => 'Atvežti greitai',
			'price' => '19.99'
		));
		$order_type = OrderType::where('name', '=', 'Į namus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Apmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		// $table = Table::where('name', '=', 'Staliukas 1')->first();
		// $order->table()->associate($table);
		$user = User::where('username', '=', 'admin')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Kaunas')->first();
		$order->city()->associate($city);
		$order->save();
		
		$order = new Order(array(
			'street' => 'Studentų',
			'building_no' => '69',
			'flat_no' => '101',
			'tel_no' => '836987444',
			'door_code' => '-',
			'comment' => 'Atvežti greitai',
			'price' => '19.99'
		));
		$order_type = OrderType::where('name', '=', 'Į namus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		// $table = Table::where('name', '=', 'Staliukas 1')->first();
		// $order->table()->associate($table);
		$user = User::where('username', '=', 'admin')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Kaunas')->first();
		$order->city()->associate($city);
		$order->save();

	}
}