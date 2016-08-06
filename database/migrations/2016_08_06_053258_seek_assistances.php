<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeekAssistances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seek_assistances', function (Blueprint $table) {
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('description');
            $table->string('filename');
            $table->integer('file_count');
            $table->string('country');
            $table->string('university');
            $table->string('course');
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
        Schema::drop('seek_assistances');
    }
}
