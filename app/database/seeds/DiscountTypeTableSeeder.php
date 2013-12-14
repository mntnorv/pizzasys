<?php

class DiscountTypeTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('discount_types')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		DiscountType::create(array(
			'id' => 1,
			'name' => 'Maistui'
		));
		DiscountType::create(array(
			'id' => 2,
			'name' => 'Maisto tipui'
		));
		DiscountType::create(array(
			'id' => 3,
			'name' => 'Užsakymui'
		));
	}
}