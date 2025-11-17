<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cursos', [CursoController::class, 'index'])->middleware('auth')->name('cursos.index');

Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth')->name('perfil');

Route::get('/inicio', function () {
    return view('inicio');
})->middleware('auth')->name('inicio');

//en esta caso se agrega el middleware para el auth q no se pueda ingresar sin login