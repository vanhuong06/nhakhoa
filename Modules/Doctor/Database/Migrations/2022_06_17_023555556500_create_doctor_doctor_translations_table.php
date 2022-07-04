<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorDoctorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor__doctor_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('doctor_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['doctor_id', 'locale']);
            $table->foreign('doctor_id')->references('id')->on('doctor__doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor__doctor_translations', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
        });
        Schema::dropIfExists('doctor__doctor_translations');
    }
}
