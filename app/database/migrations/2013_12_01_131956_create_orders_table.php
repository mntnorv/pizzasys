<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function($table) {
			$table->increments('id');
			$table->integer('state')->unsigned();
			$table->foreign('state')->references('id')->on('order_states');
			$table->timestamp('created_at');
			$table->integer('type')->unsigned();
			$table->foreign('type')->references('id')->on('order_types');
			$table->integer('pizzeria_id')->unsigned();
			$table->foreign('pizzeria_id')->references('id')->on('pizzerias');
			$table->integer('table_id')->unsigned();
			$table->foreign('table_id')->references('id')->on('tables');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('address');
			$table->double('price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}