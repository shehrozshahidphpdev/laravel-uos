<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Profile;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
  public function administrations()
  {
    $administrations = Profile::with('user')->get();
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


  public function directorates()
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

  public function administrationCreate()
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

  public function directorateCreate()
  {
    $breadCrumbs = [
      [
        'label' => 'Directorates',
        'url' => route('admin.directorates')
      ],
      [
        'label' => 'create'
      ]
    ];
    return view(
      'admin.directorates.create',
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
      'email' => 'email|unique:profiles,email',
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
      if ($request->module == 'administrations') {
        $category = 'administrations';
      } else {
        $category = 'directorates';
      }
      Profile::create([
        'name' => $request->name,
        'designation' => $request->designation,
        'phone_no' => $request->phone_no,
        'image' => $imageName,
        'email' => $request->email,
        'page' => $request->page,
        'category' => $category,
        'created_by' => Auth::user()->id
      ]);
      if ($request->module == 'administrations') {

        return to_route('admin.administrations')
          ->with('message', 'Record Created Successfully');
      } else {
        return to_route('admin.directorates')
          ->with('message', 'Record Created Successfully');
      }
    } catch (\Exception $e) {
      Log::error('Action Failed' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try Again');
    }
  }

  public function editAdministration(Request $request)
  {
    $administration = Profile::findOrFail($request->id);
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

  public function editDirectorate(Request $request)
  {
    $directorate = Profile::findOrFail($request->id);
    $breadCrumbs = [
      [
        'label' => 'Administrations',
        'url' => route('admin.directorates')
      ],
      [
        'label' => 'Edit'
      ]
    ];
    return view('admin.directorates.edit', [
      'breadCrumbs' => $breadCrumbs,
      'directorate' => $directorate
    ]);
  }

  public function update(Request $request, string $id)
  {
    $administration = Profile::findOrFail($id);
    $request->validate([
      'name' => 'required|min:3',
      'designation' => 'required|min:4',
      'page' => 'required',
      'phone_no' => 'phone:PK',
      'email' => 'email|unique:profiles,email,' . $id,
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

      if ($request->module == 'administrations') {
        $category = "administrations";
      } else {
        $category = "directorates";
      }

      Profile::where('id', $id)->update([
        'name' => $request->name,
        'designation' => $request->designation,
        'phone_no' => $request->phone_no,
        'image' => $imageName,
        'email' => $request->email,
        'page' => $request->page,
        'category' => $category,
        'created_by' => Auth::user()->id
      ]);
      if ($request->module == 'administrations') {
        return to_route('admin.administrations')
          ->with('message', 'Record Updated Successfully');
      } else {
        return to_route('admin.directorates')
          ->with('message', 'Record Updated Successfully');
      }
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
      $data = Profile::findOrFail($request->id);
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
}