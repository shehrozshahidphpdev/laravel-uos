<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('user.index');
});


// Auth Routes
Route::prefix('admin/')->name('auth.')->group(function () {
  Route::get('login', [AuthController::class, 'viewLogin'])
    ->name('login')
    ->withoutMiddleware(['auth']);
  Route::get('register', [AuthController::class, 'viewRegister'])
    ->name('register')
    ->withoutMiddleware(['auth']);
  Route::post('register', [AuthController::class, 'attemptRegister'])
    ->name('attempt-register');
  Route::post('login', [AuthController::class, 'attemptLogin'])
    ->name('attempt-login');
  Route::get('logout', [AuthController::class, 'logout'])
    ->name('logout');
});

// Admin Dashboard Rouetes
Route::prefix('admin/')->name('admin.')->group(function () {
  Route::view('', 'admin.index')
    ->name('dashboard');
  Route::get('profile', [AuthController::class, 'profile'])
    ->name('profile');
  Route::get('getProfile', [AuthController::class, 'getProfile'])
    ->name('getProfile');
  Route::post('profile', [AuthController::class, 'editProfile'])
    ->name('edit-profile');
});