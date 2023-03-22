<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableCbat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('chat', function (Blueprint $table) {
        //     $table->id(); // crea un campo id autoincrementable
        //     $table->string('mensaje');
        //     $table->string('created_at');
        //     $table->foreignId('idChatStream')->constrained('streaming'); // crea un campo idChatStream que referencia al campo id de la tabla streaming
        //     // agrega otros campos que necesites para la tabla chat
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
