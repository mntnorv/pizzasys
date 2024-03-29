<?php

use Illuminate\Database\Migrations\Migration;

class CreateIngredientTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ingredient_types', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('measurment_unit');
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
		Schema::drop('ingredient_types');
	}

}