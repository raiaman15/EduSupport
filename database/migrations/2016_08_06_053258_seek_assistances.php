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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('description');
            $table->string('files');
            $table->string('country');
            $table->string('university');
            $table->string('course');
            $table->boolean('payment_link_prepared')->default(false);
            $table->tinyInteger('payment_plan')->default(null);
            $table->boolean('payment_done')->default(false);
            $table->boolean('tutor_assigned')->default(false);
            $table->string('tutor_email')->default(null);
            $table->boolean('feedback_provided')->default(false);
            $table->tinyInteger('tutor_feedback')->default(null);
            $table->boolean('tutor_payment_generated')->default(false);//
            $table->float('tutor_payment')->default(0.00);
            $table->boolean('tutor_got_payment')->default(false);
            $table->string('status')->default("PAYMENT LINK IS GETTING READY");
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
