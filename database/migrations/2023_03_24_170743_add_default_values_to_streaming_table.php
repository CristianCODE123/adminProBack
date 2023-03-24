<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValuesToStreamingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('streamings', function (Blueprint $table) {
            $table->string('imagen')->default('null')->change();
            $table->string('stream')->default('null')->change();
            $table->string('chatStream')->default('null')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('streaming', function (Blueprint $table) {
            //
        });
    }
}
