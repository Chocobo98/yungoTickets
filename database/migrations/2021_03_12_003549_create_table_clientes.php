<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('idCliente');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->integer('telefono')->number_format();
            $table->string('domicilio');
            $table->unsignedBigInteger('fk_paquete');
            $table->string('fk_mac');
            $table->unsignedBigInteger('fk_sitios');
        });

        Schema::table('clientes', function (Blueprint $table){
            $table->foreign('fk_paquete')->references('idPaquete')->on('paquete')->onDelete('cascade');
            $table->foreign('fk_mac')->references('MAC')->on('inventario')->onDelete('cascade');
            $table->foreign('fk_sitios')->references('idSitios')->on('sitios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
