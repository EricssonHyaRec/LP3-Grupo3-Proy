<?php

namespace App\Http\Controllers;

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
                            ->when($tipo, function($q) use ($tipo) {
                                return $q->where('tipo', $tipo);
                            })
                            ->get();

        // NEGATIVOS (sin filtro)
        $negativos = Habito::where('user_id', $usuario->id)
                            ->where('polaridad', 'negativo')
                            ->get();

        return view('habitos.index', compact('positivos', 'negativos'));
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
        ]);

        $usuario = Auth::user();

        Habito::create([
            'user_id' => $usuario->id,
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'polaridad' => $request->polaridad,
            'unidad' => $request->unidad,
            'puntos_por_unidad' => $request->puntos_por_unidad,
        ]);

        return redirect()->route('habitos.index')
            ->with('mensaje', 'hábito registrado correctamente.');
    }
}
