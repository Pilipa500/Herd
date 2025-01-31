<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\NuevosalumnosController;
use App\Http\Controllers\MensajeController;


// Route::get('/', function () {
//     return view('welcome');
// });

//tuve que añadir esta ruta para el archivo home.
Route::get('/home', function () {
    return view('home');
});


//tuve que añadir esta ruta porque no veia el archivo index.
Route::get('/tasks', function () {
    return view('layouts.index');
});
//ruta añadida para la edición de tareas (tenia que dar accion al boton de Editar)
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');


//recursos para las tareas
Route::resource('tasks',TaskController::class);

//ruta para el dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//rutas para el perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para el registro de usuarios (asegurarme de que no haya duplicación)
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [UsuarioController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UsuarioController::class, 'register']);
});

// //aseguro que las rutas del registro están correctas 
// Route::middleware(['guest'])->group(function () {
//     Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
//     Route::post('/register', [RegisteredUserController::class, 'store']);
// });

//rutas para el registro de usuarios
// Route::get('/register', [UsuarioController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [UsuarioController::class, 'register']);

//ruta para la vista de usuarios.
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
//definición de las rutas para el CRUD de usuarios
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/formulario', function () {
    return view('formulario');
});
// Ruta para manejar la inserción
Route::post('/prueba', [PruebaController::class, 'store']);


//ruta para mostrar el formulario de registro

Route::get('/registro', function () {

    return view('registro');

})->name('registro');//definició de la ruta con nombre para referenciarla de manera más flexible y robusta

//ruta para manejar la inserción de nuevos alumnos
//Route::post('/nuevosalumnos', [NuevosalumnosController::class, 'store'])->name('nuevosalumnos.store') ;
Route::resource('nuevosalumnos', NuevosalumnosController::class);

//ruta para el buscador
Route::get('/buscar', [NuevosalumnosController::class, 'buscar'])->name('buscar');
Route::post('/buscar', [NuevosalumnosController::class, 'buscarResultados'])->name('buscar.resultados');

// Rutas para el sistema de mensajería. Cambié el anterior, por este que sustituye con un 
//solo comando a todas las rutas anteriores.
Route::resource('mensajes', MensajeController::class);
require __DIR__.'/auth.php';
