<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DecorationsController;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/decorations', [DecorationsController::class, 'index'])->name('decorations');

Route::resource('posts', PostController::class);

Route::post('purchaseItem', [DecorationsController::class, 'purchase'])->name('item.purchase');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::put('/profile', [ProfileController::class, 'updateCredentials'])->name('profile.update-credentials');

Route::resource('tasks', TaskController::class);
Route::post('/tasks/{task}/enroll', [TaskController::class, 'enroll'])->name('tasks.enroll');
Route::post('/tasks/{task}/unsub', [TaskController::class, 'unsubscribe'])->name('tasks.unsub');
Route::get('/tasks/{task}/enrolled', [TaskController::class, 'enrollSuccess'])->name('tasks.enroll-success');
Route::patch('/tasks/{task}/pay-out', [TaskController::class, 'payOutPoints'])->name('tasks.pay-out-points');
