<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chargCategory_id');
            $table->string('chargHead_id');
            $table->string('class_id');
            $table->integer('feeAmount');
            $table->enum('transactionType',['credit','debit']);
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
        Schema::dropIfExists('fee_charges');
    }
}
