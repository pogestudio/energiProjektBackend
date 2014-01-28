<?php

class AreasTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('areas')->truncate();

		$areas = array(
						["title" => "Huvudverkstad", "description" => "Östra", 'isBuilding'=>true, 'owner_building_id'=>null,'project_id' => '1'],
						["title" => "Produktionsrum", "description" => "För produkt XX", 'isBuilding'=>false, 'owner_building_id'=>'1','project_id' => '1'],
						["title" => "Packningsrum", "description" => "För produkt XX", 'isBuilding'=>false, 'owner_building_id'=>'1','project_id' => '1'],
		);

		// Uncomment the below to run the seeder
		DB::table('areas')->insert($areas);
	}

}
