<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineDanhsachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine__danhsaches', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patient__patients');
            $table->foreign('doctor_id')->references('id')->on('doctor__doctors');
            $table->foreign('medicine_id')->references('id')->on('medicine__medicines');
            $table->integer('danhsaches_code');
            $table->dateTime('danhsaches_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine__danhsaches');
    }
}
