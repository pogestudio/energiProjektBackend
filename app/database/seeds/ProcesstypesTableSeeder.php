<?php

class ProcesstypesTableSeeder extends Seeder {
	public function run()
	{
// Uncomment the below to wipe the table clean before populating
// DB::table('processtypes')->truncate();

		$processtypes = array(
			['name'=> 'upplösning/sönderdelnig', 'type' => 'production','standard'=>true],
			['name'=> 'delning', 'type' => 'production','standard'=>true],
			['name'=> 'blandning', 'type' => 'production','standard'=>true],
			['name'=> 'fogning', 'type' => 'production','standard'=>true],
			['name'=> 'beläggning/bestrykning', 'type' => 'production','standard'=>true],
			['name'=> 'gjutning', 'type' => 'production','standard'=>true],
			['name'=> 'upphettning', 'type' => 'production','standard'=>true],
			['name'=> 'smältning', 'type' => 'production','standard'=>true],
			['name'=> 'torkning', 'type' => 'production','standard'=>true],
			['name'=> 'nedkylning', 'type' => 'production','standard'=>true],
			['name'=> 'packning', 'type' => 'production','standard'=>true],


			['name'=>'administrativt', 'type' => 'support','standard'=>true],
			['name'=>'komfortkyla', 'type' => 'support','standard'=>true],
			['name'=>'belysning', 'type' => 'support','standard'=>true],
			['name'=>'tryckluft', 'type' => 'support','standard'=>true],
			['name'=>'ventilation', 'type' => 'support','standard'=>true],
			['name'=>'pumpning', 'type' => 'support','standard'=>true],
			['name'=>'tappvarmvatten', 'type' => 'support','standard'=>true],
			['name'=>'interna transporter', 'type' => 'support','standard'=>true],
			['name'=>'lokaluppvärmning', 'type' => 'support','standard'=>true],
			['name'=>'ångtryck', 'type' => 'support','standard'=>true],
			);

DB::table('processtypes')->insert($processtypes);
}

}
