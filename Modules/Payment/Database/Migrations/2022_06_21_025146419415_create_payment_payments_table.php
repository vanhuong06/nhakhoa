<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment__payments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('payment_code');
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patient__patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctor__doctors')->onDelete('cascade');
            $table->dateTime('payment_time');
            $table->integer('payment_amount');
            $table->string('payment_method');
            $table->string('payment_status');
            // Your fields
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
        Schema::dropIfExists('payment__payments');
    }
}
