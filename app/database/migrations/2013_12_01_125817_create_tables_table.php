<?php

use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tables', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('pizzeria_id')->unsigned();
			$table->foreign('pizzeria_id')->references('id')->on('pizzerias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tables');
	}

}