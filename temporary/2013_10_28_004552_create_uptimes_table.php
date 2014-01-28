<?php

// ANVÄNDS EJ ATM

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUptimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uptimes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->enum('days', array('mon_fri', 'fri_sun', 'mon_sun'))->default('mon_fri');
			$table->unsignedInteger('project_id');
			$table->enum('start_hour', array('01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00','24:00'))->default('12:00');
			$table->enum('end_hour', array('01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00','24:00'))->default('12:00');
			$table->timestamps();

			//$table->foreign('project_id')->references('id')->on('project');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('uptimes');
	}

}
