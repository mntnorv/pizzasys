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
			$table->integer('report_type_id')->unsigned();
			$table->foreign('report_type_id')->references('id')->on('report_types');
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
		Schema::dropIfExists('reports');
	}

}