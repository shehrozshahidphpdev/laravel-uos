<?php

use App\Http\Controllers\Admin\AdministrationController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\User\NewsController as UserNews;
use App\Http\Controllers\User\EventController as UserEvents;
use App\Http\Controllers\User\AdministrationController as UserAdministration;

// USER SIDE ROUTES
Route::name('user.')->group(function () {
  Route::get('/', [HomeController::class, 'index'])
    ->name('home');
  Route::get('/contact', [HomeController::class, 'contact'])
    ->name('contact');
  Route::get('news/{slug}', [UserNews::class, 'showNews'])
    ->name('show-news');
  Route::get('news', [UserNews::class, 'news'])
    ->name('news');
  Route::get('events', [UserEvents::class, 'events'])
    ->name('events');
  Route::get('event/{slug}', [UserEvents::class, 'showEvent'])
    ->name('show-event');
  Route::get('introduction', [HomeController::class, 'introduction'])
    ->name('introduction');
  Route::get('chancellor-message', [HomeController::class, 'chancellorMessage'])
    ->name('chancellor-message');

  Route::get('vc-message', [HomeController::class, 'vcMessage'])
    ->name('vc-message');
  Route::get('chancellor-message', [HomeController::class, 'chancellorMessage'])
    ->name('chancellor-message');
  Route::get('uni-map', [HomeController::class, 'uniMap'])
    ->name('uni-map');
  Route::get('news-letter', [HomeController::class, 'newsLetter'])
    ->name('news-letter');

  //ATION USER SIDE
  Route::controller(UserAdministration::class)
    ->prefix('office/')
    ->group(function () {
      Route::get('vice-chancellor',  'viceChancellor')
        ->name('vice-chancellor');

      Route::get('registrar',  'registrar')
        ->name('registrar');


      Route::get('treasure',  'treasure')
        ->name('treasure');


      Route::get('controller-examination',  'controllerExamination')
        ->name('controller-examination');
    });
});
// Auth Routes
Route::prefix('admin/')
  ->controller(AuthController::class)
  ->name('auth.')
  ->middleware(['authenticated'])
  ->group(function () {
    Route::get('login',  'viewLogin')
      ->name('login')
      ->withoutMiddleware(['auth']);
    Route::get('register',  'viewRegister')
      ->name('register')
      ->withoutMiddleware(['auth']);
    Route::post('register',  'attemptRegister')
      ->name('attempt-register');
    Route::post('login',  'attemptLogin')
      ->name('attempt-login');
    Route::get('logout',  'logout')
      ->name('logout')->withoutMiddleware(['authenticated']);
  });
// tiny mce images upload route
Route::post('/tinymce-upload', [EditorController::class, 'upload'])
  ->name('tinymce.upload');

// Admin Dashboard Rouetes
Route::prefix('admin/')
  ->controller(AuthController::class)
  ->name('admin.')
  ->middleware(['isauthenticated'])
  ->group(function () {
    Route::view('', 'admin.index')
      ->name('dashboard');
    Route::get('profile',  'profile')
      ->name('profile');
    Route::get('getProfile',  'getProfile')
      ->name('getProfile');
    Route::post('profile',  'editProfile')
      ->name('edit-profile');



    // DEPARTMENT ROUTES
    Route::controller(DepartmentController::class)
      ->group(function () {
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
    Route::controller(NewsController::class)
      ->group(function () {
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

    // SETTINGS ROUTES
    Route::controller(SettingController::class)
      ->group(function () {
        Route::get('settings', 'index')
          ->name('settings');
        Route::get('settings/create', 'create')
          ->name('settings.create');
        Route::post('setting/store', 'store')
          ->name('settings.store');
        Route::delete('setting/delete/{id}', 'delete')
          ->name('setting.delete');
        Route::get('/setting/edit/{id}', 'edit')
          ->name('setting.edit');
        Route::put('setting/update/{id}', 'update')
          ->name('settings.update');
      });

    // EVENTS ROUTES
    Route::controller(EventController::class)
      ->group(function () {
        Route::get('events', 'index')
          ->name('events');
        Route::get('events/create', 'create')
          ->name('events.create');
        Route::post('event/store', 'store')
          ->name('events.store');
        Route::delete('event/delete/{id}', 'delete')
          ->name('event.delete');
        Route::get('/event/edit/{id}', 'edit')
          ->name('event.edit');
        Route::put('event/update/{id}', 'update')
          ->name('event.update');
      });

    // ADMINISTRATION ROUTES
    Route::controller(AdministrationController::class)
      ->group(function () {
        Route::get('administrations', 'index')
          ->name('administrations');
        Route::get('administration/create', 'create')
          ->name('administration.create');
        Route::post('administration/store', 'store')
          ->name('administrations.store');
        Route::delete('administration/delete/{id}', 'delete')
          ->name('administration.delete');
        Route::get('/administration/edit/{id}', 'edit')
          ->name('administration.edit');
        Route::put('administration/update/{id}', 'update')
          ->name('administration.update');
      });
  });