<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProcesstypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('processTypes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->enum('type', array('production', 'support'))->default('production');
			$table->boolean('standard')->default(false);
			$table->timestamps();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('processTypes');
	}

}
