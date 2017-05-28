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
            $table->integer('camera_num');
            $table->string('camera_acquisition');
            $table->integer('vehicle_num');
            $table->string('vehicle_acquisition');
            $table->integer('jeep_num');
            $table->string('jeep_acquisition');
            $table->integer('ipad_num');
            $table->string('ipad_acquisition');
            $table->integer('laptop_num');
            $table->string('laptop_acquisition');
            $table->integer('freezer_num');
            $table->string('freezer_acquisition');
            $table->integer('dryer_num');
            $table->string('dryer_acquisition');
            $table->integer('pump_num');
            $table->string('pump_acquisition');
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
