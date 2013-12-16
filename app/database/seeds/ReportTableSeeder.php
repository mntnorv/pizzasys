<?php

class ReportTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('reports')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$report = new Report(array(
				'name' => 'Pirmoji užsakymų ataskaita',
				'start' => '2013-12-01',
				'end' => '2013-12-20'
		));
		
		$type = ReportType::where('id', '=', '1')->first();
		$report->reportType()->associate($type);
		$report->save();

		$report = new Report(array(
				'name' => 'Pirmoji picerijų ataskaita',
				'start' => '2013-12-01',
				'end' => '2013-12-15'
		));
		
		$type = ReportType::where('id', '=', '2')->first();
		$report->reportType()->associate($type);
		$report->save();

		$report = new Report(array(
				'name' => 'Antroji picerijų ataskaita',
				'start' => '2013-12-15',
				'end' => '2013-12-20'
		));
		
		$type = ReportType::where('id', '=', '2')->first();
		$report->reportType()->associate($type);
		$report->save();

		
	}
}