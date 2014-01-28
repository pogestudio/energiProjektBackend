<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('ProjectsTableSeeder');
		$this->call('AreasTableSeeder');
		$this->call('ProcesstypesTableSeeder');
		$this->call('ProcessesTableSeeder');
		$this->call('EnergytypesTableSeeder');
		//$this->call('UptimesTableSeeder');
	}

}