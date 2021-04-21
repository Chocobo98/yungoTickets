<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->id('idTicket');
            $table->string('tipoProblema');
            $table->date('Fecha');
            $table->string('descripcion');
            $table->bigInteger('fk_cliente');
        });

        Schema::table('ticket',function(Blueprint $table)
        {
            $table->foreign('fk_cliente')->references('idCliente')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_ticket');
    }
}
