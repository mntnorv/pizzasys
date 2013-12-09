<?php

class FoodTypeTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('food_types')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		FoodType::create(array(
			'id' => 1,
			'name' => 'pizza',
			'displayName' => 'Picos'
		));
		FoodType::create(array(
			'id' => 2,
			'name' => 'steaks',
			'displayName' => 'Kepsniai'
		));
		FoodType::create(array(
			'id' => 3,
			'name' => 'snacks',
			'displayName' => 'Užkandžiai'
		));
		FoodType::create(array(
			'id' => 4,
			'name' => 'drinks',
			'displayName' => 'Gėrimai'
		));
	}
}