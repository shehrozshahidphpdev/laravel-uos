<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class EditorController extends Controller
{

  // App\Http\Controllers\Admin\EditorController.php
  public function upload(Request $request)
  {
    try {
      $request->validate([
        'file' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:8048'
      ]);

      $file = $request->file('file');
      $filename = time() . '_' . $file->getClientOriginalName();
      $path = $file->storeAs('admin/uploads/tinymce', $filename, 'public');

      return response()->json([
        'location' => asset('storage/' . $path)
      ]);
    } catch (\Exception $e) {
      Log::error('TinyMCE Upload Failed: ' . $e->getMessage());
      return response()->json([
        'error' => 'Upload failed'
      ], 500);
    }
  }
}