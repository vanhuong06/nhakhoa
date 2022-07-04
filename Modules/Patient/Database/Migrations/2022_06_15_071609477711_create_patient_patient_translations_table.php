<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientPatientTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__patient_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('patient_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['patient_id', 'locale']);
            $table->foreign('patient_id')->references('id')->on('patient__patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient__patient_translations', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
        });
        Schema::dropIfExists('patient__patient_translations');
    }
}
