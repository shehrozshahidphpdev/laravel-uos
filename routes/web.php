<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\NewsController;

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

  // DEPARTMENT ROUTES
  Route::controller(DepartmentController::class)->group(function () {
    Route::get('departments',  'index')
      ->name('departments');
    Route::get('depratment/create',  'create')
      ->name('departments.create');
    Route::post('department/store',  'store')
      ->name('departments.store');
    Route::delete('department/delete/{id}',  'delete')
      ->name('department.delete');

    Route::get('department/edit/{id}',  'edit')
      ->name('department.edit');

    Route::put('department/update/{id}',  'update')
      ->name('department.update');
  });


  // NEWS ROUTES
  Route::controller(NewsController::class)->group(function () {
    Route::get('news',  'index')
      ->name('news');
    Route::get('news/create',  'create')
      ->name('news.create');
    Route::post('news/store',  'store')
      ->name('news.store');
    Route::delete('news/delete/{id}',  'delete')
      ->name('news.delete');

    Route::get('news/edit/{id}',  'edit')
      ->name('news.edit');

    Route::put('news/update/{id}',  'update')
      ->name('news.update');
  });
});