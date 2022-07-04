<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentAppointmentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->unsignedInteger('appointment_id');
            $table->string('locale')->index();
            $table->unique(['appointment_id', 'locale']);
            $table->foreign('appointment_id', 'appoint_id')->references('id')->on('appointment__appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment__translations', function (Blueprint $table) {
            $table->dropForeign(['appointment_id']);
        });
        Schema::dropIfExists('appointment__translations');
    }
}
