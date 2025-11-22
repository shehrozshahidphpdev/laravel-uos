<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
  public function index()
  {
    $news = News::where('is_active',  '=', 1)
      ->get();
    $breadcrumbs = [
      [
        'label' => 'News'
      ]
    ];
    // dd($news);

    return view(
      'admin.news.list',
      ['allNews' => $news, 'breadcrumbs' => $breadcrumbs]
    );
  }

  public function create()
  {
    $breadcrumbs = [];
    $breadcrumbs = [
      [
        'label' => 'News',
        'url' => route('admin.news')
      ],
      [
        'label' => 'Create'
      ]
    ];
    return view(
      'admin.news.create',
      ['breadCrumbs' => $breadcrumbs]
    );
  }

  public function store(Request $request)
  {
    // Auto-create slug
    $request->merge([
      'slug' => Str::slug($request->title)
    ]);

    $request->validate([
      'title' => 'required|min:5',
      'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048',
      'slug' => 'required|unique:news,slug',
      // no images.* validation required when using tinymce-upload
    ]);

    try {
      $imageName = null;
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('admin/uploads', $imageName, 'public');
      }

      // description already contains <img src="..."> with public URLs
      $description = $request->description ?? '';

      News::create([
        'title' => $request->title,
        'image' => $imageName,
        'description' => $description,
        'created_by' => Auth::id(),
        'slug' => $request->slug
      ]);

      return redirect()
        ->route('admin.news')
        ->with('message', 'News Created Successfully!');
    } catch (\Exception $e) {
      Log::error("Entry Failed: " . $e->getMessage());
      return back()->with('message', "Something went wrong. Please try again.");
    }
  }


  public function edit(string $id)
  {
    $breadcrumbs = [];
    $breadcrumbs = [
      [
        'label' => 'News',
        'url' => route('admin.news')
      ],
      [
        'label' => 'Edit'
      ]
    ];
    $news = News::where('id', $id)->first();
    return view(
      'admin.news.edit',
      compact('news'),
      ['breadCrumbs' => $breadcrumbs]
    );
  }
  public function update(Request $request, string $id)
  {
    // Auto-create slug
    $request->merge([
      'slug' => Str::slug($request->title)
    ]);

    $request->validate([
      'title' => 'required|min:5',
      'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048',
      'slug' => 'required|unique:news,slug,' . $id,

      // no images.* validation required when using tinymce-upload
    ]);

    try {
      $imageName = null;

      $news = News::findOrFail($id);
      $imageName =  $news->image;

      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('admin/uploads', $imageName, 'public');
        $oldFile = storage_path('app/public/admin/uploads/' . $news->image);
        if (file_exists($oldFile)) {
          @unlink($oldFile);
        }
      }

      // description already contains <img src="..."> with public URLs
      $description = $request->description ?? '';

      News::where('id', $id)->update([
        'title' => $request->title,
        'image' => $imageName,
        'description' => $description,
        'created_by' => Auth::id(),
        'slug' => $request->slug
      ]);

      return redirect()
        ->route('admin.news')
        ->with('message', 'News Updated Successfully!');
    } catch (\Exception $e) {
      Log::error("Entry Failed: " . $e->getMessage());
      return back()->with('message', "Something went wrong. Please try again.");
    }
  }
  public function delete(Request $request)
  {
    $news = News::findOrFail($request->id);

    try {
      $file = Storage_path('app/public/admin/uploads/' . $news->image);
      if (file_exists($file)) {
        @unlink($file);
      }
      $news->delete();
      return response()->json([
        'message' => 'Record Deleted Successfully!',
      ], 200);
    } catch (\Exception $e) {
      Log::error("Failed To Delete" . $e->getMessage());
      return response()->json([]);
    }
  }
}