<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosgradoController;
use App\Http\Controllers\RevistaController;

/*
|--------------------------------------------------------------------------
| RUTA PRINCIPAL DEL SITIO
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD (solo usuarios autenticados)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PERFIL DE USUARIO (Laravel Breeze)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| MÓDULO DE POSGRADOS
|--------------------------------------------------------------------------
*/
Route::get('/posgrados', [PosgradoController::class, 'index'])->name('posgrados.index');

/*
|--------------------------------------------------------------------------
| MÓDULO DE REVISTA DIGITAL (PÚBLICO)
|--------------------------------------------------------------------------
*/
Route::prefix('revistas')->group(function () {

    // Portada de revista
    Route::get('/', [RevistaController::class, 'index'])->name('revistas.index');

    // Ejemplares publicados
    Route::get('/numeros', [RevistaController::class, 'numeros'])->name('revistas.numeros');

    // Ver un número específico
    Route::get('/numero/{id}', [RevistaController::class, 'verNumero'])->name('revistas.verNumero');

    // Convocatoria
    Route::get('/convocatoria', [RevistaController::class, 'convocatoria'])->name('revistas.convocatoria');

    // Comité editorial
    Route::get('/comite', [RevistaController::class, 'comite'])->name('revistas.comite');

    // Ver artículo
    Route::get('/articulo/{id}', [RevistaController::class, 'verArticulo'])->name('revistas.verArticulo');
});
