<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor__doctors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('doctor_name');
            $table->integer('doctor_code');
            $table->date('doctor_dob');
            $table->string('doctor_address');
            $table->string('doctor_phone');
            $table->date('doctor_date')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            // Your fields
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
        Schema::dropIfExists('doctor__doctors');
    }
}
