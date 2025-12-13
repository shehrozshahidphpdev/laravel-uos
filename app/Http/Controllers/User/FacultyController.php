<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use App\Models\Admin\Department;
use App\Models\Admin\FacultyProfile;
use App\Models\Admin\ProgramScheme;
use App\Models\Admin\ResearchPublication;

class FacultyController extends Controller
{
  public $settings;

  public function __construct()
  {
    $this->settings = Setting::first();
  }

  public function departmentPage($slug)
  {
    $pages = Department::pluck('slug')->toArray();
    if (!in_array($slug, $pages)) {
      // dd('here');
      return view('404');
    }

    $allSchemes = ProgramScheme::with('program')
      ->whereHas('program', function ($q) use ($slug) {
        $q->where('subject', $slug);
      })
      ->get();

    // return $allSchemes;


    /*
      💀view name must follow the slug
    */
    return view("user.faculties.$slug", [
      'settings'   => $this->settings,
      'banner'     => banner($slug),
      'allSchemes' => $allSchemes,
      'slug' => $slug
    ]);
  }

  public function chairmanPage(string $slug)
  {
    $pages = Department::pluck('slug')->toArray();
    // return $pages;

    if (!in_array($slug, $pages)) {
      return view('404');
    }


    $profile = FacultyProfile::with('department')
      ->whereHas('department', function ($q) use ($slug) {
        $q->where('slug', $slug);
      })->where('category', 'chairman')
      ->firstOrFail();


    $publications = ResearchPublication::with('department')
      ->whereHas('department', function ($q) use ($slug) {
        $q->where('slug', $slug);
      })
      ->get();

    /*
      💀view name must follow the slug
    */
    return view("user.depart-hod.$slug", [
      'settings'   => $this->settings,
      'banner'     => banner($slug),
      'profile' => $profile,
      'publications' => $publications,
      'slug' => $slug
    ]);
  }

  public function FeeStructure($slug)
  {
    $pages = Department::pluck('slug')->toArray();
    // return $pages;

    if (!in_array($slug, $pages)) {
      return view('404');
    }


    $feeStructures = ProgramScheme::with('program')
      ->whereHas('program', function ($q) use ($slug) {
        $q->where('subject', $slug)
          ->where('category', 'fee-structure');
      })
      ->get();

    // return $feeStructures;
    /*
      💀view name must follow the slug
    */
    return view("user.depart-fee.$slug", [
      'settings'   => $this->settings,
      'banner'     => banner($slug),
      'feeStructures' => $feeStructures,
      'slug' => $slug
    ]);
  }

  public function departmentFaculty($slug)
  {
    $pages = Department::pluck('slug')->toArray();
    // return $pages;

    if (!in_array($slug, $pages)) {
      return view('404');
    }

    $profiles = FacultyProfile::with('department')
      ->whereHas('department', function ($q) use ($slug) {
        $q->where('slug', $slug);
      })->where('category', 'faculty')
      ->get();

    // return $profiles;



    return view("user.depart-faculty.$slug", [
      'settings' => $this->settings,
      'banner' => banner('faculty-cs'),
      'profiles' => $profiles,
      'slug' => $slug
    ]);
  }

  public function showFaculty(string $slug, string $id)
  {
    // dd('here');

    $pages = Department::pluck('slug')->toArray();
    // return $pages;

    if (!in_array($slug, $pages)) {
      return view('404');
    }

    $profile = FacultyProfile::with('department')
      ->whereHas('department', function ($q) use ($slug) {
        $q->where('slug', $slug);
      })->where('category', 'faculty')
      ->where('id', $id)
      ->firstOrFail();

    // return $profile;


    return view("user.show-faculty.$slug", [
      'settings' => $this->settings,
      'banner' => banner('faculty-cs'),
      'profile' => $profile,
      'slug' => $slug
    ]);
  }
}