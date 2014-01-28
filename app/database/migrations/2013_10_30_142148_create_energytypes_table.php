<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnergytypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('energyTypes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->unsignedInteger('project_id');
			$table->enum('unit', array('MWh', 'm3'))->default('MWh');
			$table->unsignedInteger('quantity');
			$table->timestamps();


			$table->foreign('project_id')->references('id')->on('projects');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('energyTypes');
	}

}