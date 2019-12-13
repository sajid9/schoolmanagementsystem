<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Applicants extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{

Schema::create('applicants', function (Blueprint $table) {
$table->bigIncrements('id');
$table->string('name', 100);
$table->string('cnic', 100)->nullable();
$table->string('image', 100)->nullable();
$table->string('fname', 100)->nullable();
$table->string('dob', 100)->nullable();
$table->string('address',500)->nullable();
$table->string('city',100)->nullable();
$table->string('mobile',100)->nullable();
$table->string('ptcl',100)->nullable();
$table->string('height',100)->nullable();
$table->string('weight',100)->nullable();
$table->enum('is_shortlist', ['yes','no'])->nullable();
$table->enum('is_selected', ['yes','no'])->default('no');
$table->enum('is_secclear', ['yes','no'])->default('no');
$table->enum('is_contract', ['yes','no'])->default('no');
$table->enum('is_softdel', ['yes','no'])->default('no');

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
Schema::dropIfExists('applicants');
}
}