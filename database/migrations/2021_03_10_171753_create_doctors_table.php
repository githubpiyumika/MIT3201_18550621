<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('specialization',)->unsigned();
            $table->text('residential_address')->nullable();
            $table->text('institute_address')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ["male", "female"]);
            $table->enum('marital_status', ["married", "single"]);
            $table->string('nationality')->nullable();
            $table->text('professional_statement')->nullable();
            $table->text('education_qualiication')->nullable();
            $table->text('experience_after_graduation')->nullable();
            $table->string('registration_number')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('specialization')->references('id')->on('doctor_specializations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctors');
    }
}
