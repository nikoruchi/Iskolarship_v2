<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_account', function (Blueprint $table) {
            $table->increments('sponsor_id');
            $table->integer('user_id')->references('user_id')->on('user_account');
            $table->string('sponsor_fname');
            $table->string('sponsor_lname');
            $table->string('sponsor_address');
            $table->string('sponsor_job');
            $table->string('sponsor_agency');
            $table->string('sponsor_agencyaddress');
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
        Schema::dropIfExists('sponsor_account');
    }
}
