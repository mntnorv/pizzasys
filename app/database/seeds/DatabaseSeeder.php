<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Eloquent::unguard();

		$this->call('UserTypeTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('CityTableSeeder');
		$this->call('PizzeriaTableSeeder');
		$this->call('FoodTypeTableSeeder');
		$this->call('FoodTableSeeder');
	}

}