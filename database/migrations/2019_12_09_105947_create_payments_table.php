<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('method')->nullable();
            $table->string('financial_year')->nullable();
            $table->integer('account_id');
            $table->integer('credit')->default(0);
            $table->integer('debit')->default(0);
            $table->enum('type',['EXP','FEE']);
            $table->enum('payment_through',['cash','debit card','check','other'])->nullable();
            $table->string('payment_desc')->nullable();
            $table->integer('exp_subhead_id')->nullable();
            $table->string('exp_desc')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('exp_type_id')->nullable();
            $table->integer('month_id')->nullable();
            $table->integer('employee_id')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
