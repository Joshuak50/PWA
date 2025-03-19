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
        Schema::create('polizas', function (Blueprint $table) {
            $table->id();
            $table->integer('total_horas');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->float('precio');
            $table->unsignedBigInteger('id_cliente');
            $table->string('observaciones');

            $table->foreign('id_cliente')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polizas');
    }
};
