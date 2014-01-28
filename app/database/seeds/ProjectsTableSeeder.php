<?php

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('projects')->truncate();

		$projects = array(
			["title" => "XXX AB i Nacka", "description" => "Fabrik som producerar XYZ", 'company_name'=>'XXX AB', 'user_id' => 1, 'area'=>'2200', 'vacation_weeks'=>'3'],

			);

		// Uncomment the below to run the seeder
		DB::table('projects')->insert($projects);
	}

}
