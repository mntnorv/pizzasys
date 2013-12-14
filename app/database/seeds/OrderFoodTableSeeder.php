<?php

class OrderFoodTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('order_food')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$order_food = new OrderFood(array(
				'amount' => '5'
		));
		$order = Order::where('tel_no', '=', '836987444')->first();
		$order_food->order()->associate($order);
		$food = Food::where('name', '=', 'Coca-Cola')->first();
		$order_food->food()->associate($food);
		$order_food->save();
		
	}
}