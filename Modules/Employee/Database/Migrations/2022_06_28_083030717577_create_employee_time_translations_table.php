<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeetimeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee__time_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('time_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['time_id', 'locale']);
            $table->foreign('time_id')->references('id')->on('employee__times')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee__time_translations', function (Blueprint $table) {
            $table->dropForeign(['time_id']);
        });
        Schema::dropIfExists('employee__time_translations');
    }
}
