<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipDeadlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_deadline', function (Blueprint $table) {
            $table->increments('scholarship_deadlineID');
            $table->integer('scholarship_id')->references('scholarship_id')->on('scholarship');
            $table->timestamp('scholarship_deadlinestartdate');
            $table->timestamp('scholarship_deadlineenddate')->nullable();
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
        Schema::dropIfExists('scholarship_deadline');
    }
}
