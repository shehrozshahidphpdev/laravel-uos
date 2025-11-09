<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\Department;

class DepartmentController extends Controller
{
  public function index()
  {
    $departments = Department::all();
    return view(
      'admin.departments.list',
      ['departments' => $departments]
    );
  }

  public function create()
  {
    return view('admin.departments.create');
  }
  public function store(Request $request)
  {
    $validations = $request->validate([
      'dept_name' => 'required|min:3',
      'image' => 'required|mimes:png,jpg|max:2048',
      'offered_courses' => 'required',
    ]);

    try {
      $image = $request->file('image');
      $imageName = time() . '_' .  $image->getClientOriginalName();
      $destination = "admin/uploads/";
      // Store the file with your custom name:
      $image->storeAs($destination, $imageName, 'public');

      $department = Department::create([
        'dept_name' => $request->dept_name,
        'image' => $imageName,
        'offered_courses' => $request->offered_courses
      ]);

      if ($department) {
        return to_route('admin.departments')
          ->with('message', 'Department Created Successfully!');
      }
    } catch (\Exception $e) {
      Log::error("Entry Failed " . $e->getMessage());
      return redirect()->back()
        ->with('message', "Something, went wrong Please Try Again Later");
    }
    // dd($request->file('image'));
  }

  public function delete(Request $request)
  {
    $department = Department::findOrFail($request->id);

    try {
      $department->delete();
      return response()->json([
        'message' => 'Department Deleted Successfully!',
      ], 200);
    } catch (\Exception $e) {
      Log::error("Failed To Delete" . $e->getMessage());
      return response()->json([]);
    }
  }

  public function edit(string $id)
  {
    try {
      $department = Department::findOrFail($id);
      return view(
        'admin.departments.edit',
        ['department' => $department]
      );
    } catch (\Exception $e) {
      Log::error('Action Failed ' . $e->getMessage());
      return redirect()->back()
        ->with('error', 'Something Went Wrong Please Try Later');
    }
  }

  public function update(Request $request, string $id)
  {
    $department = Department::findOrFail($id);

    $validations = $request->validate([
      'dept_name' => 'required|min:3',
      'image' => 'nullable|mimes:png,jpg',
      'offered_courses' => 'required',
    ]);

    try {
      $data = $request->only('dept_name', 'offered_courses');

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = 'uploads/' . time() . '_' .  $image->getClientOriginalName();
        $destination = "admin/uploads";
        // Store the file with your custom name:
        $image->storeAs($destination, $imageName, 'public');
        $oldFile = storage_path('app/public/admin/uploads/' . $department->image);
        if (file_exists($oldFile)) {
          @unlink($oldFile);
        }

        $data['image'] = $imageName;
      }

      $department->update($data);

      if ($department) {
        return to_route('admin.departments')
          ->with('message', 'Department Updated Successfully!');
      }
    } catch (\Exception $e) {
      Log::error("Entry Failed " . $e->getMessage());
      return redirect()->back()
        ->with('message', "Something, went wrong Please Try Again Later");
    }
  }
}