<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSalaryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee__salary_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('salary_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['salary_id', 'locale']);
            $table->foreign('salary_id')->references('id')->on('employee__salaries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee__salary_translations', function (Blueprint $table) {
            $table->dropForeign(['salary_id']);
        });
        Schema::dropIfExists('employee__salary_translations');
    }
}
