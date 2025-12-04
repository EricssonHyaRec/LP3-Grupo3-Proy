<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('puntos_historial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('accion');              // descripción del hábito
            $table->integer('cantidad');           // +10 o -10 o cualquier valor
            $table->timestamp('fecha');            // fecha cuando ocurrió
        });
    }

    public function down()
    {
        Schema::dropIfExists('puntos_historial');
    }
};