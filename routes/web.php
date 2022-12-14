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


Route::post('/cart-add',[\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');

Route::get('/cart-checkout',[\App\Http\Controllers\CartController::class, 'cart'])->name('cart.checkout');

Route::post('/update-cart', [\App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');

Route::post('/cart-clear',[\App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

Route::post('/cart-removeitem',[\App\Http\Controllers\CartController::class, 'removeitem'])->name('cart.removeitem');


Route::get('busqueda/conciertos',[\App\Http\Controllers\BusquedaController::class, 'conciertos'])->name('busqueda.conciertos');