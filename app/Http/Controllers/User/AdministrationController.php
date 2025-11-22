<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use App\Models\Admin\Administration;

class AdministrationController extends Controller
{
  public function viceChancellor()
  {
    $settings = Setting::first();
    $administration = Administration::where('page', 'vice-chancellor-office')->get();
    return view('user.administration.vice-chancellor', [
      'settings' => $settings,
      'administrations' => $administration
    ]);
  }

  public function registrar()
  {
    $settings = Setting::first();
    $administration = Administration::where('page', 'registrar-office')->get();
    return view('user.administration.registrar', [
      'settings' => $settings,
      'administrations' => $administration
    ]);
  }

  public function treasure()
  {
    $settings = Setting::first();
    $administrations = Administration::where('page', 'treasure-office')->get();
    return view(
      'user.administration.treasure',
      [
        'settings' => $settings,
        'administrations' => $administrations
      ]
    );
  }

  public function controllerExamination()
  {
    $settings = Setting::first();
    $administrations = Administration::where('page', 'controller-examination')->get();
    return view(
      'user.administration.controller-examination',
      [
        'settings' => $settings,
        'administrations' => $administrations
      ]
    );
  }
}