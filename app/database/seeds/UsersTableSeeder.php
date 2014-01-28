<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		//DB::table('users')->truncate();

		$users = array(
			["email" => "first@email.com", "password" => Hash::make("password"), "username" => "Johan Jonsson", 'confirmed'=>true],
			["email" => "second@email.com", "password" => Hash::make("password"), "username" => "Hulk Hogan", 'confirmed'=>true],
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}