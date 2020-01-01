<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chargCategory_id');
            $table->string('chargHead_id');
            $table->string('employeeGrade_id');
            $table->integer('salaryAmount');
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
        Schema::dropIfExists('salary_charges');
    }
}
