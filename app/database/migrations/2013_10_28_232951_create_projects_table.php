<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->string('title');
			$table->string('description');
			$table->string('company_name');
			$table->unsignedInteger('area');
			$table->unsignedInteger('vacation_weeks');
			
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
