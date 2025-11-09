<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
  public function index()
  {
    $news = News::where('is_active',  '=', 1)
      ->get();
    // dd($news);

    return view(
      'admin.news.list',
      ['allNews' => $news]
    );
  }

  public function create()
  {
    return view(
      'admin.news.create'
    );
  }

  public function store(Request $request)
  {
    $request['slug'] = Str::slug($request->title);
    // dd($request->all());

    $validations = $request->validate([
      'title' => 'required|min:5',
      'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048',
      'description' => 'required|min:5|max:255',
      'slug' => 'required|unique:news,slug'
    ]);

    try {
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' .  $image->getClientOriginalName();
        $destination = "admin/uploads/";
        // Store the file with your custom name:
        $image->storeAs($destination, $imageName, 'public');
      }

      News::create([
        'title' => $request->title,
        'image' => $imageName ?? null,
        'description' => $request->description,
        'additional_info' => $request->additional_info,
        'created_by' => Auth::user()->id,
        'slug' => Str::slug($request->title)
      ]);

      return to_route('admin.news')
        ->with('message', 'News Created Successfully!');
    } catch (\Exception $e) {
      Log::error("Entry Failed " . $e->getMessage());
      return redirect()->back()
        ->with('message', "Something, went wrong Please Try Again Later");
    }
  }
  public function edit() {}
  public function update() {}
  public function delete(Request $request)
  {
    $department = News::findOrFail($request->id);

    try {
      $department->delete();
      return response()->json([
        'message' => 'News Deleted Successfully!',
      ], 200);
    } catch (\Exception $e) {
      Log::error("Failed To Delete" . $e->getMessage());
      return response()->json([]);
    }
  }
}