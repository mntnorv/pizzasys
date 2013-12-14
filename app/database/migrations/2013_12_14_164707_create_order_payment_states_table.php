<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderPaymentStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_payment_states', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
		Schema::table('orders', function($table)
		{
			$table->integer('order_payment_state_id')->unsigned();
			$table->foreign('order_payment_state_id')->references('id')->on('order_payment_states');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{		
		Schema::table('orders', function($table)
		{
			$table->dropForeign('orders_order_payment_state_id_foreign');
			$table->dropColumn('order_payment_state_id');
		});

		Schema::drop('order_payment_states');
	}

}