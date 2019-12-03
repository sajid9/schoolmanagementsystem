<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_enrollments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admission_id');
            $table->string('batch_id');
            $table->string('gfirstName');
            $table->string('dateBirth');
            $table->enum('is_active', ['yes', 'no'])->default('no');
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
        Schema::dropIfExists('c_enrollments');
    }
}
