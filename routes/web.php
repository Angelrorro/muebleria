<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WsCrudArticulo;
use App\Http\Controllers\mssms;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;

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



Route::get('/articulo', [App\Http\Controllers\mssms::class, 'conexion'])->name('articulo');


Route::post('/articulo', [App\Http\Controllers\WsCrudArticulo::class, 'store'])->name('articulo');

Route::get('/', function () {
    return view('catalogo');
});

Route::get('/register', [RegisterController::class, 'index'])->name('crear-cuenta');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [PostController::class, 'index'])->name('posts.index');

