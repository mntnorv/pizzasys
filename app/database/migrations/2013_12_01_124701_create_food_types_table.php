<?php

use Illuminate\Database\Migrations\Migration;

class CreateFoodTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food_types', function($table) {
			$table->increments('id');
			$table->string('name', 16)->unique();
			$table->string('displayName');
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
		Schema::drop('food_types');
	}

}