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
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schem::dropIfExists('ingredient_types');
	}

}