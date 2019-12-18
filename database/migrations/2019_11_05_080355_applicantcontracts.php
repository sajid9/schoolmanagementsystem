<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Applicantcontracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        
   Schema::create('applicantcontracts', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('applicant_id')->nullable();
           $table->integer('designation_id')->nullable();
           $table->string('salery', 100)->nullable();
           $table->string('reportingdate', 100)->nullable();
           $table->string('jobresponsibility', 2000)->nullable();
           $table->string('contractduration',500)->nullable();
           $table->string('startdate',100)->nullable();
           $table->string('enddate',100)->nullable();  
           $table->enum('is_active', ['yes','no'])->default('no');
            $table->enum('is_join', ['yes','no'])->default('no');
               
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
        Schema::dropIfExists('applicantcontracts');
    }
}
