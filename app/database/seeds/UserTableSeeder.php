<?php

class UserTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('users')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$user = new User(array(
			'id'         => 1,
			'username'   => 'admin',
			'password'   => '$2a$04$BxXsZLfneByzlNzfKuN2PewrNQPa.jK4yafgLsnl48PRAY.61UH.2',
			'user_type_id'       => 1
		));
		$user->save();
		
		$user = new User(array(
			'id'         => 2,
			'username'   => 'notadmin',
			'password'   => '$2a$04$BxXsZLfneByzlNzfKuN2PewrNQPa.jK4yafgLsnl48PRAY.61UH.2',
			'user_type_id'       => 2
		));
		$user->save();

		$user = new User(array(
			'id'         => 3,
			'username'   => 'waiter',
			'password'   => '$2a$04$BxXsZLfneByzlNzfKuN2PewrNQPa.jK4yafgLsnl48PRAY.61UH.2',
			'user_type_id'       => 2
		));
		$shift = EmployeeShift::where('name', '=', 'Padavėjos dieninė pamaina')->first();
		$user->shift()->associate($shift);
		$user->save();

		$user = new User(array(
			'id'         => 4,
			'username'   => 'driver',
			'password'   => '$2a$04$BxXsZLfneByzlNzfKuN2PewrNQPa.jK4yafgLsnl48PRAY.61UH.2',
			'user_type_id'       => 3
		));
		$shift = EmployeeShift::where('name', '=', 'Vairuotojo dieninė pamaina')->first();
		$user->shift()->associate($shift);
		$user->save();
	}
}