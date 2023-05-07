<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PiezaController;
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

Route::get('/', [HomeController::class, 'raiz'])->name('raiz');
Route::get('/home', [HomeController::class, 'home'])->name('home');

Auth::routes();
Route::resource('piezas', PiezaController::class)->middleware('auth');