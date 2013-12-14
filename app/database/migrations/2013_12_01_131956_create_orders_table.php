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
			$table->integer('order_state_id')->unsigned();
			$table->foreign('order_state_id')->references('id')->on('order_states');
			$table->integer('order_type_id')->unsigned();
			$table->foreign('order_type_id')->references('id')->on('order_types');
			$table->integer('pizzeria_id')->unsigned()->nullable();
			$table->foreign('pizzeria_id')->references('id')->on('pizzerias');
			$table->integer('table_id')->unsigned()->nullable();
			$table->foreign('table_id')->references('id')->on('tables');
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('city_id')->unsigned()->nullable();
			$table->foreign('city_id')->references('id')->on('cities');
			$table->string('street')->nullable();
			$table->string('building_no', 16)->nullable();
			$table->string('flat_no', 16)->nullable();
			$table->string('tel_no', 16)->nullable();
			$table->string('door_code', 16)->nullable();
			$table->text('comment')->nullable();
			$table->double('price')->nullable();
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
		Schema::drop('orders');
	}

}