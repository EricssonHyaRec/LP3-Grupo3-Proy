<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('habitos', function (Blueprint $table) {
            $table->date('fecha_limite')->nullable()->after('puntos_por_unidad');
            $table->boolean('realizado')->default(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('habitos', function (Blueprint $table) {
            $table->dropColumn('fecha_limite');
        });
    }
};
