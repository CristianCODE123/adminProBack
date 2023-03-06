<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         $table->string('role')->after('email')->default('active');
    //         $table->string('age')->after('role')->default('0');
    //     });
    //     Schema::table('users', function (Blueprint $table) {
        
    //         $table->string('age')->after('role')->default('0');
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('age');

        });
    }
}
