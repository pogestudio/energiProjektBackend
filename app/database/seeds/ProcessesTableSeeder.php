<?php

class ProcessesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('processes')->truncate();

		$processes = array(
			['title'=>'Process1', 'uptime_per_week'=>'130','processtype_id'=>'1','area_id'=>'2','power'=>'20','quantity'=>'2'],
			['title'=>'Process2', 'uptime_per_week'=>'20','processtype_id'=>'1','area_id'=>'2','power'=>'60','quantity'=>'3'],
			['title'=>'Process3', 'uptime_per_week'=>'100','processtype_id'=>'2','area_id'=>'2','power'=>'30','quantity'=>'8'],
			['title'=>'Process4', 'uptime_per_week'=>'69','processtype_id'=>'2','area_id'=>'2','power'=>'190','quantity'=>'1'],
			['title'=>'Process5', 'uptime_per_week'=>'140','processtype_id'=>'3','area_id'=>'2','power'=>'10','quantity'=>'2'],
			['title'=>'Process6', 'uptime_per_week'=>'21','processtype_id'=>'4','area_id'=>'2','power'=>'10','quantity'=>'10'],
			['title'=>'Process12', 'uptime_per_week'=>'29','processtype_id'=>'12','area_id'=>'2','power'=>'12','quantity'=>'2'],
			['title'=>'Process13', 'uptime_per_week'=>'50','processtype_id'=>'13','area_id'=>'2','power'=>'10','quantity'=>'1'],
			['title'=>'Process14', 'uptime_per_week'=>'140','processtype_id'=>'14','area_id'=>'2','power'=>'2','quantity'=>'130'],

		);

		// Uncomment the below to run the seeder
		DB::table('processes')->insert($processes);
	}

}
