<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Habito;

class HabitoSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = User::first();

        if (!$usuario) {
            return;
        }

        Habito::create([
            'user_id' => $usuario->id,
            'nombre' => 'tomar agua',
            'tipo' => 'agua',
            'polaridad' => 'positivo',
            'unidad' => 'vasos',
            'puntos_por_unidad' => 10,
        ]);

        Habito::create([
            'user_id' => $usuario->id,
            'nombre' => 'dormir',
            'tipo' => 'sueño',
            'polaridad' => 'positivo',
            'unidad' => 'horas',
            'puntos_por_unidad' => 15,
        ]);
    }
}
