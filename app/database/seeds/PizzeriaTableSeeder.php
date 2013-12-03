<?php

class PizzeriaTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->delete();

		Pizzeria::create(array(
			'name' => 'Kauno picerija',
			'address' => 'Saulės gatvė 41',
			'city_id' => 27
		));
	}
}