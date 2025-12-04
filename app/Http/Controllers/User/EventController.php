<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Event;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
  public $settings;

  public function __construct()
  {
    $this->settings = Setting::first();
  }

  public function events()
  {
    $events = Event::all();

    return view('user.events', [
      'events' => $events,
      'settings' => $this->settings,
      'banner' => banner('events')
    ]);
  }

  public function showEvent(string $slug)
  {
    $event = Event::where('slug', $slug)->first();
    $allEvents = Event::all();
    return view(
      'user.show-event',
      [
        'thisEvent' => $event,
        'allEvents' => $allEvents,
        'settings' => $this->settings
      ]
    );
  }
}
