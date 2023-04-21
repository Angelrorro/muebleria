<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WsCrudArticulo;
use App\Http\Controllers\mssms;

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
    return view('welcome');
});

Route::get('/articulo', [App\Http\Controllers\mssms::class, 'conexion'])->name('articulo');


Route::post('/articulo', [App\Http\Controllers\WsCrudArticulo::class, 'store'])->name('articulo');

