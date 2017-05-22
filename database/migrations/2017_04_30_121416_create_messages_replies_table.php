<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_replies', function (Blueprint $table) {
            $table->increments('reply_id');
            $table->integer('user_id')->references('user_id')->on('users');
            $table->integer('msg_id')->references('msg_id')->on('messages');
            $table->string('reply_content');
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
        Schema::dropIfExists('messages_replies');
    }
}
