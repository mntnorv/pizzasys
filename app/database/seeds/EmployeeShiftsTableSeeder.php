<?php

class EmployeeShiftsTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('employee_shifts')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		EmployeeShift::create(array(
			'name' => 'Padavėjos dieninė pamaina',
			'starts_at' => '10:00',
			'ends_at' => '22:00'
		));


		EmployeeShift::create(array(
			'name' => 'Vairuotojo dieninė pamaina',
			'starts_at' => '11:00',
			'ends_at' => '23:00'
		));
	}
}