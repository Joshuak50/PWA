<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_tecnico');
            $table->dateTime('fecha');
            $table->float('horas');
            $table->string('observaciones');
            $table->unsignedBigInteger('id_poliza')->nullable();
            $table->unsignedBigInteger('id_factura')->nullable();

            $table->foreign('id_cliente')->references('id')->on('users');
            $table->foreign('id_tecnico')->references('id')->on('users');
            $table->foreign('id_poliza')->references('id')->on('polizas');
            $table->foreign('id_factura')->references('id')->on('facturas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
