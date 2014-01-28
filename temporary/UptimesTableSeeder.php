<?php

class UptimesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('uptimes')->truncate();

		$uptimes = array(
			['title' => 'Veckodagar produktion', 'days' => 'mon_fri', 'project_id'=>'1', 'start_hour' =>'12:00'];
		);

		// Uncomment the below to run the seeder
		// DB::table('uptimes')->insert($uptimes);
	}

}
