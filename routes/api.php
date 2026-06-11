<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AnakController;
use App\Http\Controllers\Api\ModuleController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // ROUTE ROLE Anak
    Route::get('/modules', [ModuleController::class, 'index']);
    
    // ROUTE ROLE Guru
    Route::get('/list-siswa', [AnakController::class, 'listSiswa']);
    Route::post('/modules', [ModuleController::class, 'store']);

    // ROUTE ROLE Orang Tua
    Route::get('/list-anak', [AnakController::class, 'listAnak']);

    // ROUTE ROLE GABUNGAN
    Route::post('/tambah-anak', [AnakController::class, 'store']);
    Route::get('/list-orangtua', [AnakController::class, 'listOrangTua']);
    Route::get('/detail-anak/{id}', [AnakController::class, 'detail']);
    Route::delete('/delete-anak/{id}', [AnakController::class, 'destroy']);

});