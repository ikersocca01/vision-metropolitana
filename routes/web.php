<?php

use App\Http\Controllers\NotaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nota', [NotaController::class, 'index'])->name('nota.index');
Route::get('/nota/create', [NotaController::class, 'create'])->name('nota.create');
Route::post('/nota', [NotaController::class, 'store'])->name('nota.store');
Route::get('/nota/{nota}/edit', [NotaController::class, 'edit'])->name('nota.edit');
Route::put('/nota/{nota}/update', [NotaController::class, 'update'])->name('nota.update');
Route::delete('/nota/{nota}/destroy', [NotaController::class, 'destroy'])->name('nota.destroy');
