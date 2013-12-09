<?php

class IngredientsTypeTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('ingredient_types')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		IngredientType::create(array('name' => 'Mėsa',
							'measurment_unit' => 'kg'));
		IngredientType::create(array('name' => 'Daržovė',
							'measurment_unit' => 'kg'));
		IngredientType::create(array('name' => 'Vaisius',
							'measurment_unit' => 'kg'));
		IngredientType::create(array('name' => 'Gėrimas',
							'measurment_unit' => 'l'));
	}
}