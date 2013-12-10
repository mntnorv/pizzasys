<?php

class OrderStateTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('order_states')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		OrderState::create(array(
			'id' => 1,
			'name' => 'Naujas'
		));
		OrderState::create(array(
			'id' => 2,
			'name' => 'Priimtas'
		));
		OrderState::create(array(
			'id' => 3,
			'name' => 'Vykdomas'
		));
		OrderState::create(array(
			'id' => 4,
			'name' => 'Vežamas'
		));
		OrderState::create(array(
			'id' => 5,
			'name' => 'Įvykdytas'
		));
	}
}