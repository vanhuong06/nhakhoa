<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorLichKhamTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor__lichkham_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('lichkham_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['lichkham_id', 'locale']);
            $table->foreign('lichkham_id')->references('id')->on('doctor__lichkhams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor__lichkham_translations', function (Blueprint $table) {
            $table->dropForeign(['lichkham_id']);
        });
        Schema::dropIfExists('doctor__lichkham_translations');
    }
}
