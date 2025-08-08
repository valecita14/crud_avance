<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ruta pública de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta al dashboard, mostrando productos
Route::get('/dashboard', [ProductoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de productos
    Route::resource('productos', ProductoController::class);
    
});

require __DIR__.'/auth.php';
