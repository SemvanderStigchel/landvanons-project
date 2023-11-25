<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tasks', TaskController::class);

Route::post('/tasks/{task}/enroll', [TaskController::class, 'enroll'])->name('tasks.enroll');
Route::post('/tasks/{task}/unsub', [TaskController::class, 'unsubscribe'])->name('tasks.unsub');

Route::get('/tasks/{task}/enrolled', [TaskController::class, 'enrollSuccess'])->name('tasks.enroll-success');
