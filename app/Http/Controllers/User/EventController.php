<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Event;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
  public function events()
  {
    $events = Event::all();
    $settings = Setting::first();

    return view('user.events', ['events' => $events, 'settings' => $settings]);
  }

  public function showEvent(string $slug)
  {
    $event = Event::where('slug', $slug)->first();
    $settings = Setting::first();
    $allEvents = Event::all();
    return view(
      'user.show-event',
      [
        'thisEvent' => $event,
        'allEvents' => $allEvents,
        'settings' => $settings
      ]
    );
  }
}
