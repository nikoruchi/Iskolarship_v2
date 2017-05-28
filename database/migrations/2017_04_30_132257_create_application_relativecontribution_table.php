<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationRelativecontributionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_relativecontribution', function (Blueprint $table) {
            $table->integer('student_id')->references('student_id')->on('student_account');
            $table->string('relative_name');
            $table->string('relative_natureofcontribution');
            $table->string('relative_relationship');
            $table->string('relative_averagecontribution');
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
        Schema::dropIfExists('application_relativecontribution');
    }
}
