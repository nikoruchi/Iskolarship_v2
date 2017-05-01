<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->increments('application_id');
            $table->integer('scholarship_id')->references('scholarship_id')->on('scholarship');
            $table->integer('student_id')->references('student_id')->on('student_account');
            $table->timestamp('application_date');
            $table->string('accept_status');
            $table->string('avail_status');
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
        Schema::dropIfExists('application');
    }
}
