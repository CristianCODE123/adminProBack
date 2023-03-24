<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChatAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
            // Schema::table('chat', function (Blueprint $table) {
            //     $table->unsignedBigInteger('streaming_id');
            //     $table->foreign('streaming_id')->references('id')->on('streaming');
            //     $table->string('username');
            // });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
