<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
  public function index(Request $request)
  {
    $query = $request->search;

    if (!empty($query)) {
      $banners = Banner::where('title', 'like', "%$query%")->get();
    } else {
      $banners = Banner::all();
    }
    // If request is AJAX → return only table rows HTML
    if ($request->ajax()) {

      $html = '';
      foreach ($banners as $banner) {
        $html .= '
                <tr class="align-middle">
                    <td>' . $banner->id . '</td>
                    <td>' . Str::limit($banner->slug, 20) . '</td>
                    <td>' . Str::limit($banner->title, 20) . '</td>
                    <td><img src="' . asset("storage/admin/uploads/" . $banner->banner) . '" class="img-thumbnail" width="100"></td>
                    <td>
                        <a href="' . route('admin.banner.edit', $banner->id) . '" class="btn btn-sm btn-primary">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </td>
                    <td>
                        <form action="' . route('admin.banner.delete', $banner->id) . '" class="delete-record" data-id="' . $banner->id . '">
                          <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>';
      }

      if ($banners->count() === 0) {
        $html = '<tr><td colspan="12" class="text-center text-muted py-3">Sorry! No Data Found</td></tr>';
      }

      return response()->json(['html' => $html]);
    }

    $breadCrumbs = [
      ['label' => 'Banners']
    ];

    return view(
      'admin.banners.list',
      compact(
        'breadCrumbs',
        'banners'
      )
    );
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
      'banner' => 'nullable|mimes:png,jpg,jpeg|max:5048',
      'title' => 'required',
      'slug' => 'required',
    ]);

    try {
      if ($request->hasFile('banner')) {
        $file = $request->file('banner');
        $fileName = time() . '_' . Str::uuid() . '_' . $file->getClientOriginalExtension();
        $file->storeAs('admin/uploads/',  $fileName, 'public');
      }


      Banner::create([
        'title' => strtoupper($request->title),
        'slug' =>  strtolower(Str::slug(title: $request->slug)),
        'banner' => $fileName,
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
    // dd($request->all());

    $banner = Banner::findOrFail($request->id);
    $request->validate([
      'banner' => 'nullable|mimes:png,jpg,jpeg|max:5048',
      'title' => 'required',
      'slug' => 'required'
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

      Banner::where('id', $id)->update([
        'banner' => $fileName,
        'slug' =>  strtolower(Str::slug(title: $request->slug)),
        'title' => strtoupper($request->title),
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