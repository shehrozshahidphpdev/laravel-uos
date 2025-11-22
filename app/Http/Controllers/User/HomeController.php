<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\News;
use App\Models\Admin\Event;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Models\Admin\Department;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {
    $settings = Setting::first();
    $departments = Department::all();
    $events = Event::all();
    $news = News::where('is_active', '=', 1)->get();
    return view(
      'user.index',
      [
        'departments' => $departments,
        'allNews' => $news,
        'settings' => $settings,
        'events' => $events
      ]
    );
  }

  public function contact()
  {
    $settings = Setting::first();
    return view(
      'user.contact',
      [
        'settings' => $settings,
      ]
    );
  }

  public function introduction()
  {
    $settings = Setting::first();
    return view(
      'user.introduction',
      [
        'settings' => $settings,
      ]
    );
  }

  public function chancellorMessage()
  {
    $settings = Setting::first();
    return view(
      'user.chancellor-message',
      [
        'settings' => $settings,
      ]
    );
  }

  public function vcMessage()
  {
    $settings = Setting::first();
    return view(
      'user.vice-chancellor-message',
      [
        'settings' => $settings,
      ]
    );
  }

  public function uniMap()
  {
    $settings = Setting::first();
    return view(
      'user.uni-map',
      [
        'settings' => $settings,
      ]
    );
  }

  public function newsLetter()
  {
    $settings = Setting::first();
    return view(
      'user.newsletter',
      [
        'settings' => $settings,
      ]
    );
  }
}