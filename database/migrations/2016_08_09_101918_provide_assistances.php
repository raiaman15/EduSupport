<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProvideAssistances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provide_assistances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('description');
            $table->string('files');
            $table->string('country');
            $table->string('university');
            $table->string('course');
            $table->boolean('admin_approved')->default(false);
            $table->boolean('earn_approved')->default(false);
            $table->string('status')->default("WAITING FOR ADMIN APPROVAL");
            $table->double('earn_amount', 10, 2)->default(0.00);; // 1 Crore max
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
        Schema::drop('provide_assistances');
    }
}
