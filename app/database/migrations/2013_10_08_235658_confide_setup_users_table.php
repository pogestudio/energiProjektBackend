<?php
use Illuminate\Database\Migrations\Migration;

class ConfideSetupUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');

        // Creates the users table
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('confirmation_code');
            $table->boolean('confirmed')->default(false);
            //$table->date('expirate_date');
            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function($t)
        {
            $t->string('email');
            $t->string('token');
            $t->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
    }

}

//            $table->unique( array('entry_id','user_id') );
//            $table->enum('vote', array(-1, 0,1))->default(0);

//            $table->foreign('entry_id')->references('id')->on('entries');
//            $table->foreign('tag_id')->references('id')->on('tags');
//            $table->unique( array('entry_id','tag_id') );

