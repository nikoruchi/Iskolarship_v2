<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationFamilyappliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_familyappliances', function (Blueprint $table) {
            $table->integer('student_id')->references('student_id')->on('student_account');
            $table->integer('aircon_num');
            $table->string('aircon_acquisition');
            $table->string('aircon_year');
            $table->integer('camera_num');
            $table->string('camera_acquisition');
            $table->string('camera_year');
            $table->integer('vehicle_num');
            $table->string('vehicle_acquisition');
            $table->string('vehicle_year');
            $table->integer('jeep_num');
            $table->string('jeep_acquisition');
            $table->string('jeep_year');
            $table->integer('ipad_num');
            $table->string('ipad_acquisition');
            $table->string('ipad_year');
            $table->integer('laptop_num');
            $table->string('laptop_acquisition');
            $table->string('laptop_year');
            $table->integer('freezer_num');
            $table->string('freezer_acquisition');
            $table->string('freezer_year');
            $table->integer('dryer_num');
            $table->string('dryer_acquisition');
            $table->string('dryer_year');
            $table->integer('pump_num');
            $table->string('pump_acquisition');
            $table->string('pump_year');
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
        Schema::dropIfExists('application_familyappliances');
    }
}
