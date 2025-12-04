<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Habito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PuntosHistorial;

class HabitoController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $tipo = $request->tipo;

        // POSITIVOS
        $positivos = Habito::where('user_id', $usuario->id)
                            ->where('polaridad', 'positivo')
                            ->when($tipo, fn($q) => $q->where('tipo', $tipo))
                            ->where('realizado', false) // 🔥 para ocultar los completados
                            ->get();

        // NEGATIVOS
        $negativos = Habito::where('user_id', $usuario->id)
                            ->where('polaridad', 'negativo')
                            ->where('realizado', false)
                            ->get();

        return view('habitos.index', compact('positivos', 'negativos'));
    }

    public function completar(Habito $habito)
{
    $usuario = Auth::user();

    if ($habito->realizado) {
        return back()->with('mensaje', 'Este hábito ya fue completado.');
    }

    // Marcar como realizado
    $habito->realizado = true;
    $habito->save();

    // Calcular puntos según polaridad del hábito
    $puntos = $habito->polaridad === 'positivo' ? +$habito->puntos_por_unidad : -$habito->puntos_por_unidad;

    // Sumar/restar al usuario
    $usuario->puntos += $puntos;
    $usuario->save();

    // 🔥 REGISTRAR EN HISTORIAL REAL
    PuntosHistorial::create([
        'user_id' => $usuario->id,
        'accion' => "Hábito completado: " . $habito->nombre,
        'cantidad' => $puntos,
        'fecha' => now(),
    ]);

    return back()->with('mensaje', '¡Hábito completado con éxito!');
}


    public function create()
    {
        return view('habitos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:100',
            'polaridad' => 'required|string|in:positivo,negativo',
            'unidad' => 'nullable|string|max:100',
            'puntos_por_unidad' => 'required|integer',
            'fecha_opcion' => 'required|string|in:hoy,semana,mes',
        ]);

        $usuario = Auth::user();

        // Calcular fecha límite
        $fecha = Carbon::now();

        if ($request->fecha_opcion === 'hoy') {
            $fecha_limite = $fecha->copy()->endOfDay(); // hoy 11:59 PM
        }
        elseif ($request->fecha_opcion === 'semana') {
            $fecha_limite = $fecha->copy()->endOfWeek()->setTime(23, 59);
        }
        else { // mes
            $fecha_limite = $fecha->copy()->endOfMonth()->setTime(23, 59);
        }
        $puntos = $request->puntos_por_unidad;
        Habito::create([
            'user_id' => $usuario->id,
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'polaridad' => $request->polaridad,
            'unidad' => $request->unidad,
            'puntos_por_unidad' => $request->puntos_por_unidad,
            'fecha_limite' => $fecha_limite, // ✔ fecha generada automáticamente
        ]);

        return redirect()->route('habitos.index')
            ->with('mensaje', 'Hábito registrado correctamente.');
}
public function estadisticas()
{
    $usuario = Auth::user();

    // --- HÁBITOS COMPLETADOS (TODOS) ---
    $habitosCompletadosBase = Habito::where('user_id', $usuario->id)
        ->where('realizado', true);

    $totalHabitosCompletados = (clone $habitosCompletadosBase)->count();

    // --- Racha actual (días seguidos con al menos 1 hábito completado) ---
    $fechas = (clone $habitosCompletadosBase)
        ->orderBy('updated_at', 'desc')
        ->pluck('updated_at')
        ->map(fn ($f) => $f->toDateString())
        ->unique()
        ->values();

    $racha = 0;
    $cursor = Carbon::today();

    foreach ($fechas as $fechaTexto) {
        if ($fechaTexto === $cursor->toDateString()) {
            $racha++;
            $cursor->subDay();
        } elseif ($fechaTexto < $cursor->toDateString()) {
            break;
        }
    }

    // --- PUNTOS ---
    $puntosGanados = $usuario->puntos ?? 0;
    $maxPuntos = $usuario->puntos ?? 0;

    // --- RANGO: ÚLTIMOS 7 DÍAS ---
    $hoy = Carbon::today();
    $inicioSemana = $hoy->copy()->subDays(6);

    $labelsDias      = [];
    $datosDiasAgua   = [];
    $datosDiasAct    = [];
    $datosDiasPant   = [];
    $datosDiasTotal  = []; // total de hábitos (por si lo quieres mostrar)

    for ($i = 6; $i >= 0; $i--) {
        $fecha = $hoy->copy()->subDays($i);
        $labelsDias[] = $fecha->format('d M');

        // total de hábitos completados ese día (cualquiera)
        $datosDiasTotal[] = (clone $habitosCompletadosBase)
            ->whereDate('updated_at', $fecha)
            ->count();

        // agua
        $datosDiasAgua[] = Habito::where('user_id', $usuario->id)
            ->where('tipo', 'agua')
            ->where('realizado', true)
            ->whereDate('updated_at', $fecha)
            ->sum('puntos_por_unidad');

        // actividad física
        $datosDiasAct[] = Habito::where('user_id', $usuario->id)
            ->where('tipo', 'actividad')
            ->where('realizado', true)
            ->whereDate('updated_at', $fecha)
            ->sum('puntos_por_unidad');

        // tiempo en pantalla
        $datosDiasPant[] = Habito::where('user_id', $usuario->id)
            ->where('tipo', 'pantalla')
            ->where('realizado', true)
            ->whereDate('updated_at', $fecha)
            ->sum('puntos_por_unidad');
    }

    // --- HORAS DE SUEÑO (últimos 7 días) ---
    $totalHorasSueno = Habito::where('user_id', $usuario->id)
        ->where('tipo', 'sueno')
        ->where('realizado', true)
        ->whereDate('updated_at', '>=', $inicioSemana)
        ->sum('puntos_por_unidad');

    $promedioHorasSueno = round($totalHorasSueno / 7, 1);

    // --- VECES QUE COMIÓ (alimentación) ---
    $vecesComio = Habito::where('user_id', $usuario->id)
    ->where('tipo', 'comida')
    ->where('realizado', true)
    ->whereDate('updated_at', '>=', $inicioSemana)
    ->sum('puntos_por_unidad');


    return view('estadisticas', compact(
        'totalHabitosCompletados',
        'racha',
        'puntosGanados',
        'maxPuntos',
        'labelsDias',
        'datosDiasAgua',
        'datosDiasAct',
        'datosDiasPant',
        'datosDiasTotal',
        'totalHorasSueno',
        'promedioHorasSueno',
        'vecesComio'
    ));
}


}
