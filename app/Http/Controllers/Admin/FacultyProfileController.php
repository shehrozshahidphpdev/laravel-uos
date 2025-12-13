<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Department;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\FacultyProfile;

class FacultyProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $profiles = FacultyProfile::with('department')->get();
    $breadCrumbs = [
      [
        'label' => 'Chairman Profile',
      ],
    ];

    return view(
      'admin.facultyprofiles.list',
      [
        'profiles' => $profiles,
        'breadCrumbs' => $breadCrumbs,
      ]
    );
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $departments = Department::all();

    $breadCrumbs = [
      [
        'label' => 'Chairman Profile',
        'url' => route('admin.faculty-profiles.index')
      ],
      [
        'label' => 'Create'
      ]
    ];

    return view(
      'admin.facultyprofiles.create',
      [
        'breadCrumbs' => $breadCrumbs,
        'departments' => $departments
      ]
    );
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // dd($request->all());

    $request->validate([
      'name' => 'required',
      'image' => 'required|mimes:png,jpg,jpeg|max:5048',
      'cv' => 'nullable|mimes:pdf,doc,docx|max:10240',
      'designation' => 'required',
      'position' => 'required',
      'category' => 'required',
      'qualification' => 'required',
      'specialization' => 'required',
      'email' => 'required|email|unique:faculty_profiles,email',
      'dept_id' => 'required'
    ]);

    try {

      $imageName = null;
      $cv = null;


      if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '_' . Str::uuid() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('admin/uploads', $imageName, 'public');
      }

      if ($request->hasFile('cv')) {

        $cv = $request->file('cv');

        $cvName = time() . '_' . Str::uuid() . '.' . $cv->getClientOriginalExtension();

        $cv->storeAs('admin/uploads', $cvName, 'public');
      }

      FacultyProfile::create([
        'name' => $request->name,
        'image' => $imageName,
        'cv' => $cvName,
        'designation' => $request->designation,
        'position' => $request->position,
        'qualification' => $request->qualification,
        'specialization' => $request->specialization,
        'email' => $request->email,
        'category' => $request->category,
        'dept_id' => $request->dept_id
      ]);

      return to_route('admin.faculty-profiles.index')
        ->with('message', 'Record Created Successfully');
    } catch (\Throwable $e) {
      Log::error('Insertion Failed: ' . $e->getMessage());
      return redirect()->back()->with('message', 'Something Went Wrong!');
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
    $departments = Department::all();
    $profile = FacultyProfile::findOrFail($id);

    $breadCrumbs = [
      [
        'label' => 'Chairman Profile',
        'url' => route('admin.faculty-profiles.index')
      ],
      [
        'label' => 'Edit'
      ]
    ];

    return view(
      'admin.facultyprofiles.edit',
      [
        'breadCrumbs' => $breadCrumbs,
        'departments' => $departments,
        'profile' => $profile
      ]
    );
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $chairmanProfile = FacultyProfile::findOrFail($id);

    $request->validate([
      'name' => 'required',
      'image' => 'nullable|mimes:png,jpg,jpeg|max:5048',
      'cv' => 'nullable|mimes:pdf,doc,docx|max:10240',
      'designation' => 'required',
      'position' => 'required',
      'qualification' => 'required',
      'specialization' => 'required',
      'category' => 'required',
      'email' => 'required|email|unique:faculty_profiles,email,' . $id,
      'dept_id' => 'required'
    ]);

    try {

      if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '_' . Str::uuid() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('admin/uploads', $imageName, 'public');

        // delete old image
        $oldImage = storage_path('app/public/admin/uploads/' . $chairmanProfile->image);

        if (file_exists($oldImage)) {
          @unlink($oldImage);
        }
      } else {
        $imageName = $chairmanProfile->image;
      }


      if ($request->hasFile('cv')) {

        $cv = $request->file('cv');

        $cvName = time() . '_' . Str::uuid() . '.' . $cv->getClientOriginalExtension();

        $cv->storeAs('admin/uploads', $cvName, 'public');

        // delete old image
        $oldCv = storage_path('app/public/admin/uploads/' . $chairmanProfile->cv);

        if (file_exists($oldCv)) {
          @unlink($oldCv);
        }
      } else {
        $cvName = $chairmanProfile->cv;
      }

      $chairmanProfile->update([
        'name' => $request->name,
        'image' => $imageName,
        'cv' => $cvName,
        'designation' => $request->designation,
        'position' => $request->position,
        'qualification' => $request->qualification,
        'specialization' => $request->specialization,
        'email' => $request->email,
        'category' => $request->category,
        'dept_id' => $request->dept_id
      ]);

      return to_route('admin.faculty-profiles.index')
        ->with('message', 'Record Updated Successfully');
    } catch (\Throwable $e) {
      Log::error('Update Failed: ' . $e->getMessage());
      return redirect()->back()->with('message', 'Something Went Wrong!');
    }
  }
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request)
  {
    $chairmanProfile = FacultyProfile::findOrFail($request->id);

    try {
      $oldImage = storage_path('app/public/admin/uploads/' . $chairmanProfile->image);
      if (file_exists($oldImage)) {
        @unlink($oldImage);
      }

      $oldCv =  storage_path('app/public/admin/uploads/' . $chairmanProfile->cv);
      if (file_exists($oldCv)) {
        @unlink($oldCv);
      }
      $chairmanProfile->delete();
      return response()->json([
        'message' => 'Record Deleted Successfully!',
      ], 200);
    } catch (\Exception $e) {
      Log::error("Failed To Delete Record" . $e->getMessage());
      return response()->json([]);
    }
  }
}