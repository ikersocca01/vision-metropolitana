<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Rutas de la página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas de inicio de sesión y registro para el administrador
Route::prefix('admin')->name('admin.')->group(function () {

    // Rutas de registro de administrador
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

    // Rutas de inicio de sesión del administrador
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    // Rutas protegidas por autenticación (admin)
    Route::middleware('auth:admin')->group(function () {
        // Dashboard del administrador
        Route::get('/dashboard', function () {
            return view('admin.dashboard');  // Asegúrate de tener esta vista
        })->name('dashboard');

        // Logout del administrador
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});

// Rutas comunes para los usuarios autenticados
Route::middleware('auth')->group(function () {
    // Perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de notas (para todos los usuarios)
Route::get('/nota', [NotaController::class, 'index'])->name('nota.index');
Route::get('/nota/create', [NotaController::class, 'create'])->name('nota.create');
Route::post('/nota', [NotaController::class, 'store'])->name('nota.store');
Route::get('/nota/{nota}/edit', [NotaController::class, 'edit'])->name('nota.edit');
Route::put('/nota/{nota}/update', [NotaController::class, 'update'])->name('nota.update');
Route::delete('/nota/{nota}/destroy', [NotaController::class, 'destroy'])->name('nota.destroy');

// Rutas de autenticación para usuarios (común)
require __DIR__ . '/auth.php';
