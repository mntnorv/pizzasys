<?php

class OrderPaymentStateTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('order_payment_states')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		OrderPaymentState::create(array(
			'id' => 1,
			'name' => 'Neapmokėta'
		));
		OrderPaymentState::create(array(
			'id' => 2,
			'name' => 'Apmokėta'
		));
	}
}