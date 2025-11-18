<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth')->name('perfil');

Route::get('/inicio', function () {
    return view('inicio');
})->middleware('auth')->name('inicio');

// en esta caso se agrega el middleware para el auth q no se pueda ingresar sin login

Route::get('/habitos', function () {
    return view('habitos.index');
})->middleware('auth')->name('habitos.index');

Route::get('/habitos/crear', function () {
    return view('habitos.create');
})->middleware('auth')->name('habitos.create');


Route::get('/puntos', function () {
    return view('puntos.index');
})->middleware('auth')->name('puntos.index');

Route::get('/puntos/historial', function () {
    return view('puntos.historial');
})->middleware('auth')->name('puntos.historial');
