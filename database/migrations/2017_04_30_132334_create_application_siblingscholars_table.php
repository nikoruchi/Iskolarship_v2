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
            $table->increments('sibling_id');
            $table->integer('application_id')->references('application_id')->on('application');
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
