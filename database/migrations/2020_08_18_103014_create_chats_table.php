<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {

            $table->increments('id');
            
            $table->string('customer_email')->nullable();
            $table->string('customer_full_name')->nullable();
            $table->string('customer_phone_number')->nullable();
            $table->string('customer_address')->nullable();

            $table->integer('product_id')->nullable();
            
            $table->integer('user_id')->nullable();
            
            $table->string('request_title')->nullable();
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
        Schema::dropIfExists('chats');
    }
}
