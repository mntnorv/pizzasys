<?php

class FoodTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('food')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		Food::create(array(
			'name'         => 'Capricioza',
			'food_type_id' => 1,
			'price'        => 1
		));

		Food::create(array(
			'name'         => 'Steikas',
			'food_type_id' => 2,
			'price'        => 1
		));

		Food::create(array(
			'name'         => 'Koldūnai',
			'food_type_id' => 3,
			'price'        => 1
		));

		Food::create(array(
			'name'         => 'Coca cola',
			'food_type_id' => 4,
			'price'        => 1
		));
	}
}