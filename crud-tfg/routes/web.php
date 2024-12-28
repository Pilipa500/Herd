<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;


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



Route::resource('tasks',TaskController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//aseguro que las rutas del registro están correctas 
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

//rutas para el registro de usuarios
Route::get('/register', [UsuarioController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UsuarioController::class, 'register']);

//ruta para la vista de usuarios.
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
require __DIR__.'/auth.php';
