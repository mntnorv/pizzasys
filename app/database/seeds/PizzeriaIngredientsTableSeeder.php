<?php

class PizzeriaIngredientsTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('pizzeria_ingredients')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 20
		));

		$ingredient = Ingredient::where('name', '=', 'Bulvės')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 1)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 5
		));

		$ingredient = Ingredient::where('name', '=', 'Jautiena')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 1)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 2
		));

		$ingredient = Ingredient::where('name', '=', 'Coca-Cola')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 1)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 20
		));

		$ingredient = Ingredient::where('name', '=', 'Apelsinai')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 1)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 19
		));

		$ingredient = Ingredient::where('name', '=', 'Bulvės')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 2)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 20
		));

		$ingredient = Ingredient::where('name', '=', 'Jautiena')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 2)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 35
		));

		$ingredient = Ingredient::where('name', '=', 'Apelsinai')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 2)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 20
		));

		$ingredient = Ingredient::where('name', '=', 'Bulvės')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 3)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 20
		));

		$ingredient = Ingredient::where('name', '=', 'Bulvės')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 4)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		$pizzeria_ingredient = new PizzeriaIngredient(array(
			'quantity' => 10
		));

		$ingredient = Ingredient::where('name', '=', 'Pomidorai')->first();
		$pizzeria_ingredient->ingredient()->associate($ingredient);
		$pizzeria = Pizzeria::where('id', '=', 2)->first();
		$pizzeria_ingredient->pizzeria()->associate($pizzeria);
		$pizzeria_ingredient->save();

		
	}
}