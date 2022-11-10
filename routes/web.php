<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/concierto',[\App\Http\Controllers\ConciertoController::class, 'index'])->name('concierto.index');

Route::get('/concierto/{concierto}',[\App\Http\Controllers\ConciertoController::class, 'show'])->name('concierto.show');

Route::get('/artista',[\App\Http\Controllers\ArtistaController::class, 'index'])->name('artista.index');

