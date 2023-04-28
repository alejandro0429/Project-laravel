<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\consulta_reciboController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\movimientoController;
use App\Http\Controllers\MorosidadController;
use App\Http\Controllers\MorosoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/consulta_recibo', [App\Http\Controllers\consulta_reciboController::class, 'index'])->name('consulta_recibo.index');

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');



Route::get('/tarjeta', [App\Http\Controllers\TarjetaController::class, 'index'])->name('tarjeta');
Route::post('/tarjeta', [App\Http\Controllers\TarjetaController::class, 'guardar'])->name('tarjeta.guardar');
Route::get('/tarjeta/create/', [App\Http\Controllers\TarjetaController::class, 'create'])->name('tarjeta.create');

Route::post('/tarjeta/create/', [App\Http\Controllers\TarjetaController::class, 'store'])->name('tarjeta.store');

Route::get('tarjeta/{tarjeta}/edit', [App\Http\Controllers\TarjetaController::class, 'edit'])->name('tarjeta.edit');
Route::put('tarjeta/{tarjeta}/edit', [App\Http\Controllers\TarjetaController::class, 'update'])->name('tarjeta.update');

Route::get('/movimientos', [App\Http\Controllers\movimientoController::class, 'index'])->name('movimiento');

Route::resource('morosidad', App\Http\Controllers\MorosidadController::class)->names('morosidads');

Route::get('/moroso', [App\Http\Controllers\MorosoController::class, 'index'])->name('retraso');
