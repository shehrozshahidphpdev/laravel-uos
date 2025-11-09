<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\News;
use Illuminate\Http\Request;
use App\Models\Admin\Department;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {
    $departments = Department::all();
    $news = News::where('is_active', '=', 1)->get();
    return view(
      'user.index',
      [
        'departments' => $departments,
        'allNews' => $news
      ]
    );
  }
}