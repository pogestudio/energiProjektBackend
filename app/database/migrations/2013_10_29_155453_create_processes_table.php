<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->unsignedInteger('uptime_per_week');
			$table->unsignedInteger('processtype_id');
			$table->unsignedInteger('area_id');
			$table->unsignedInteger('power');
			$table->unsignedInteger('quantity');
			$table->timestamps();

			$table->foreign('processtype_id')->references('id')->on('processTypes');
			//$table->foreign('uptime_id')->references('id')->on('uptime');
			$table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('processes');
	}

}
