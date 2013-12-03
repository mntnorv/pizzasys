<?php

class UserTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->delete();

		User::create(array(
			'username' => 'admin',
			'password' => '$2a$04$BxXsZLfneByzlNzfKuN2PewrNQPa.jK4yafgLsnl48PRAY.61UH.2',
			'type'     => 1
		));
	}
}