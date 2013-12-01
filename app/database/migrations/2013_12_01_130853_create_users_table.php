<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('username', 16);
			$table->string('password', 64);
			$table->integer('type')->unsigned();
			$table->foreign('type')->references('id')->on('user_types');
			$table->integer('shift')->unsigned()->nullable();
			$table->foreign('shift')->references('id')->on('employee_shifts');
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
		Schema::drop('users');
	}

}