<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__patients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('patient_code');
            $table->string('patient_name');
            $table->date('patient_dob')->format('Y-m-d');
            $table->json('patient_treaments');
            $table->json('patient_amount');
            $table->string('patient_address');
            $table->string('patient_phone');
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
        Schema::dropIfExists('patient__patients');
    }
}
