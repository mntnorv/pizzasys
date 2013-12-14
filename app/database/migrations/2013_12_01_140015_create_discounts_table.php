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
			$table->integer('food_id')->unsigned()->nullable();
			$table->foreign('food_id')->references('id')->on('food');
			$table->integer('food_type_id')->unsigned()->nullable();
			$table->foreign('food_type_id')->references('id')->on('food_types');
			$table->integer('order_id')->unsigned()->nullable();
			$table->foreign('order_id')->references('id')->on('orders');
			$table->integer('discount_type_id')->unsigned();
			$table->foreign('discount_type_id')->references('id')->on('discount_types');
			$table->double('percentage');
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
		Schema::dropIfExists('discounts');
	}

}