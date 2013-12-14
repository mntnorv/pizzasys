<?php

class TableTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('tables')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$table = new Table(array(
			'name' => 'Staliukas 1'
		));

		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$table->pizzeria()->associate($pizzeria);
		$table->save();

		$table = new Table(array(
			'name' => 'Staliukas 2'
		));

		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$table->pizzeria()->associate($pizzeria);
		$table->save();

		$table = new Table(array(
			'name' => 'Staliukas 3'
		));

		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$table->pizzeria()->associate($pizzeria);
		$table->save();

		$table = new Table(array(
			'name' => 'Staliukas 4'
		));

		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$table->pizzeria()->associate($pizzeria);
		$table->save();

		$table = new Table(array(
			'name' => 'Staliukas 5'
		));

		$pizzeria = Pizzeria::where('name', '=', 'Kauno picerija 1')->first();
		$table->pizzeria()->associate($pizzeria);
		$table->save();
		
	}
}