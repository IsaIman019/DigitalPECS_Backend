<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfileController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master-users', [UsersController::class, 'index'])->name('master-users');
Route::get('/master-users/create', [UsersController::class, 'create']);
Route::post('/master-users/store', [UsersController::class, 'store']);
Route::get('/master-users/{id}/edit', [UsersController::class, 'edit']);
Route::put('/master-users/{id}/update', [UsersController::class, 'update']);
Route::delete('/master-users/{id}/delete', [UsersController::class, 'destroy']);

Route::get('/master-anak', [AnakController::class, 'index'])->name('master-anak');
Route::get('/master-guru', [GuruController::class, 'index'])->name('master-guru');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

