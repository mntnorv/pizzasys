<?php

class FoodIngredientTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('food_ingredients')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$food_ingerdient = new FoodIngredient(array(
			'quantity'=> '1.1'
			));
		$ingredient = Ingredient::where('name', '=', 'Coca-Cola')->first();
		$food_ingerdient->ingredient()->associate($ingredient);
		$food = Food::where('name', '=', 'Coca-Cola')->first();
		$food_ingerdient->food()->associate($food);
		$food_ingerdient->save();

		$food_ingerdient = new FoodIngredient(array(
			'quantity'=> '3'
			));
		$ingredient = Ingredient::where('name', '=', 'Jautiena')->first();
		$food_ingerdient->ingredient()->associate($ingredient);
		$food = Food::where('name', '=', 'Aštri')->first();
		$food_ingerdient->food()->associate($food);
		$food_ingerdient->save();

		$food_ingerdient = new FoodIngredient(array(
			'quantity'=> '2'
			));
		$ingredient = Ingredient::where('name', '=', 'Pomidorai')->first();
		$food_ingerdient->ingredient()->associate($ingredient);
		$food = Food::where('name', '=', 'Studentiška')->first();
		$food_ingerdient->food()->associate($food);
		$food_ingerdient->save();
		
	}
}