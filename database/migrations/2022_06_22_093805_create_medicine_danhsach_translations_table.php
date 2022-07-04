<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineDanhsachTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_danhsach_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('danh_sach_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['danhsach_id', 'locale']);
            $table->foreign('danh_sach_id')->references('id')->on('medicine__danhsaches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_danhsach_translations');
    }
}
