<?php

use App\Http\Controllers\PostController;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/decorations', [App\Http\Controllers\DecorationsController::class, 'index'])->name('decorations');

Route::resource('posts', PostController::class);

Route::post('purchaseItem', [App\Http\Controllers\DecorationsController::class, 'purchase'])->name('item.purchase');
