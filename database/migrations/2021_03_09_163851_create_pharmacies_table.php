<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('address')->nullable();
            $table->string('pharmacy_name')->nullable();
            $table->text('pharmacy_address')->nullable();
            $table->string('pharmacy_city')->nullable();
            $table->string('pharmacy_phone')->nullable();
            $table->string('fax_number')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pharmacies');
    }
}
