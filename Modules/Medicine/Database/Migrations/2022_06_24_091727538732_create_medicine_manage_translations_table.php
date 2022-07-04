<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineManageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine__manage_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('manage_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['manage_id', 'locale']);
            $table->foreign('manage_id')->references('id')->on('medicine__manages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicine__manage_translations', function (Blueprint $table) {
            $table->dropForeign(['manage_id']);
        });
        Schema::dropIfExists('medicine__manage_translations');
    }
}
