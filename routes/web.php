<?php

use App\Http\Controllers\Statistics;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');

Route::get('statistics', Statistics::class);

Route::get('/users/search', [UserController::class, 'searchUsers'])->name('users.search');
Route::get('/admin/search', [UserController::class, 'searchAdmin'])->name('admin.search');
