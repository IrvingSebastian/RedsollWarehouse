<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\ImpresionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Rutas comunes
Route::get('/', [HomeController::class, 'raiz'])->name('raiz');
Route::get('/home', [HomeController::class, 'home'])->name('home');

//Rutas con inicio de sesión
Auth::routes();

//Rutas de los registros
Route::resource('piezas', PiezaController::class)->middleware('auth');
Route::get('/search', [PiezaController::class, 'search'])->name('search')->middleware('auth');
Route::get('/imprimir', [ImpresionController::class, 'imprimir'])->name('imprimir')->middleware('auth');
Route::get('/', [ImpresionController::class, 'shop'])->name('shop');
Route::get('/cart', [ImpresionController::class, 'cart'])->name('cart.index');
Route::post('/add', [ImpresionController::class, 'add'])->name('cart.store');
Route::post('/update', [ImpresionController::class, 'update'])->name('cart.update');
Route::post('/remove', [ImpresionController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [ImpresionController::class, 'clear'])->name('cart.clear');
