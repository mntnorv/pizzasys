<?php

class WaiterTableTableSeeder extends Seeder {
	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('waiter_tables')->delete();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		$waiter_table = new WaiterTable();
		$table = Table::where('name', '=', 'Staliukas 1')->first();
		$waiter_table->table()->associate($table);
		$user = User::where('username', '=', 'waiter')->first();
		$waiter_table->user()->associate($user);
		$waiter_table->save();
		
		$waiter_table = new WaiterTable();
		$table = Table::where('name', '=', 'Staliukas 2')->first();
		$waiter_table->table()->associate($table);
		$user = User::where('username', '=', 'admin')->first();
		$waiter_table->user()->associate($user);
		$waiter_table->save();
		
		$waiter_table = new WaiterTable();
		$table = Table::where('name', '=', 'Staliukas 3')->first();
		$waiter_table->table()->associate($table);
		$user = User::where('username', '=', 'notadmin')->first();
		$waiter_table->user()->associate($user);
		$waiter_table->save();
		
		$waiter_table = new WaiterTable();
		$table = Table::where('name', '=', 'Staliukas 4')->first();
		$waiter_table->table()->associate($table);
		$user = User::where('username', '=', 'driver')->first();
		$waiter_table->user()->associate($user);
		$waiter_table->save();
		
	}
}