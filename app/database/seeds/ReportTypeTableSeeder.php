<?php

class ReportTypeTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('report_types')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		ReportType::create(array(
			'id' => 1,
			'name' => '1'
		));
		ReportType::create(array(
			'id' => 2,
			'name' => '2'
		));
		ReportType::create(array(
			'id' => 3,
			'name' => '3'
		));
	}
}