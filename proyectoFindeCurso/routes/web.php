<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AyudaController;
Route::get('/', function () {
    return view('welcome');
}) ->name('home');

Route::get('inscripcion', function () {
    return view('inscripcion');
}) ->name('inscripcion');


Route::get('edicion', [AyudaController::class,'index'])->name('edicion');


//Aqui tengo que poner la navegacion que quiera que salga cuando se inscriba el usuario
//esto lo he añadido esta mañana nuevo 16/05/2024
Route::post('/guardar-inscripcion', 'InscripcionController@guardar')->name('guardar_inscripcion');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
