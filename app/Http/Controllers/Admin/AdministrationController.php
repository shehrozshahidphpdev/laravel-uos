<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\Administration;
use Illuminate\Support\Facades\Auth;

class AdministrationController extends Controller
{
  public function index()
  {
    $administrations = Administration::with('user')->get();
    $breadCrumbs = [
      [
        'label' => 'Administrations',
      ]
    ];
    return view(
      'admin.administration.list',
      [
        'breadCrumbs' => $breadCrumbs,
        'administrations' => $administrations,
      ]
    );
  }

  public function create()
  {
    $breadCrumbs = [
      [
        'label' => 'Administrations',
        'url' => route('admin.administrations')
      ],
      [
        'label' => 'create'
      ]
    ];
    return view(
      'admin.administration.create',
      [
        'breadCrumbs' => $breadCrumbs
      ]
    );
  }

  public function store(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'name' => 'required|min:3',
      'designation' => 'required|min:4',
      'phone_no' => 'phone:PK',
      'email' => 'email|unique:administrations,email',
      'page' => 'required',
      'image' => 'mimes:png,jpg,jpeg|max:5048',
    ], [
      'phone_no.phone' => 'Phone no must be valid Pakistani number',
    ]);

    try {
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('admin/uploads/', $imageName, 'public');
        $data['image'] = $imageName;
      }

      Administration::create([
        'name' => $request->name,
        'designation' => $request->designation,
        'phone_no' => $request->phone_no,
        'image' => $imageName,
        'email' => $request->email,
        'page' => $request->page,
        'created_by' => Auth::user()->id
      ]);
      return to_route('admin.administrations')
        ->with('message', 'Record Created Successfully');
    } catch (\Exception $e) {
      Log::error('Action Failed' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try Again');
    }
  }

  public function delete(Request $request)
  {
    try {
      $data = Administration::findOrFail($request->id);
      $file = storage_path('app/public/admin/uploads/' .  $data->image);
      if (file_exists($file)) {
        @unlink($file);
      }
      $data->delete();
      return response()->json([
        'message' => 'Record Deleted Successfully'
      ], 200);
    } catch (\Exception $e) {
      Log::error('Action Failed : ' . $e->getMessage());
      return redirect()->back()->with('message', 'Something Went Wrong Please Try Again');
    }
  }

  public function edit(Request $request)
  {
    $administration = Administration::findOrFail($request->id);
    $breadCrumbs = [
      [
        'label' => 'Administrations',
        'url' => route('admin.administrations')
      ],
      [
        'label' => 'Edit'
      ]
    ];
    return view('admin.administration.edit', [
      'breadCrumbs' => $breadCrumbs,
      'administration' => $administration
    ]);
  }

  public function update(Request $request, string $id)
  {
    $administration = Administration::findOrFail($id);
    $request->validate([
      'name' => 'required|min:3',
      'designation' => 'required|min:4',
      'page' => 'required',
      'phone_no' => 'phone:PK',
      'email' => 'email|unique:administrations,email,' . $id,
      'image' => 'mimes:png,jpg,jpeg|max:5048',
    ], [
      'phone_no.phone' => 'Phone no must be valid Pakistani number',
    ]);

    try {
      // keep the old image
      $imageName = $administration->image;
      if ($request->hasFile('image')) {
        $oldFile = storage_path('app/public/admin/uploads/' . $administration->image);
        if (file_exists($oldFile)) {
          @unlink($oldFile);
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('admin/uploads/', $imageName, 'public');
      }

      Administration::where('id', $id)->update([
        'name' => $request->name,
        'designation' => $request->designation,
        'phone_no' => $request->phone_no,
        'image' => $imageName,
        'email' => $request->email,
        'page' => $request->page,
        'created_by' => Auth::user()->id
      ]);
      return to_route('admin.administrations')
        ->with('message', 'Record Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Action Failed' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try Again');
    }
  }
}
