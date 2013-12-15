<?php

class ReportTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('reports')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$report = new Report(array(
				'name' => 'Ataskaita 1',
				'start' => '2013-12-01',
				'end' => '2013-12-20'
		));
		
		$type = ReportType::where('id', '=', '1')->first();
		$report->reportType()->associate($type);
		$report->save();

		$report = new Report(array(
				'name' => 'Ataskaita 2',
				'start' => '2013-12-01',
				'end' => '2013-12-20'
		));
		
		$type = ReportType::where('id', '=', '2')->first();
		$report->reportType()->associate($type);
		$report->save();

		$report = new Report(array(
				'name' => 'Ataskaita 3',
				'start' => '2013-12-01',
				'end' => '2013-12-20'
		));
		
		$type = ReportType::where('id', '=', '3')->first();
		$report->reportType()->associate($type);
		$report->save();

		
	}
}