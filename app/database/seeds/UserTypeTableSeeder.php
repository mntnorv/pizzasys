<?php

class UserTypeTableSeeder extends Seeder {
	public function run() {
		DB::table('user_types')->delete();

		UserType::create(array(
			'id' => 1,
			'name' => 'admin'
		));
		UserType::create(array(
			'id' => 2,
			'name' => 'waiter'
		));
		UserType::create(array(
			'id' => 3,
			'name' => 'driver'
		));
		UserType::create(array(
			'id' => 4,
			'name' => 'client'
		));
	}
}