<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('habitos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('nombre');
        $table->string('tipo')->nullable();          // agua, sueño, actividad, comida, etc.
        $table->string('polaridad')->default('positivo'); // positivo / negativo
        $table->string('unidad')->nullable();        // vasos, horas, minutos
        $table->integer('puntos_por_unidad')->default(0);
        $table->timestamps();

        $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitos');
    }
};
