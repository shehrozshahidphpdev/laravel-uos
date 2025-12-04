<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\News;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
  public $settings;

  public function __construct()
  {
    $this->settings = Setting::first();
  }
  public function news()
  {
    $allNews = News::all();
    $settings = Setting::first();
    return view(
      'user.news',
      [
        'settings' => $this->settings,
        'allNews' => $allNews,
        'banner' => banner('news')
      ]
    );
  }
  public function showNews(Request $request, string $slug)
  {
    $allnews = News::all();
    $thisNews = News::where('slug', '=', $request->slug)->first();
    // dd($thisNews);
    $settings = Setting::first();
    return view(
      'user.show-news',
      [
        'allnews' => $allnews,
        'thisNews' => $thisNews,
        'settings' => $this->settings
      ]
    );
  }
}
