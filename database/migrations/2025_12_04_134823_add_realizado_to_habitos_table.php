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
        Schema::table('habitos', function (Blueprint $table) {
            $table->boolean('realizado')
                  ->default(false)
                  ->after('puntos_por_unidad'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('habitos', function (Blueprint $table) {
            $table->dropColumn('realizado');
        });
    }
};
