<?php

class EnergytypesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('energytypes')->truncate();

		$energytypes = array(
			['title'=>'Olja','project_id'=>'1','quantity'=>'200','created_at' => new DateTime, 'updated_at' => new DateTime],
			['title'=>'Diesel','project_id'=>'1','quantity'=>'30','created_at' => new DateTime, 'updated_at' => new DateTime],
			['title'=>'Träpellets','project_id'=>'1','quantity'=>'0','created_at' => new DateTime, 'updated_at' => new DateTime],
			['title'=>'Flis','project_id'=>'1','quantity'=>'0','created_at' => new DateTime, 'updated_at' => new DateTime],
			['title'=>'Gasol','project_id'=>'1','quantity'=>'0','created_at' => new DateTime, 'updated_at' => new DateTime],
			['title'=>'Naturgas','project_id'=>'1','quantity'=>'0','created_at' => new DateTime, 'updated_at' => new DateTime],
			['title'=>'El','project_id'=>'1','quantity'=>'880','created_at' => new DateTime, 'updated_at' => new DateTime],
			['title'=>'Fjärrvärme','project_id'=>'1','quantity'=>'300','created_at' => new DateTime, 'updated_at' => new DateTime]
		);

		// Uncomment the below to run the seeder
		DB::table('energyTypes')->insert($energytypes);
	}

}


