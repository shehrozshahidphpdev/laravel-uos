<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Models\Admin\OricTeam;
use App\Http\Controllers\Controller;

class DirectorateController extends Controller
{
  protected $settings;
  public function __construct()
  {
    $this->settings = Setting::first();
  }

  public function academics()
  {
    return view('user.directorates.academics', [
      'settings' => $this->settings,
      'banner' => banner('director-academics'),
      'directorates' => profile('academics')
    ]);
  }

  public function estateManagement()
  {
    return view('user.directorates.estate-management', [
      'settings' => $this->settings,
      'banner' => banner('director-estate-management'),
      'directorates' => profile('estate-management')
    ]);
  }

  public function graduateStudies()
  {
    return view('user.directorates.graduate-studies', [
      'settings' => $this->settings,
      'banner' => banner('director-graduate-studies'),
      'directorates' => profile('graduate-studies')
    ]);
  }
  public function it()
  {
    return view('user.directorates.information-technology', [
      'settings' => $this->settings,
      'banner' => banner('director-it'),
      'directorates' => profile('information-technology')
    ]);
  }
  public function oric()
  {
    return view('user.directorates.oric', [
      'settings' => $this->settings,
      'banner' => banner('director-oric'),
      'directorates' => profile('oric')
    ]);
  }

  public function planningDevelopment()
  {
    return view('user.directorates.planing-development', [
      'settings' => $this->settings,
      'banner' => banner('director-planning-development'),
      'directorates' => profile('planning-development')
    ]);
  }

  public function projectDirector()
  {
    return view('user.directorates.project-director', [
      'settings' => $this->settings,
      'banner' => banner('director-project'),
      'directorates' => profile('project-director')
    ]);
  }

  public function qec()
  {
    return view('user.directorates.qec', [
      'settings' => $this->settings,
      'banner' => banner('director-qec'),
      'directorates' => profile('qec')
    ]);
  }

  public function residentOfficer()
  {
    return view('user.directorates.resident-officer', [
      'settings' => $this->settings,
      'banner' => banner('director-ro'),
      'directorates' => profile('resident-officer')
    ]);
  }

  public function studentAffair()
  {
    return view('user.directorates.student-affairs', [
      'settings' => $this->settings,
      'banner' => banner('director-dsa'),
      'directorates' => profile('student-affairs')
    ]);
  }
  public function sports()
  {
    return view('user.directorates.sports', [
      'settings' => $this->settings,
      'banner' => banner('director-sports'),
      'directorates' => profile('sports')
    ]);
  }
  public function sustainability()
  {
    return view('user.directorates.sustainability', [
      'settings' => $this->settings,
      'banner' => banner('director-sustainability'),
      'directorates' => profile('sustainability')
    ]);
  }
}