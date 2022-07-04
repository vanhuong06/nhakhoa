<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine__manages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your fields
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patient__patients');
            $table->foreign('doctor_id')->references('id')->on('doctor__doctors')->onDelete('cascade');
            $table->foreign('medicine_id')->references('id')->on('medicine__medicines')->onDelete('cascade');
            $table->integer('manages_code');
            $table->dateTime('manages_date');
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
        Schema::dropIfExists('medicine__manages');
    }
}
