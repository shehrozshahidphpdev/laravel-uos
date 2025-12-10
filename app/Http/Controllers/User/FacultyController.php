<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use App\Models\Admin\Department;
use App\Models\Admin\ProgramScheme;

class FacultyController extends Controller
{
  public $settings;

  public function __construct()
  {
    $this->settings = Setting::first();
  }

  public function departmentPage($slug)
  {
    // dd('here');

    $pages = Department::pluck('slug')->toArray();

    // return $pages;

    if (!in_array($slug, $pages)) {
      return view('404');
    }

    $allSchemes = ProgramScheme::with('program')
      ->whereHas('program', function ($q) use ($slug) {
        $q->where('subject', $slug);
      })
      ->get();
    /*
      💀view name must follow the slug
    */
    return view("user.faculties.$slug", [
      'settings'   => $this->settings,
      'banner'     => banner($slug),
      'allSchemes' => $allSchemes,
    ]);
  }
}