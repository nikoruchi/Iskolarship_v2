<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('msg_id');
            $table->integer('msg_receiver')->references('user_id')->on('users');
            $table->integer('msg_sender')->references('user_id')->on('users');
            $table->text('msg_subject');
            $table->text('msg_content');
            $table->timestamp('msg_date');
            $table->string('msg_status');
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
        Schema::dropIfExists('messages');
    }
}
