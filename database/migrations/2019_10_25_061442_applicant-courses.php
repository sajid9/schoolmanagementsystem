<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplicantCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('applicantcourses', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('applicant_id')->nullable();
           $table->string('name', 200)->nullable();
           $table->string('year', 100)->nullable();
           $table->string('institute', 500)->nullable();
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
        Schema::dropIfExists('applicantcourses');
    }
}
