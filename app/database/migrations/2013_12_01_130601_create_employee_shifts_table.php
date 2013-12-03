<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmployeeShiftsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employee_shifts', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->time('starts_at');
			$table->time('ends_at');
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
		Schema::drop('employee_shifts');
	}

}