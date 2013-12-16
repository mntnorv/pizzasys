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

// Lina@Druskininkai		
		$order = new Order(array(
			'street' => 'Studentų',
			'building_no' => '69',
			'flat_no' => '101',
			'tel_no' => '836987444',
			'door_code' => '-',
			'comment' => 'Atvežti greitai',
			'price' => '19.99'
		));
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Lina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Lina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Lina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Lina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Lina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Lina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Lina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
		$order->city()->associate($city);
		$order->save();

// Diana@Druskinikai		
		$order = new Order(array(
			'street' => 'Studentų',
			'building_no' => '69',
			'flat_no' => '101',
			'tel_no' => '836987444',
			'door_code' => '-',
			'comment' => 'Atvežti greitai',
			'price' => '19.99'
		));
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Diana')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Diana')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Druskininkų picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas D')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Diana')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Druskininkai')->first();
		$order->city()->associate($city);
		$order->save();

// Evelina@	Vilnius	
		$order = new Order(array(
			'street' => 'Studentų',
			'building_no' => '69',
			'flat_no' => '101',
			'tel_no' => '836987444',
			'door_code' => '-',
			'comment' => 'Atvežti greitai',
			'price' => '19.99'
		));
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Vilniaus picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas V')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Evelina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Vilnius')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Vilniaus picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas V')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Evelina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Vilnius')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Vilniaus picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas V')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Evelina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Vilnius')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Vilniaus picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas V')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Evelina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Vilnius')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Vilniaus picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas V')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Evelina')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Vilnius')->first();
		$order->city()->associate($city);
		$order->save();

// Asta@	Klaipėda	

		$order = new Order(array(
			'street' => 'Studentų',
			'building_no' => '69',
			'flat_no' => '101',
			'tel_no' => '836987444',
			'door_code' => '-',
			'comment' => 'Atvežti greitai',
			'price' => '19.99'
		));
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Klaipėdos picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas K')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Asta')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Klaipėda')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Klaipėdos picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas K')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Asta')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Klaipėda')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Klaipėdos picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas K')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Asta')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Klaipėda')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Klaipėdos picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas K')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Asta')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Klaipėda')->first();
		$order->city()->associate($city);
		$order->save();
		
// Greta@	Kaunas	

		$order = new Order(array(
			'street' => 'Studentų',
			'building_no' => '69',
			'flat_no' => '101',
			'tel_no' => '836987444',
			'door_code' => '-',
			'comment' => 'Atvežti greitai',
			'price' => '19.99'
		));
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 2')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Greta')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 2')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Greta')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 2')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Greta')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 2')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Greta')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Kaunas')->first();
		$order->city()->associate($city);
		$order->save();


// Simona@	Kaunas	

		$order = new Order(array(
			'street' => 'Studentų',
			'building_no' => '69',
			'flat_no' => '101',
			'tel_no' => '836987444',
			'door_code' => '-',
			'comment' => 'Atvežti greitai',
			'price' => '19.99'
		));
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
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
		$order_type = OrderType::where('name', '=', 'Lokalus')->first();
		$order->orderType()->associate($order_type);
		$order_payment_state = OrderPaymentState::where('name', '=', 'Neapmokėta')->first();
		$order->orderPaymentState()->associate($order_payment_state);
		$order_state = OrderState::where('name', '=', 'Įvykdytas')->first();
		$order->orderState()->associate($order_state);
		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$order->pizzeria()->associate($pizzeria);
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$order->table()->associate($table);
		$user = User::where('username', '=', 'Simona')->first();
		$order->user()->associate($user);
		$city = City::where('name', '=', 'Kaunas')->first();
		$order->city()->associate($city);
		$order->save();

	}
}