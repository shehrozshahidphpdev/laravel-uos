<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DirectorateController extends Controller
{
  public function index()
  {
    $directorates = Profile::where('category', 'directorates')->get();
    $breadCrumbs = [
      [
        'label' => 'Directorates'
      ]
    ];
    return view(
      'admin.directorates.list',
      compact('breadCrumbs', 'directorates')
    );
  }

  public function create()
  {
    $breadCrumbs = [
      [
        'label' => 'Directorates',
        'url' => route('admin.directorates')
      ],
      [
        'label' => 'Create',
      ]
    ];
    return view(
      'admin.directorates.create',
      compact('breadCrumbs')
    );
  }

  public function store(Request $request)
  {
    $request->validate([
      'image' => 'nullable|mimes:png,jpg,jpeg|max:5048',
      'name' => 'required|min:3',
      'designation' => 'required|min:4',
      'phone_no' => 'phone:PK',
      'page' => 'required',
    ], [
      'phone_no.phone' => "The Phone No Must Be A Valid Pakistani Number"
    ]);

    try {
      if ($request->hasFile('image')) {
        $uploadedFile = $request->file('image');
        $uploadedFileName = time() . '_' . Str::uuid() . '_' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->storeAs('admin/uploads/',  $uploadedFileName, 'public');
      }

      Profile::create([
        'name' => $request->name,
        'image' =>  $uploadedFileName,
        'designation' => $request->designation,
        'email' => $request->email,
        'phone_no' => $request->phone_no,
        'category' => 'directorates',
        'page' => $request->page,
        'created_by' => Auth::user()->id
      ]);
      session()->flash('message', 'Record Created Successfuully');
      return to_route('admin.directorates');
    } catch (\Exception $e) {
      Log::error('Insertion Failed' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try Again');
    }
  }

  public function delete(Request $request, string $id)
  {
    try {
      $data = Profile::findOrFail($request->id);
      $unusedFile = storage_path('app/public/admin/uploads/' . $data->image);
      if (file_exists($unusedFile)) {
        @unlink($unusedFile);
      }
      $data->delete();
      return response()->json([
        'message' => 'Record Deleted Successfully',
      ], 200);
    } catch (\Exception $e) {
      Log::error('Action Failed' . $e->getMessage());
      return response()->json([
        'message' => 'Something Went Wrong',
      ], 500);
    }
  }
}
