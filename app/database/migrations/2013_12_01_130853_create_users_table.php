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
			$table->integer('user_type_id')->unsigned();
			$table->foreign('user_type_id')->references('id')->on('user_types');
			$table->integer('shift_id')->unsigned()->nullable();
			$table->foreign('shift_id')->references('id')->on('employee_shifts');
			$table->integer('blocked')->default(0);
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