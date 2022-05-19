<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DimensiController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\PenggunaController;


// halaman utama
Route::get('/', [KuesionerController::class, 'homepage'])->middleware('auth');

// router dimensi
Route::get('/login', [PenggunaController::class, 'LoginView'])->name('login')->middleware('guest');
Route::post('/auth', [PenggunaController::class, 'authenticate']);
Route::get('/dimensi', [DimensiController::class, 'index'])->middleware('auth');
Route::post('/dimensi', [DimensiController::class, 'create']);
Route::delete('/dimensi/{dimensi:id}', [DimensiController::class, 'destroy']);
Route::get('/dimensi/{dimensi:id}/edit', [DimensiController::class, 'edit'])->middleware('auth');
Route::put('/dimensi/update', [DimensiController::class, 'update']);

// router kuesioner
Route::get('/kuesioner', [KuesionerController::class, 'index'])->middleware('auth');
Route::delete('/kuesioner/{kuesioner:id}', [KuesionerController::class, 'destroy']);
Route::get('/kuesioner/{kuesioner:id}/edit', [KuesionerController::class, 'edit'])->middleware('auth');
Route::put('/kuesioner/update', [KuesionerController::class, 'update']);
Route::post('/kuesioner', [KuesionerController::class, 'create']);

// router pengguna
Route::get('/pengguna', [PenggunaController::class, 'index'])->middleware('auth');
Route::post('/pengguna', [PenggunaController::class, 'create']);
Route::delete('/pengguna/{pengguna:id}', [PenggunaController::class, 'destroy']);
Route::get('/pengguna/{pengguna:id}/edit', [PenggunaController::class, 'edit'])->middleware('auth');
Route::put('/pengguna/update', [PenggunaController::class, 'update']);
Route::get('/pengguna/logout', [PenggunaController::class, 'logout']);

// router jawab kuesioner
Route::get('/jawaban', [KuesionerController::class, 'index2'])->middleware('auth');



