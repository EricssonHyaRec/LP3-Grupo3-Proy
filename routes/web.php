<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HabitoController;
use App\Http\Controllers\PuntosController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

// perfil editar
    Route::put('/perfil/update', [App\Http\Controllers\PerfilController::class, 'update'])
     ->name('perfil.update');


    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');

    // hábitos con bd
    Route::get('/habitos', [HabitoController::class, 'index'])->name('habitos.index');
    Route::get('/habitos/crear', [HabitoController::class, 'create'])->name('habitos.create');
    Route::post('/habitos', [HabitoController::class, 'store'])->name('habitos.store');

    // puntos con bd
    Route::get('/puntos', function () {
        $usuario = Auth::user();
        $puntos = $usuario->puntos ?? 0;

        return view('puntos.index', compact('puntos'));
    })->name('puntos.index');


    Route::get('/puntos/historial', [PuntosController::class, 'index'])
        ->name('puntos.historial');

    // estadísticas con bd zahid
    Route::get('/estadisticas', [HabitoController::class, 'estadisticas'])
    ->name('habitos.estadisticas')
    ->middleware('auth');

    // recomendaciones (vista estática por ahora)
    Route::get('/recomendaciones', function () {
        return view('recomendaciones');
    })->name('recomendaciones');

    Route::get('/tienda', function () {
        return view('tienda.tienda');
    })->name('tienda');
    Route::post('/habitos/{habito}/completar', [HabitoController::class, 'completar'])
    ->name('habitos.completar');

});
