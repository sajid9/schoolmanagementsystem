<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplicantExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicantexperiences', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('applicant_id')->nullable();
           $table->string('employer', 200)->nullable();
           $table->string('title', 300)->nullable();
           $table->string('field', 500)->nullable();
            $table->string('start_date', 100)->nullable();
             $table->string('end_date', 100)->nullable();
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
         Schema::dropIfExists('applicantexperiences');
    }
}
