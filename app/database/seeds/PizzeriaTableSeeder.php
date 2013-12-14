<?php

class PizzeriaTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('pizzerias')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$pizzeria = new Pizzeria(array(
			'id'=> 1,
			'name' => 'Kauno picerija 1',
			'address' => 'Saulės gatvė 41'
		));

		$city = City::where('name', '=', 'Kaunas')->first();
		$pizzeria->city()->associate($city);
		$pizzeria->save();

		$pizzeria = new Pizzeria(array(
			'id'=> 2,
			'name' => 'Vilniaus picerija 1',
			'address' => 'Saulėtekio alėja 5'
		));

		$city = City::where('name', '=', 'Vilnius')->first();
		$pizzeria->city()->associate($city);
		$pizzeria->save();

		$pizzeria = new Pizzeria(array(
			'id'=> 3,
			'name' => 'Klaipėdos picerija 1',
			'address' => 'Vilniaus gatvė 5'
		));

		$city = City::where('name', '=', 'Klaipėda')->first();
		$pizzeria->city()->associate($city);
		$pizzeria->save();

		$pizzeria = new Pizzeria(array(
			'id'=> 4,
			'name' => 'Druskininkų picerija 1',
			'address' => 'Čiurlionio gatvė 26'
		));

		$city = City::where('name', '=', 'Druskininkai')->first();
		$pizzeria->city()->associate($city);
		$pizzeria->save();
	}
}