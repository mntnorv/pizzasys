<?php

use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('type')->unsigned();
			$table->foreign('type')->references('id')->on('food_types');
			$table->double('price');
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
		Schema::drop('food');
	}

}