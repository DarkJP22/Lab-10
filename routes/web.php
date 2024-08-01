<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Rutas de tareas
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('auth')->name('tasks.create');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth')->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->middleware('auth')->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->middleware('auth')->name('tasks.update');
Route::delete('/tasks/{task}/delete', [TaskController::class, 'destroy'])->middleware('auth')->name('tasks.destroy');
Route::put('/tasks/{task}/complete', [TaskController::class, 'complete'])->middleware('auth')->name('tasks.complete');

// Rutas de autenticación
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');
Route::get('register', [RegisteredUserController::class, 'index'])->name('register');
Route::post('post-registration', [RegisteredUserController::class, 'postRegistration'])->name('register.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
