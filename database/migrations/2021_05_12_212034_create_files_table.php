<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id('idFiles');
            $table->string('name')->nulleable();
            $table->string('file_path')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('fk_ticket');

            $table->foreign('fk_ticket')->references('idTicket')->on('ticket');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
