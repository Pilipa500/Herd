<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\NuevosalumnosController;
use App\Http\Controllers\MensajeController;


//ruta para la vista de inicio
//tuve que añadir esta ruta para el archivo home.
Route::get('/home', function () {
    return view('home');
})->name('home');


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

//rutas para el perfil, están en el dashboard, más abajo. Y este no vale.

// Route::middleware('auth')->group(function () {
//     Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
//     Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::delete('/profile/{id}/destroy', [ProfileController::class, 'update'])->name('profile.destroy');
// });


// Rutas para el registro de nuevos alumnos
Route::middleware(['guest'])->group(function () {
    Route::get('/registro', [NuevosalumnosController::class, 'create'])->name('registro');
    Route::post('/registro', [NuevosalumnosController::class, 'store']);
  
});
Route::resource('nuevosalumnos', NuevosalumnosController::class);//este sustituye a las rutas que están abajo

// /ruta para la vista de usuarios.
// Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
// //definición de las rutas para el CRUD de usuarios
// Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
// Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
// Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
// Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
// Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
// Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/formulario', function () {
    return view('formulario');
});
// Ruta para manejar la inserción
Route::post('/prueba', [PruebaController::class, 'store']);


//ruta para mostrar el formulario de registro

// Route::get('/registro', function () {

//     return view('registro');

// })->name('registro');//definición de la ruta con nombre para referenciarla de manera más flexible y robusta

//ruta para manejar la inserción de nuevos alumnos
//Route::post('/nuevosalumnos', [NuevosalumnosController::class, 'store'])->name('nuevosalumnos.store') ;


// Rutas para el sistema de mensajería. Cambié el anterior, por este que sustituye con un 
//solo comando a todas las rutas anteriores.
Route::resource('mensajes', MensajeController::class);
//rutas para proteger las rutas de la aplicación, solo los usuarios logados pueden acceder a ellas
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [NuevosalumnosController::class, 'index'])->name('dashboard');
    Route::resource('mensajes', MensajeController::class);
    Route::get('/buscar', [NuevosalumnosController::class, 'buscar'])->name('buscar');
    Route::post('/buscar', [NuevosalumnosController::class, 'buscarResultados'])->name('buscar.resultados');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); //ruta para mostrar las tareas
   });

// Rutas para el inicio de sesión
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [NuevosalumnosController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [NuevosalumnosController::class, 'login']);
    
});
Route::post('/logout', [NuevosalumnosController::class, 'logout'])->name('logout');



require __DIR__.'/auth.php';
