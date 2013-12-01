<?php

use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reports', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->date('start');
			$table->date('end');
			$table->integer('discount_to')->unsigned();
			$table->integer('type')->unsigned();
			$table->foreign('type')->references('id')->on('discount_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('reports');
	}

}