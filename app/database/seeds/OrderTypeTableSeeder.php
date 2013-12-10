<?php

class OrderTypeTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('order_types')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		OrderType::create(array(
			'id' => 1,
			'name' => 'Lokalus'
		));
		OrderType::create(array(
			'id' => 2,
			'name' => 'Į namus'
		));
	}
}