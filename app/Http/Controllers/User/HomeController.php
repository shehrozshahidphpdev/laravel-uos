<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\News;
use App\Models\Admin\Event;
use App\Models\Admin\Merit;
use App\Models\Admin\Banner;
use App\Models\Admin\Setting;
use App\Models\Admin\Download;
use App\Models\Admin\Department;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

  public $settings;
  public function __construct()
  {
    $this->settings = Setting::first();
  }
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
        'settings' => $this->settings,
        'events' => $events,
      ]
    );
  }

  public function contact()
  {
    $settings = Setting::first();
    return view(
      'user.contact',
      [
        'settings' => $this->settings,
        'banner' => banner('contact-us')
      ]
    );
  }

  public function introduction()
  {
    // dd(banner('introduction'));
    $settings = Setting::first();
    return view(
      'user.introduction',
      [
        'settings' => $this->settings,
        'banner' => banner('introduction')
      ]
    );
  }

  public function chancellorMessage()
  {
    // return banner('chancellor-message');

    return view(
      'user.chancellor-message',
      [
        'settings' => $this->settings,
        'banner' => banner('chancellor-message')
      ]
    );
  }

  public function vcMessage()
  {
    return view(
      'user.vice-chancellor',
      [
        'settings' => $this->settings,
        'banner' => banner('vice-chancellor-message')
      ]
    );
  }

  public function meritList()
  {
    $settings = Setting::first();
    $merits = Merit::all();
    // dd($merits);
    return view(
      'user.merit-list',
      [
        'settings' => $settings,
        'merits' => $merits,
        'banner' => banner('merit-list')
      ]
    );
  }

  public function uniMap()
  {
    return view(
      'user.uni-map',
      [
        'settings' => $this->settings,
        'banner' => banner('uni-map')

      ]
    );
  }

  public function newsLetter()
  {
    $settings = Setting::first();
    return view(
      'user.newsletter',
      [
        'settings' => $this->settings,
        'banner' => banner('newsletter')

      ]
    );
  }

  public function academics()
  {
    return view(
      'user.academics',
      [
        'settings' => $this->settings,
        'banner' => banner('academics')

      ]
    );
  }



  public function notifications()
  {
    $downloads = Download::where('page', 'notifications')->get();
    return view(
      'user.notifications',
      [
        'settings' => $this->settings,
        'banner' => banner('notifications'),
        'downloads' => $downloads
      ]
    );
  }

  public function dsaDownloads()
  {
    $downloads = Download::where('page', 'forms')->get();

    return view(
      'user.downloads.forms',
      [
        'settings' => $this->settings,
        'banner' => banner('downloads'),
        'downloads' => $downloads
      ]
    );
  }


  public function prospectus()
  {
    $downloads = Download::where('page', 'prospectus')->get();

    return view('user.prospectus', [
      'banner' => banner('prospectus'),
      'settings' => $this->settings,
      'downloads' => $downloads
    ]);
  }

  public function apply()
  {

    return view('user.how-to-apply', [
      'banner' => banner('how-to-apply'),
      'settings' => $this->settings,
    ]);
  }
}