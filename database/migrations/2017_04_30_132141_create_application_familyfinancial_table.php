<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationFamilyfinancialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_familyfinancial', function (Blueprint $table) {
            $table->integer('student_id')->references('student_id')->on('student_account');
            $table->string('father_employername');
            $table->string('father_employeraddress');
            $table->string('father_AGincome');
            $table->string('father_selfAGincome');
            $table->string('mother_employername');
            $table->string('mother_employeraddress');
            $table->string('mother_AGincome');
            $table->string('mother_selfAGincome');
            $table->string('beneficiary_dswd4ps');
            $table->string('housing_onwershiptype');
            $table->string('housing_rental');
            $table->string('housing_amortization');
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
        Schema::dropIfExists('application_familyfinancial');
    }
}
