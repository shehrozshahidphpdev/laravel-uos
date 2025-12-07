<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProgramScheme;

class FacultyController extends Controller
{
  public $settings;

  /**
   * Class constructor.
   */
  public function __construct()
  {
    $this->settings = Setting::first();
  }

  public function computerScience()
  {
    $computerScienceScheme = ProgramScheme::with('program')
      ->whereHas('program', function ($q) {
        $q->where('program_name', 'Computer Science');
      })
      ->first();

    $informationTechnologyScheme = ProgramScheme::with('program')
      ->whereHas('program', function ($q) {
        $q->where('program_name', 'Information Technology');
      })
      ->first();

    // $programs = ProgramScheme::with('program')->get();
    // return $programs;

    return view('user.faculties.cs', [
      'settings' => $this->settings,
      'banner' => banner('cs'),
      'computerScienceScheme' => $computerScienceScheme,
      'informationTechnologyScheme' => $informationTechnologyScheme
    ]);
  }
}
