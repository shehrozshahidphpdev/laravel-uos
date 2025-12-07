<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OricTeam;
use App\Http\Controllers\User\QecController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OricController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MeritController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\User\FacultyController;
use App\Http\Controllers\User\StudentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\OricTeamController;
use App\Http\Controllers\Admin\TableRowController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TableColumnController;
use App\Http\Controllers\Admin\OricPublicationController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SosController;
use App\Http\Controllers\User\NewsController as UserNews;
use App\Http\Controllers\User\EventController as UserEvents;
use App\Http\Controllers\User\AdministrationController as UserAdministration;
use App\Http\Controllers\User\DirectorateController as UserDirectorateController;

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
  Route::get('newsletter', [HomeController::class, 'newsLetter'])
    ->name('news-letter');
  Route::get('merit-list', [HomeController::class, 'meritList'])
    ->name('merit-list');

  Route::get('notifications', [HomeController::class, 'notifications'])
    ->name('notifications');

  Route::get('academics', [HomeController::class, 'academics'])
    ->name('academics');

  Route::get('qec', [QecController::class, 'qec'])
    ->name('qec');

  Route::get('qec-team', [QecController::class, 'qecTeam'])
    ->name('qecteam');


  Route::get('dsa-downloads', [HomeController::class, 'dsaDownloads'])
    ->name('dsa-downloads');
  Route::get('notifications', [HomeController::class, 'notifications'])
    ->name('notifications');


  Route::get('prospectus', [HomeController::class, 'prospectus'])
    ->name('prospectus');


  Route::get('how-to-apply', [HomeController::class, 'apply'])
    ->name('apply');

  // students module
  Route::controller(StudentController::class)->group(function () {
    Route::get('dsa-scholarship',  'scholarships')
      ->name('scholarships');
    Route::get('time-table',  'timeTable')
      ->name('time-table');
    Route::get('library',  'library')
      ->name('library');
    Route::get('transport',  'transport')
      ->name('transport');
    Route::get('hostel',  'hostel')
      ->name('hostel');
    Route::get('sports',  'sports')
      ->name('sports');
    Route::get('plan9',  'plan9')
      ->name('plan9');
    Route::get('DlseiCoursera',  'courseera')
      ->name('courseera');
  });



  // faculty module
  Route::controller(FacultyController::class)
    ->prefix('depart/')
    ->name('department.')
    ->group(function () {
      Route::get('computer-science',  'computerScience')
        ->name('computer-science');
      Route::get('time-table',  'timeTable')
        ->name('time-table');
      Route::get('library',  'library')
        ->name('library');
      Route::get('transport',  'transport')
        ->name('transport');
      Route::get('hostel',  'hostel')
        ->name('hostel');
      Route::get('sports',  'sports')
        ->name('sports');
      Route::get('plan9',  'plan9')
        ->name('plan9');
      Route::get('DlseiCoursera',  'courseera')
        ->name('courseera');
    });



  Route::controller(OricController::class)->group(function () {
    Route::get('oric',  'oric')
      ->name('oric');
    Route::get('oric-team',  'oricTeam')
      ->name('oric-team');
    Route::get('oric-partner',  'oricPartner')
      ->name('oric-partner');
    Route::get('oric-publications',  'oricPublications')
      ->name('oric-publications');

    Route::get('/oric-publication-summary',  'oricPublicationsSummary')
      ->name('/oric-publication-summary');
  });

  //administration USER SIDE
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

  //USER SIDE  DIRECTORATES MODULE ROUTES
  Route::controller(UserDirectorateController::class)
    ->prefix('directorate/')
    ->group(function () {
      Route::get('/director-academics', 'academics')
        ->name('director.academics');

      Route::get('/estate-management', 'estateManagement')
        ->name('director.estate-management');
      Route::get('/graduate-studies', 'graduateStudies')
        ->name('graduate-studies');
      Route::get('/director-it', 'it')
        ->name('information-technology');
      Route::get('/oric', 'oric')
        ->name('director.oric');
      Route::get('/director-planning-development', 'planningDevelopment')
        ->name('planning-development');

      Route::get('/director/project-director', 'projectDirector')
        ->name('project-director');

      Route::get('/directorate/qec', 'qec')
        ->name('qec');


      Route::get('/directorate/resident-officer', 'residentOfficer')
        ->name('resident-officer');


      Route::get('/directorate/student-affair', 'studentAffair')
        ->name('student-affair');

      Route::get('/directorate/sports', 'sports')
        ->name('sports');

      Route::get('/directorate/sustainability', 'sustainability')
        ->name('sustainability');
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

    // ADMINISTRATION ROUTES + DIRECTORATE ROUTES
    Route::controller(ProfileController::class)
      ->group(function () {
        Route::get('administrations', 'administrations')
          ->name('administrations');
        Route::get('directorates', 'directorates')
          ->name('directorates');
        Route::get('administration/create', 'administrationCreate')
          ->name('administration.create');
        Route::get('directorates/create', 'directorateCreate')
          ->name('directorates.create');
        Route::post('profile/store', 'store')
          ->name('profile.store');
        Route::delete('administration/delete/{id}', 'delete')
          ->name('administration.delete');
        Route::delete('directorate/delete/{id}', 'delete')
          ->name('directorate.delete');
        Route::get('/administration/edit/{id}', 'editAdministration')
          ->name('administration.edit');
        Route::get('/directorate/edit/{id}', 'editDirectorate')
          ->name('directorate.edit');
        Route::put('administration/update/{id}', 'update')
          ->name('administration.update');
        Route::put('directorate/update/{id}', 'update')
          ->name('directorate.update');
      });

    // MERITS ROUTES
    Route::controller(MeritController::class)
      ->group(function () {
        Route::get('merits', 'index')
          ->name('merits');
        Route::get('merit/create', 'create')
          ->name('merit.create');
        Route::post('merit/store', 'store')
          ->name('merit.store');
        Route::delete('merit/delete/{id}', 'delete')
          ->name('merit.delete');
        Route::get('/merit/edit/{id}', 'edit')
          ->name('merit.edit');
        Route::put('merit/update/{id}', 'update')
          ->name('merit.update');
      });


    // BANNERS ROUTES
    Route::controller(BannerController::class)
      ->group(function () {
        Route::get('banners', 'index')
          ->name('banners');
        Route::get('banner/create', 'create')
          ->name('banner.create');
        Route::post('banner/store', 'store')
          ->name('banner.store');
        Route::delete('banner/delete/{id}', 'delete')
          ->name('banner.delete');
        Route::get('/banner/edit/{id}', 'edit')
          ->name('banner.edit');
        Route::put('banner/update/{id}', 'update')
          ->name('banner.update');
      });


    // ORIC TEAMS ROUTES
    Route::controller(OricTeamController::class)
      ->group(function () {
        Route::get('oric-team', 'index')
          ->name('oric-team');
        Route::get('oric-team/create', 'create')
          ->name('oric-team.create');
        Route::post('oric-team/store', 'store')
          ->name('oric-team.store');
        Route::delete('oric-team/delete/{id}', 'delete')
          ->name('oric-team.delete');
        Route::get('oric-team/edit/{id}', 'edit')
          ->name('oric-team.edit');
        Route::put('oric-team/update/{id}', 'update')
          ->name('oric-team.update');
      });


    // ORIC PUBLICATIONS  ROUTES
    Route::controller(OricPublicationController::class)
      ->group(function () {
        Route::get('oric-publication', 'index')
          ->name('oric-publication');
        Route::get('oric-publication/create', 'create')
          ->name('oric-publication.create');
        Route::post('oric-publication/store', 'store')
          ->name('oric-publication.store');
        Route::delete('oric-publication/delete/{id}', 'delete')
          ->name('oric-publication.delete');
        Route::get('oric-publication/edit/{id}', 'edit')
          ->name('oric-publication.edit');
        Route::put('oric-publication/update/{id}', 'update')
          ->name('oric-publication.update');
      });


    // TABLES ROUTES
    Route::controller(TableController::class)
      ->prefix('tables/')
      ->name('tables.')
      ->group(function () {
        Route::get('/', 'index')
          ->name('index');
        Route::get('create', 'create')
          ->name('create');
        Route::post('store', 'store')
          ->name('store');
        Route::delete('delete/{id}', 'delete')
          ->name('delete');
        Route::get('edit/{id}', 'edit')
          ->name('edit');
        Route::put('update/{id}', 'update')
          ->name('update');
      });

    // TABLES columns  ROUTES
    Route::controller(TableColumnController::class)
      ->prefix('tables-columns/')
      ->name('tables-columns.')
      ->group(function () {
        Route::get('/', 'index')
          ->name('index');
        Route::get('create', 'create')
          ->name('create');
        Route::post('store', 'store')
          ->name('store');
        Route::delete('delete/{id}', 'delete')
          ->name('delete');
        Route::get('edit/{id}', 'edit')
          ->name('edit');
        Route::put('update/{id}', 'update')
          ->name('update');
      });

    // TABLES rows  ROUTES
    Route::controller(TableRowController::class)
      ->prefix('tables-rows/')
      ->name('tables-rows.')
      ->group(function () {
        Route::get('/{id}', 'index')
          ->name('index');
        Route::get('create/{id}', 'create')
          ->name('create');
        Route::post('store', 'store')
          ->name('store');
        Route::delete('delete/{id}', 'delete')
          ->name('delete');
        Route::get('edit/{id}', 'edit')
          ->name('edit');
        Route::put('update/{id}', 'update')
          ->name('update');
      });

    Route::resource('downloads', DownloadController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('sos', SosController::class);
  });