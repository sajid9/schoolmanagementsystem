<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplicantQualifictions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('applicantqualifictions', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('applicant_id')->nullable();
           $table->string('degree', 100)->nullable();
           $table->string('total_marks', 100)->nullable();
           $table->string('obtain_marks', 100)->nullable();
           $table->string('institute', 500)->nullable();
           $table->string('year_of_passing',100)->nullable();
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
        Schema::dropIfExists('applicantqualifictions');
    }
}
