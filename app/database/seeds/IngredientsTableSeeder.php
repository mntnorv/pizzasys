<?php

class IngredientsTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('pizzerias')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$ingredient = new Ingredient(array(
			'name' => 'Jautiena'
		));

		$ingredient_type = IngredientType::where('name', '=', 'Mėsa')->first();
		$ingredient->ingredientType()->associate($ingredient_type);
		$ingredient->save();
		
		$ingredient = new Ingredient(array(
			'name' => 'Paukštiena'
		));

		$ingredient_type = IngredientType::where('name', '=', 'Mėsa')->first();
		$ingredient->ingredientType()->associate($ingredient_type);
		$ingredient->save();
		
		$ingredient = new Ingredient(array(
			'name' => 'Pomidorai'
		));

		$ingredient_type = IngredientType::where('name', '=', 'Daržovė')->first();
		$ingredient->ingredientType()->associate($ingredient_type);
		$ingredient->save();
		
		$ingredient = new Ingredient(array(
			'name' => 'Bulvės'
		));

		$ingredient_type = IngredientType::where('name', '=', 'Daržovė')->first();
		$ingredient->ingredientType()->associate($ingredient_type);
		$ingredient->save();
		
		$ingredient = new Ingredient(array(
			'name' => 'Svogūnai'
		));

		$ingredient_type = IngredientType::where('name', '=', 'Daržovė')->first();
		$ingredient->ingredientType()->associate($ingredient_type);
		$ingredient->save();
		
		$ingredient = new Ingredient(array(
			'name' => 'Apelsinas'
		));

		$ingredient_type = IngredientType::where('name', '=', 'Vaisius')->first();
		$ingredient->ingredientType()->associate($ingredient_type);
		$ingredient->save();
	}
}