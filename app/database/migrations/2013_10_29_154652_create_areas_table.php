<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('areas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('description');
			$table->boolean('isBuilding')->default(false);
			$table->unsignedInteger('owner_building_id')->nullable();
			$table->unsignedInteger('project_id');
			$table->timestamps();

			$table->foreign('owner_building_id')->references('id')->on('areas')->onDelete('cascade');
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('areas');
	}

}
