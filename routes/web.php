<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HabitoController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

    Route::put('/perfil/update', [App\Http\Controllers\PerfilController::class, 'update'])
     ->name('perfil.update');


    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');

    // hábitos con bd
    Route::get('/habitos', [HabitoController::class, 'index'])->name('habitos.index');
    Route::get('/habitos/crear', [HabitoController::class, 'create'])->name('habitos.create');
    Route::post('/habitos', [HabitoController::class, 'store'])->name('habitos.store');

    // puntos (de momento siguen estáticos en vista)
    Route::get('/puntos', function () {
        return view('puntos.index');
    })->name('puntos.index');

    Route::get('/puntos/historial', function () {
        return view('puntos.historial');
    })->name('puntos.historial');

    // estadísticas (vista estática por ahora)
    Route::get('/estadisticas', function () {
        return view('estadisticas');
    })->name('estadisticas');

    // recomendaciones (vista estática por ahora)
    Route::get('/recomendaciones', function () {
        return view('recomendaciones');
    })->name('recomendaciones');
});
