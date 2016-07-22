<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('DOB')->default(null);
            $table->string('country')->default(null);
            $table->string('contact')->default(null);
            $table->string('university')->default(null);
            $table->string('course')->default(null);
            $table->string('referred_by')->default(null);
            $table->string('password')->default(null);
            $table->boolean('activated')->default(false);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
