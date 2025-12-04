<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Habito;
use Carbon\Carbon;

class HabitosSeeder extends Seeder
{
    public function run(): void
    {
        $habitos = [
            // ----------- POSITIVOS -----------
            ['Hacer ejercicio', 'salud'],
            ['Leer 20 minutos', 'cultura'],
            ['Tomar suficiente agua', 'salud'],
            ['Estudiar 1 hora', 'estudio'],
            ['Limpiar mi espacio', 'orden'],
            ['Practicar meditación', 'bienestar'],
            ['Comer fruta', 'salud'],
            ['Hacer un acto de bondad', 'vida'],
            ['Dormir a buena hora', 'salud'],
            ['Practicar mi hobby', 'creatividad'],

            // ----------- NEGATIVOS -----------
            ['Usar el celular en exceso', null],
            ['Procrastinar', null],
            ['Dormir tarde', null],
            ['Consumir comida chatarra', null],
            ['Enojarme sin razón', null],
            ['Dejar cosas a medias', null],
            ['Pasar muchas horas sentado', null],
            ['Gastar dinero impulsivamente', null],
            ['No cumplir tareas', null],
            ['Desordenar mi cuarto', null],
        ];

        foreach ($habitos as $index => $item) {

            $polaridad = $index < 10 ? 'positivo' : 'negativo';

            // Fecha límite aleatoria (hoy / semana / mes)
            $opcion = collect(['hoy', 'semana', 'mes'])->random();
            $now = Carbon::now();

            if ($opcion === 'hoy') {
                $fecha = $now->copy()->endOfDay();
            } elseif ($opcion === 'semana') {
                $fecha = $now->copy()->endOfWeek()->setTime(23, 59);
            } else {
                $fecha = $now->copy()->endOfMonth()->setTime(23, 59);
            }

            Habito::create([
                'user_id' => 1, // ⚠️ Cambiar si quieres otro usuario
                'nombre' => $item[0],
                'tipo' => $item[1],
                'polaridad' => $polaridad,
                'unidad' => null,
                'puntos_por_unidad' => 10,
                'fecha_limite' => $fecha,
            ]);
        }
    }
}
