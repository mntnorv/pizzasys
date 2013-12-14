<?php

class ReportTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('reports')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$report = new Report(array(
				'id' => '1',
				'name' => 'Ataskaita 1',
				'start' => '2013-12-01',
				'end' => '2013-12-20'
		));


		$type = ReportType::where('id', '=', '1')->first();
		$report->reportTypes()->associate($type);
		$report->save();

		
	}
}