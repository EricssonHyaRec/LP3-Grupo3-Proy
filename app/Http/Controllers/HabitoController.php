<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Habito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // 🔥 SUMA O RESTA SEGÚN POLARIDAD
        if ($habito->polaridad === 'positivo') {
            $usuario->puntos += 10;   // suma 10 por hábito positivo
        } else {
            $usuario->puntos -= 10;   // resta 10 por hábito negativo
        }

        $usuario->save();

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

}
