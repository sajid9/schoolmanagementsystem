<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationAttendenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examination_attendence', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admission_id');
            $table->string('exam_schedule_id');
            $table->enum('is_active', ['yes', 'no'])->default('no');
            $table->string('attendenceDate');
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
        Schema::dropIfExists('examination_attendence');
    }
}
