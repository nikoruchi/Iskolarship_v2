<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship', function (Blueprint $table) {
            $table->increments('scholarship_id');
            $table->integer('sponsor_id')->references('sponsor_id')->on('sponsor_account');
            $table->string('scholarship_name');
<<<<<<< HEAD
            $table->string('scholarship_coverage');
            $table->string('scholarship_desc');
=======
            $table->string('scholarship_desc');            
            $table->string('scholarship_coverage');
>>>>>>> 4966d5f8e2b496ae8616a5e968ce876a3e724d26
            $table->string('scholarship_logo');
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
        Schema::dropIfExists('scholarship');
    }
}
