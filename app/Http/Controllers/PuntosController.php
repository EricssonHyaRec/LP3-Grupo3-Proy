<?php

namespace App\Http\Controllers;

use App\Models\PuntosHistorial;
use Illuminate\Support\Facades\Auth;

class PuntosController extends Controller
{
    public function index()
    {
        $historial = PuntosHistorial::where('user_id', Auth::id())
            ->orderBy('fecha', 'desc')
            ->get();

        return view('puntos.historial', compact('historial'));
    }
}
