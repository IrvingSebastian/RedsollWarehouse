<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\ImpresionController;
use Illuminate\Auth\Events\Login;
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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('auth', 'admin');
Route::post('/register', [RegisterController::class, 'register'])->name('register')->middleware('auth', 'admin');

//Rutas de los registros
Route::resource('piezas', PiezaController::class)->middleware('auth', 'instaler');
Route::resource('piezas', PiezaController::class)->middleware('auth', 'admin');
Route::get('/search', [PiezaController::class, 'search'])->name('search')->middleware('auth');

Route::post('/selector', [ImpresionController::class, 'selector'])->name('selector')->middleware('auth', 'instaler');
Route::get('/imprimir', [ImpresionController::class, 'imprimir'])->name('selector.imprimir')->middleware('auth', 'instaler');
Route::get('/borrar', [ImpresionController::class, 'borrar'])->name('selector.borrar')->middleware('auth', 'instaler');
Route::get('/visualizar', [ImpresionController::class, 'visualizar'])->name('selector.visualizar')->middleware('auth', 'instaler');


