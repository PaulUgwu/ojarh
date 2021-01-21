<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_replies', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('chat_id')->nullable();

            $table->integer('admin_id')->nullable();

            $table->string('message')->nullable();
            $table->string('replyer_name')->nullable(); //takes customer name or seller name

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_replies');
    }
}
