<?php

class DiscountTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('discounts')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$discount = new Discount(array(
			'name' => 'Nauja nuolaida',
			'percentage' => 6//'6,66'
		));

		$discount_type = DiscountType::where('name', '=', 'Maistui')->first();
		$discount->discountType()->associate($discount_type);
		$type = Food::where('name', '=', 'Capricioza')->first();
		$discount->food()->associate($type);

		$discount->save();
	}
}