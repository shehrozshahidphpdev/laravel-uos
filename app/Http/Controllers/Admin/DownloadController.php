<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Download;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $breadCrumbs = [
      [
        'label' => 'Downloads'
      ]
    ];
    $downloads = Download::all();
    return view(
      'admin.downloads.list',
      compact(
        'breadCrumbs',
        'downloads'
      )
    );
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $breadCrumbs = [
      [
        'label' => 'Downloads',
        'url' => route('admin.downloads.index')
      ],
      [
        'label' => 'Create',
      ]
    ];
    return view('admin.downloads.create', compact('breadCrumbs'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // dd($request->all());

    $request->validate([
      'title' => 'required',
      'page' => 'required',
      'file' => 'required'
    ]);

    try {
      if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . Str::uuid() . '_' . $file->getClientOriginalExtension();
        $file->storeAs('admin/uploads/',  $fileName, 'public');
      }

      Download::create([
        'title' => $request->title,
        'file' => $fileName,
        'page' => $request->page,
      ]);

      return to_route('admin.downloads.index')
        ->with('message', 'Record Created Successfully');
    } catch (\Exception $e) {
      Log::error('Insertion Failed: ' . $e->getMessage());
      return redirect()->back();
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $breadCrumbs = [
      [
        'label' => 'Downloads',
        'url' => route('admin.downloads.index')
      ],
      [
        'label' => 'Edit',
      ]
    ];
    $download = Download::findOrFail($id);

    return view(
      'admin.downloads.edit',
      compact(
        'download',
        'breadCrumbs'
      )
    );
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $download = Download::findOrFail($id);
    $request->validate([
      'title' => 'required',
      'page' => 'required',
      'file' => 'nullable|mimes:pdf'
    ]);

    try {
      if ($request->hasFile('file')) {
        $oldFile = storage_path('app/public/admin/uploads/' . $download->file);
        if (file_exists($oldFile)) {
          @unlink($oldFile);
        }
        $file = $request->file('file');
        $fileName = time() . '_' . Str::uuid() . '_' . $file->getClientOriginalExtension();
        $file->storeAs('admin/uploads/',  $fileName, 'public');
      } else {
        $fileName = $download->file;
      }

      Download::where('id', $id)->update([
        'title' => $request->title,
        'file' => $fileName,
        'page' => $request->page,
      ]);

      return to_route('admin.downloads.index')
        ->with('message', 'Record Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Insertion Failed: ' . $e->getMessage());
      return redirect()->back();
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, string $id)
  {
    $id = $request->id;

    try {
      $download = Download::findOrFail($id);
      $file = Storage_path('app/public/admin/uploads/' . $download->file);
      if (file_exists($file)) {
        @unlink($file);
      }

      $download->delete();
      return response()->json([
        'message' => "Record Deleted Successfully",
      ], 200);
    } catch (\Exception $e) {
      Log::error('Action Failed: ' . $e->getMessage());
      return response()->json([
        'error' => "Something Went Wrong Please Try Again",
      ], 500);
    }
  }
}