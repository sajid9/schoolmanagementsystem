<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registration_id');
            $table->string('gfirstName');
            $table->string('admissionNum');
            $table->date('admissionDate');
            $table->string('rollnumber');
            $table->string('bloodGroup')->nullable();
            $table->string('birthPlace')->nullable();
            $table->string('nationality')->nullable();
            $table->string('tongue')->nullable();
            $table->string('religion');
            $table->string('category_id');
            $table->string('disease')->nullable();
            $table->string('country')->nullable();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('admissions');
    }
}
