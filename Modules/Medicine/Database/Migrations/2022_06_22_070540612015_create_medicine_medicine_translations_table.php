<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineMedicineTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine__medicine_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('medicine_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['medicine_id', 'locale']);
            $table->foreign('medicine_id')->references('id')->on('medicine__medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicine__medicine_translations', function (Blueprint $table) {
            $table->dropForeign(['medicine_id']);
        });
        Schema::dropIfExists('medicine__medicine_translations');
    }
}
