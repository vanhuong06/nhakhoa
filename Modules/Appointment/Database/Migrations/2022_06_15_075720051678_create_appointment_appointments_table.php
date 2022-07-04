<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment__appointments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('patient_id')->unsigned()->nullable();
            $table->integer('doctor_id')->unsigned()->nullable();
            $table->foreign('patient_id')->references('id')->on('patient__patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctor__doctors')->onDelete('cascade');
            $table->dateTime('appointment_time');
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
        Schema::dropIfExists('appointment__appointments');
    }
}
