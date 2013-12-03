<?php

use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discounts', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('discount_to_food')->unsigned()->nullable();
			$table->foreign('discount_to_food')->references('id')->on('food');
			$table->integer('discount_to_food_type')->unsigned()->nullable();
			$table->foreign('discount_to_food_type')->references('id')->on('food_types');
			$table->integer('discount_to_order')->unsigned()->nullable();
			$table->foreign('discount_to_order')->references('id')->on('orders');
			$table->integer('type')->unsigned();
			$table->foreign('type')->references('id')->on('discount_types');
			$table->double('percentage');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('discounts');
	}

}