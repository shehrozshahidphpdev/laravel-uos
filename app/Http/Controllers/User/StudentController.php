<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use App\Models\Admin\Download;

class StudentController extends Controller
{
  public $settings;

  public function __construct()
  {
    $this->settings = Setting::first();
  }

  public function scholarships()
  {

    return view('user.students.scholarships', [
      'settings' => $this->settings,
      'banner' => banner('scholarship')
    ]);
  }

  public function timeTable()
  {
    $timeTables = Download::where('page', 'time-table')->get();

    return view('user.students.time-table', [
      'settings' => $this->settings,
      'banner' => banner('time-table'),
      'timeTables' => $timeTables
    ]);
  }

  public function transport()
  {
    $files = Download::where('page', 'transport')->get();

    return view('user.students.transportation', [
      'settings' => $this->settings,
      'banner' => banner('transport'),
      'files' => $files
    ]);
  }

  public function library()
  {
    return view('user.students.library', [
      'settings' => $this->settings,
      'banner' => banner('library')
    ]);
  }

  public function hostel()
  {
    return view('user.students.hostel', [
      'settings' => $this->settings,
      'banner' => banner('hostel')
    ]);
  }

  public function sports()
  {
    return view('user.students.sports', [
      'settings' => $this->settings,
      'banner' => banner('sports')
    ]);
  }

  public function plan9()
  {
    return view('user.students.plan9', [
      'settings' => $this->settings,
      'banner' => banner('plan9')
    ]);
  }

  public function courseera()
  {
    return view('user.students.courseera', [
      'settings' => $this->settings,
      'banner' => banner('courseera')
    ]);
  }
}