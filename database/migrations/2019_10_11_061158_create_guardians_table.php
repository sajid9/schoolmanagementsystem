<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admissionNum');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('relation');
            $table->date('dateBirth');
            $table->string('education');
            $table->string('occupation');
            $table->string('income');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->bigInteger('phone');
            $table->bigInteger('mobile');
            $table->string('image');
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
        Schema::dropIfExists('guardians');
    }
}
