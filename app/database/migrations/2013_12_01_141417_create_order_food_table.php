<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderFoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_food', function($table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->foreign('order_id')->references('id')->on('orders');
			$table->integer('food_id')->unsigned();
			$table->foreign('food_id')->references('id')->on('food');
			$table->integer('amount')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_food');
	}

}