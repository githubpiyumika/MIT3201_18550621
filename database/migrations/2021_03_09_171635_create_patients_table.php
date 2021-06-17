<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('address')->nullable();
            $table->string('nic')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->decimal('weight')->nullable();
            $table->decimal('height')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_no')->nullable();
            $table->text('emergency_address')->nullable();
            $table->string('chicken_pox')->nullable();
            $table->string('measles')->nullable();
            $table->string('hepatitis_b')->nullable();
            $table->mediumText('medical_problems')->nullable();
            $table->string('has_insurance')->nullable();
            $table->string('insuared_company')->nullable();
            $table->mediumText('insuared_company_address')->nullable();
            $table->string('policy_number')->nullable();
            $table->date('expiary_date')->nullable();
            $table->mediumText('allergies')->nullable();
            $table->mediumText('regular_medications')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patients');
    }
}
