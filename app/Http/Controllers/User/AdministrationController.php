<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Admin\Profile;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use App\Models\Admin\Administration;

class AdministrationController extends Controller
{
  public function viceChancellor()
  {
    $settings = Setting::first();
    $administration = Profile::where('page', 'vice-chancellor-office')->get();
    return view('user.administration.vice-chancellor', [
      'settings' => $settings,
      'administrations' => $administration,
      'banner' => banner('vc-office')
    ]);
  }

  public function registrar()
  {
    $settings = Setting::first();
    $administration = Profile::where('page', 'registrar-office')->get();
    return view('user.administration.registrar', [
      'settings' => $settings,
      'administrations' => $administration,
      'banner' => banner('registrar-office')

    ]);
  }

  public function treasure()
  {
    $settings = Setting::first();
    $administrations = Profile::where('page', 'treasure-office')->get();
    return view(
      'user.administration.treasure',
      [
        'settings' => $settings,
        'administrations' => $administrations,
        'banner' => banner('treasure-office')
      ]
    );
  }

  public function controllerExamination()
  {
    $settings = Setting::first();
    $administrations = Profile::where('page', 'controller-examination')->get();
    return view(
      'user.administration.controller-examination',
      [
        'settings' => $settings,
        'administrations' => $administrations,
        'banner' => banner('controller-examination')
      ]
    );
  }
}
