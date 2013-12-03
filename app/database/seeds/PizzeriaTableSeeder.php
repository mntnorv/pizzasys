<?php

class PizzeriaTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('pizzerias')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$pizzeria = new Pizzeria(array(
			'name' => 'Kauno picerija',
			'address' => 'Saulės gatvė 41'
		));

		$city = City::where('name', '=', 'Kaunas')->first();
		$pizzeria->city()->associate($city);
		$pizzeria->save();
	}
}