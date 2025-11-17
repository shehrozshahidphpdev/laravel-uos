<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
  public function index()
  {
    $breadCrumbs = [
      [
        'label' => 'Settings',
      ]
    ];
    $settings = Setting::all();

    return view(
      'admin.settings.list',
      compact('settings'),
      ['breadCrumbs' => $breadCrumbs]
    );
  }

  public function create()
  {
    $breadCrumbs = [];
    $breadCrumbs = [
      [
        'label' => 'Settings',
        'url' => route('admin.settings')
      ],
      [
        'label' => 'Create',
      ]
    ];
    return view(
      'admin.settings.create',
      ['breadCrumbs' => $breadCrumbs]
    );
  }

  public function store(Request $request)
  {
    // dd($request->file('logo'));

    $settings = $request->validate([
      'phone_no' => 'required|phone:PK',
      'email' => 'required|email|unique:settings,email',
      'copyrights' => 'required',
      'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
    ], [
      'phone_no.phone' => 'The phone number must be valid pakistani number'
    ]);

    try {
      if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $fileName = time() . '_' . $logo->getClientOriginalName();
        $destination = 'admin/uploads';
        $logo->storeAs($destination, $fileName, 'public');
      }

      Setting::create([
        'phone_no' => $request->phone_no,
        'email' => $request->email,
        'logo' => $fileName,
        'copyrights' => $request->copyrights,
      ]);

      return to_route('admin.settings')
        ->with('message', 'Setting Created Successfully');
    } catch (\Exception $e) {
      Log::error("Entry Failed" . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Sorry, unable to proceed request');
    }
  }
  public function edit(string $id)
  {
    try {
      $setting = Setting::findOrFail($id);
      $breadCrumbs = [];
      // dd($setting);
      $breadCrumbs = [
        [
          'label' => 'Settings',
          'url' => route('admin.settings'),
        ],
        [
          'label' => 'Edit',
        ]
      ];
      return view(
        'admin.settings.edit',
        [
          'setting' => $setting,
          'breadCrumbs' => $breadCrumbs
        ]
      );
    } catch (\Exception $e) {
      Log::error(message: 'Action Failed' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Unable To Find The User');
    }
  }

  public function update(string $id, Request $request)
  {
    $validated = $request->validate([
      'phone_no' => 'required|phone:PK',
      'email' => [
        'required',
        'email',
        Rule::unique('settings', 'email')->ignore($id),
      ],
      'copyrights' => 'required',
      'logo' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048',
    ]);
    try {

      $setting = Setting::findOrFail($id);
      $oldLogo = $setting->logo;

      // FILE UPLOAD
      if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        $fileName = time() . '_' . $logo->getClientOriginalName();
        $logo->storeAs('admin/uploads', $fileName, 'public');

        // delete old file
        $oldPath = storage_path('app/public/admin/uploads/' . $oldLogo);
        if (file_exists($oldPath)) {
          @unlink($oldPath);
        }
      } else {
        $fileName = $oldLogo;
      }

      // UPDATE
      $setting->update([
        'phone_no' => $request->phone_no,
        'email' => $request->email,
        'logo' => $fileName,
        'copyrights' => $request->copyrights,
      ]);

      return redirect()
        ->route('admin.settings')
        ->with('message', 'Setting Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Some issue!! ' . $e->getMessage());
      return redirect()
        ->back()
        ->withInput()
        ->with('error', 'Update Failed');
    }
  }


  public function delete(string $id)
  {
    try {
      $setting = Setting::findOrFail($id);
      if ($setting->logo) {
        $filePath = storage_path('app/public/admin/uploads/' . $setting->logo);
        if (file_exists($filePath)) {
          @unlink($filePath);
        }
      }
      $setting->delete();

      return response()->json([
        'message' => 'Setting Deleted Successfully',
      ], 200);
    } catch (\Exception $e) {
      Log::error('Deletion Failed' . $e->getMessage());
      return response()->json([
        'message' => 'Something Went Wrong Please Try Again',
      ], 500);
    }
  }
}