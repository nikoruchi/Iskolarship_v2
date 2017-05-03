<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_account', function (Blueprint $table) {
            $table->increments('student_id');
            $table->integer('user_id')->references('user_id')->on('user_account');
            $table->string('student_fname');
            $table->string('student_lname');
            $table->string('student_gender');
            $table->string('student_address');
            $table->date('student_birthdate');
            $table->string('student_region');
            $table->string('student_nationality');
            $table->date('student_beginstudies');
            $table->string('student_highestdegree');
            $table->string('student_studyfield');
            $table->string('student_degreesought');
            $table->string('student_university');
            $table->string('student_universityaddress');
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
        Schema::dropIfExists('student_account');
    }
}
