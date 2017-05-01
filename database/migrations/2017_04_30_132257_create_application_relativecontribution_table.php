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
            $table->increments('relative_id');
            $table->integer('application_id')->references('application_id')->on('application');
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
