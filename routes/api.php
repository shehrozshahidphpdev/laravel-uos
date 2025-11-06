<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// Route::post('login', [AuthController::class, 'login'])
//   ->name('api.auth.login');
// Route::post('register', [AuthController::class, 'register'])
//   ->name('api.auth.register'); // optional

// Route::middleware('auth:api')->group(function () {
//   Route::get('me', [AuthController::class, 'me']);
//   // ->name('');
//   Route::post('logout', [AuthController::class, 'logout'])
//     ->name('api.user.logout');
//   Route::post('refresh', [AuthController::class, 'refresh']);
// });