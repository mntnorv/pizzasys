<?php

class DiscountTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('discounts')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$discount = new Discount(array(
			'name' => 'Nuolaida maistui 1',
			'percentage' => '6.66'
		));
		$discount_type = DiscountType::where('name', '=', 'Maistui')->first();
		$discount->discountType()->associate($discount_type);
		$type = Food::where('name', '=', 'Capricioza')->first();
		$discount->food()->associate($type);
		$discount->save();

		$discount = new Discount(array(
			'name' => 'Nuolaida maistui 2',
			'percentage' => '7.66'
		));
		$discount_type = DiscountType::where('name', '=', 'Maistui')->first();
		$discount->discountType()->associate($discount_type);
		$type = Food::where('name', '=', 'Capricioza')->first();
		$discount->food()->associate($type);
		$discount->save();

		$discount = new Discount(array(
			'name' => 'Nuolaida maistui 3',
			'percentage' => '8.66'
		));
		$discount_type = DiscountType::where('name', '=', 'Maistui')->first();
		$discount->discountType()->associate($discount_type);
		$type = Food::where('name', '=', 'Aštri')->first();
		$discount->food()->associate($type);
		$discount->save();

		$discount = new Discount(array(
			'name' => 'Nuolaida maisto tipui 1',
			'percentage' => '6.66'
		));
		$discount_type = DiscountType::where('name', '=', 'Maisto tipui')->first();
		$discount->discountType()->associate($discount_type);
		$type = FoodType::where('name', '=', 'pizza')->first();
		$discount->foodType()->associate($type);
		$discount->save();

	// 	$discount = new Discount(array(
	// 		'name' => 'Nuolaida maistui 1',
	// 		'percentage' => '3.33'
	// 	));
	// 	$discount_type = DiscountType::where('name', '=', 'Užsakymui')->first();
	// 	$discount->discountType()->associate($discount_type);
	// 	$type = Order::where('id', '=', 1)->first();
	// 	$discount->food()->associate($type);
	// 	$discount->save();
	}
}