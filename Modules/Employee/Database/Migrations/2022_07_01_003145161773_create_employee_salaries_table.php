<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee__salaries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your fields
            $table->integer('emp_id')->unsigned();
            $table->foreign('emp_id')->references('id')->on('employee__employees')->onDelete('cascade');
            $table->string('salary_basic');
            $table->string('salary_late');
            $table->string('salary_bonus');
            $table->string('salary_cms');
            $table->string('salary_yt');
            $table->string('salary_xh');
            $table->string('salary_tn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee__salaries');
    }
}
