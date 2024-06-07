<?php

use App\Http\Controllers\CartaController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\MisNiniosController;
use App\Http\Controllers\NinioController;
use App\Http\Controllers\ResponderCartaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\Carta;
use App\Models\Comercio;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Artisan::call('cache:clear');
    // Artisan::call('config:clear');
    // Artisan::call('config:cache');
    // Artisan::call('storage:link');
    // Artisan::call('key:generate');
    // Artisan::call('migrate:fresh --seed');
    return view('welcome');
})->name('welcome');



Auth::routes(['register' => false]);




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::post('validarec', [HomeController::class, 'validarec'])->name('validarec');
    Route::get('/buscar-dispositivos', [HomeController::class, 'buscarDispositivos'])->name('dispositivos.buscar');


    // usuarios
    Route::resource('usuarios', UserController::class);
    // comunidad
    Route::resource('comunidad', ComunidadController::class);
    // comercios
    Route::resource('comercios', ComercioController::class);
    Route::get('comercios/ver-foto/{id}',[ComercioController::class,'verFoto'])->name('comercios.verFoto');
    Route::get('comercios/descargar-foto/{id}',[ComercioController::class,'descargarFoto'])->name('comercios.descargarFoto');
    Route::resource('dispositivos', DispositivoController::class);
    Route::resource('lecturas', LecturaController::class);

});


