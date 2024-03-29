<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Eloquent::unguard();

		$this->call('CityTableSeeder');
		$this->call('PizzeriaTableSeeder');
		$this->call('UserTypeTableSeeder');
		$this->call('EmployeeShiftsTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('FoodTypeTableSeeder');
		$this->call('FoodTableSeeder');
		$this->call('IngredientTypeTableSeeder');
		$this->call('IngredientTableSeeder');
		$this->call('OrderTypeTableSeeder');
		$this->call('OrderStateTableSeeder');
		$this->call('PizzeriaIngredientsTableSeeder');
		$this->call('TableTableSeeder');
		$this->call('WaiterTableTableSeeder');
		$this->call('FoodIngredientTableSeeder');
		$this->call('OrderPaymentStateTableSeeder');
		$this->call('OrderTableSeeder');
		$this->call('OrderFoodTableSeeder');
		$this->call('ReportTypeTableSeeder');
		$this->call('ReportTableSeeder');
		$this->call('DiscountTypeTableSeeder');
		$this->call('DiscountTableSeeder');		
	}

}