<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationSiblingscholarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_siblingscholars', function (Blueprint $table) {
            $table->integer('student_id')->references('student_id')->on('student_account');
            $table->string('sibling_name');
            $table->string('sibling_scholarship');
            $table->string('sibling_courseschool');
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
        Schema::dropIfExists('application_siblingscholars');
    }
}
