<?php

use App\Models\Admin\Banner;
use App\Models\Admin\Profile;

if (!function_exists('banner')) {
  function banner(string  $page): object
  {
    return Banner::where('slug', $page)->first();
  }
}

if (!function_exists('profile')) {
  function profile(string  $page): object
  {
    return Profile::where('page', $page)->get();
  }
}