<?php

namespace App\Http\Controllers;

use App\Models\Habito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabitoController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        $habitos = Habito::where('user_id', $usuario->id)->get();

        return view('habitos.index', compact('habitos'));
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
