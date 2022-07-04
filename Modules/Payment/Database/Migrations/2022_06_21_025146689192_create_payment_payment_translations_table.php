<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentPaymentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment__payment_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('payment_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['payment_id', 'locale']);
            $table->foreign('payment_id')->references('id')->on('payment__payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment__payment_translations', function (Blueprint $table) {
            $table->dropForeign(['payment_id']);
        });
        Schema::dropIfExists('payment__payment_translations');
    }
}
