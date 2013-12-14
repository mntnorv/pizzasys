<?php

class DiscountTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('ingredients')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$discount = new Discount(array(
			'name' => 'nauja nuolaida',
			'percentage' => '6,66'
		));

		$discount_type = DiscountType::where('name', '=', 'Užsakymui')->first();
		$discount->discountType()->associate($discount_type);

		$discount->save();
	}
}