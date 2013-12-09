<?php

class FoodTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('food')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		Food::create(array(
			'name'         => 'Skani pica',
			'food_type_id' => 1,
			'price'        => 1
		));
	}
}