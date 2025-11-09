<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DepartmentController;

// USER SIDE ROUTES
Route::get('/', [HomeController::class, 'index'])
  ->name('home');



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
  Route::get('departments', [DepartmentController::class, 'index'])
    ->name('departments');
  Route::get('depratment/create', [DepartmentController::class, 'create'])
    ->name('departments.create');
  Route::post('department/store', [DepartmentController::class, 'store'])
    ->name('departments.store');
  Route::delete('department/delete/{id}', [DepartmentController::class, 'delete'])
    ->name('department.delete');

  Route::get('department/edit/{id}', [DepartmentController::class, 'edit'])
    ->name('department.edit');

  Route::put('department/update/{id}', [DepartmentController::class, 'update'])
    ->name('department.update');
});