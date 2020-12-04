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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\RequestController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\RequestController::class, 'create'])->name('create');
Route::post('/create', [App\Http\Controllers\RequestController::class, 'store'])->name('create');
Route::get('/edit/{id}', [App\Http\Controllers\RequestController::class, 'edit'])->name('edit');
Route::post('/edit/{id}', [App\Http\Controllers\RequestController::class, 'update'])->name('update');
