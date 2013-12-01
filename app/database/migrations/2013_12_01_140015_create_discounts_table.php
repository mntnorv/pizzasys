<?php

use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discounts', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('discount_to')->unsigned();
			$table->integer('type')->unsigned();
			$table->foreign('type')->references('id')->on('discount_types');
			$table->double('amount');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('discounts');
	}

}