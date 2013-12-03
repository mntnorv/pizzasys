<?php

use Illuminate\Database\Migrations\Migration;

class CreateFoodIngredientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food_ingredients', function($table) {
			$table->increments('id');
			$table->integer('food_id')->unsigned();
			$table->foreign('food_id')->references('id')->on('food');
			$table->integer('ingredient_id')->unsigned();
			$table->foreign('ingredient_id')->references('id')->on('ingredients');
			$table->double('quantity');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('food_ingredients');
	}

}