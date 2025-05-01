<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
// Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum')->name('user');

// Route::middleware('auth:sanctum')->group(function () {
//     // Ici, toutes les routes nécessitant une authentification via Sanctum
//     // seront protégées.
// });