<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AnakController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\ModuleItemController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // ROUTE ROLE Anak
    
    
    // ROUTE ROLE Guru
    Route::get('/list-siswa', [AnakController::class, 'listSiswa']);
    Route::post('/store-modules', [ModuleController::class, 'store']);
    Route::delete('/delete-modules/{id}', [ModuleController::class, 'destroy']);

    // ROUTE ROLE Orang Tua
    Route::get('/list-anak', [AnakController::class, 'listAnak']);

    // ROUTE ROLE GABUNGAN
    Route::post('/tambah-anak', [AnakController::class, 'store']);
    Route::get('/list-orangtua', [AnakController::class, 'listOrangTua']);
    Route::get('/detail-anak/{id}', [AnakController::class, 'detail']);
    Route::delete('/delete-anak/{id}', [AnakController::class, 'destroy']);
    Route::get('/list-modules', [ModuleController::class, 'index']);
    Route::get('/modules/{module}/items', [ModuleItemController::class, 'index']);
    Route::post('/module-items', [ModuleItemController::class, 'store']);
    Route::put('/module-items/{id}', [ModuleItemController::class, 'update']);
    Route::delete('/module-items/{id}', [ModuleItemController::class, 'destroy']);
        


});