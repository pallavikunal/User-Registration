<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('firstName', 100);
            $table->string('lastName', 100);
            $table->datetime('dateOfBirth');
            $table->text('communicationAddress');
            $table->text('permanentAddress');
            $table->integer('contactNumber')->unsigned();
            $table->tinyInteger('degree')->length(2)->default(0)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
