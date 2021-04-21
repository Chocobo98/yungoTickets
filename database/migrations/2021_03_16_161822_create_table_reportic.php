<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReportic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportic', function (Blueprint $table) {
            $table->bigInteger('fk_reporte')->unsigned();
            $table->bigInteger('fk_ticket')->unsigned();
        });

        
        Schema::table('reportic', function (Blueprint $table)
        {
            $table->foreign('fk_reporte')->references('idReportes')->on('reportes')->onDelete('cascade');
            $table->foreign('fk_ticket')->references('idTicket')->on('ticket')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_reportic');
    }
}
