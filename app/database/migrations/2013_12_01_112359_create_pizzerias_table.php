<?php

use Illuminate\Database\Migrations\Migration;

class CreatePizzeriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pizzerias', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('address');
			$table->integer('city_id')->unsigned();
			$table->foreign('city_id')->references('id')->on('cities');
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
		Schema::drop('pizzerias');
	}

}