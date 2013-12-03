<?php

use Illuminate\Database\Migrations\Migration;

class CreateWaiterTablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('waiter_tables', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('table_id')->unsigned()->nullable();
			$table->foreign('table_id')->references('id')->on('tables');
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
		Schema::drop('waiter_tables');
	}

}