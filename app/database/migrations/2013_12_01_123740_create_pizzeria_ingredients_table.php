<?php

use Illuminate\Database\Migrations\Migration;

class CreatePizzeriaIngredientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pizzeria_ingredients', function($table) {
			$table->increments('id');
			$table->double('quantity');
			$table->integer('pizzeria_id')->unsigned();
			$table->foreign('pizzeria_id')->references('id')->on('pizzerias');
			$table->integer('ingredient_id')->unsigned();
			$table->foreign('ingredient_id')->references('id')->on('ingredients');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pizzeria_ingredients');
	}

}