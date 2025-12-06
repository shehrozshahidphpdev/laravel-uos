<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
  public function index()
  {
    $banners = Banner::all();
    $breadCrumbs = [
      [
        'label' => 'Banners',
      ]
    ];
    return view('admin.banners.list', compact('breadCrumbs', 'banners'));
  }

  public function create()
  {
    $breadCrumbs = [
      [
        'label' => 'Banners',
        'url' => route('admin.banners')
      ],
      [
        'label' => 'Create',
      ]
    ];
    return view('admin.banners.create', compact('breadCrumbs'));
  }

  public function store(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'page' => 'required',
      'banner' => 'nullable|mimes:png,jpg,jpeg|max:5048',
      'title' => 'required',
    ]);

    try {
      if ($request->hasFile('banner')) {
        $file = $request->file('banner');
        $fileName = time() . '_' . Str::uuid() . '_' . $file->getClientOriginalExtension();
        $file->storeAs('admin/uploads/',  $fileName, 'public');
      }

      $page = Str::slug($request->page);

      Banner::create([
        'page' =>  $page,
        'banner' => $fileName,
        'title' => strtoupper($request->title),
      ]);

      return to_route('admin.banners')->with('message', 'Record Created Successfully');
    } catch (\Exception $e) {
      Log::error('Action Failed: ' . $e->getMessage());
      return redirect()->back()->with('message', 'SomeThing Went Wrong');
    }
  }

  public function edit(string $id)
  {
    $breadCrumbs = [
      [
        'label' => 'Banners',
        'url' => route('admin.banners')
      ],
      [
        'label' => 'Edit',
      ]
    ];
    $banner = Banner::findOrFail($id);

    return view(
      'admin.banners.edit',
      compact('breadCrumbs', 'banner')
    );
  }

  public function update(string $id, Request $request)
  {
    $banner = Banner::findOrFail($request->id);
    $request->validate([
      'page' => 'required',
      'banner' => 'nullable|mimes:png,jpg,jpeg|max:5048',
      'title' => 'required',
    ]);

    try {
      // preserving old file
      $fileName = $banner->banner;
      if ($request->hasFile('banner')) {
        // deleting the old file
        $oldFile = storage_path('app/public/admin/uploads/' . $banner->banner);
        if (file_exists($oldFile)) {
          @unlink($oldFile);
        }
        $file = $request->file('banner');
        $fileName = time() . '_' . Str::uuid() . '_' . $file->getClientOriginalExtension();
        $file->storeAs('admin/uploads/',  $fileName, 'public');
      }

      $page = Str::slug($request->page);

      Banner::where('id', $id)->update([
        'page' =>  $page,
        'banner' => $fileName,
        'title' => $request->title,
      ]);

      return to_route('admin.banners')->with('message', 'Record Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Updation Failed: ' . $e->getMessage());
      return redirect()->back()->with('message', 'SomeThing Went Wrong');
    }
  }

  public function delete(Request $request)
  {
    $banner = Banner::findOrFail($request->id);

    try {
      $recordFile = storage_path('app/public/admin/uploads/' . $banner->banner);
      if (file_exists($recordFile)) {
        @unlink($recordFile);
      }
      $banner->delete();
      return response()->json([
        'message' => 'Record Deleted Successfully!',
      ], 200);
    } catch (\Exception $e) {
      Log::error("Failed To Delete Record: " . $e->getMessage());
      return response()->json([]);
    }
  }
}