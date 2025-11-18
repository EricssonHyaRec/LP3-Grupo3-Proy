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

//INICIO Y PERFIL
Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth')->name('perfil');

Route::get('/inicio', function () {
    return view('inicio');
})->middleware('auth')->name('inicio');

// en esta caso se agrega el middleware para el auth q no se pueda ingresar sin login


//HABITOS Y SU REGISTRO
Route::get('/habitos', function () {
    return view('habitos.index');
})->middleware('auth')->name('habitos.index');

Route::get('/habitos/crear', function () {
    return view('habitos.create');
})->middleware('auth')->name('habitos.create');



//PUNTOS
Route::get('/puntos', function () {
    return view('puntos.index');
})->middleware('auth')->name('puntos.index');

Route::get('/puntos/historial', function () {
    return view('puntos.historial');
})->middleware('auth')->name('puntos.historial');



//ESTADISTICAS
Route::get('/estadisticas', function () {
    return view('estadisticas');
})->middleware('auth')->name('estadisticas');


//ADMIN 
Route::get('/admin/usuarios', function () {
    // Aquí solo vamos a enviar datos falsos
    $usuarios = [
        ['id' => 1, 'name' => 'Yhozira', 'email' => 'yho@example.com'],
        ['id' => 2, 'name' => 'Carlos', 'email' => 'carlos@example.com'],
        ['id' => 3, 'name' => 'María', 'email' => 'maria@example.com'],
    ];

    return view('admin.usuarios.index', compact('usuarios'));
});