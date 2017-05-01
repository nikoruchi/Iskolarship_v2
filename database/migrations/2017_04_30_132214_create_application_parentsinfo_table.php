<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationParentsinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_parentsinfo', function (Blueprint $table) {
            $table->increments('parent_id');
            $table->integer('application_id')->references('application_id')->on('application');
            $table->string('father_type');
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('father_education');
            $table->string('father_tribe');
            $table->string('mother_type');
            $table->string('mother_name');
            $table->string('mother_occupation');
            $table->string('mother_education');
            $table->string('mother_tribe');
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
        Schema::dropIfExists('application_parentsinfo');
    }
}
