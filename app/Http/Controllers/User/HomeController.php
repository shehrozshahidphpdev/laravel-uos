<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Admin\Department;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index()
  {
    $departments = Department::all();
    return view(
      'user.index',
      ['departments' => $departments]
    );
  }
}