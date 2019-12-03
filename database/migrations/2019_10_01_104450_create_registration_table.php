<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->date('dateBirth');
            $table->string('gender');
            $table->string('gfirstName');
            $table->string('gmiddleName')->nullable();
            $table->string('glastName')->nullable();
            $table->string('cnic')->nullable();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('income')->nullable();
            $table->integer('class_id');
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->integer('session_id');
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
        Schema::dropIfExists('registration');
    }
}
