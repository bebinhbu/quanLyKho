<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBallotDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ballot_details', function (Blueprint $table) {
            $table->integer('id_ballot');
            $table->integer('id_product');
            $table->integer('amount_import');
            $table->integer('amount_export');
            $table->integer('to5')->nullable();
            $table->integer('to3')->nullable();
            $table->integer('amount_broken')->nullable();
            $table->integer('total_price');
            $table->integer('price_paid');
            $table->boolean('isWholeSale');
            $table->integer('active_flg');
            $table->softDeletes();
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
        Schema::dropIfExists('ballot_details');
    }
}
