<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Merit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MeritController extends Controller
{
  public function index()
  {
    $merits = Merit::all();
    $breadCrumbs = [
      [
        'label' => 'Merits'
      ]
    ];
    return view('admin.merits.list', compact('breadCrumbs', 'merits'));
  }

  public function create()
  {
    $breadCrumbs = [
      [
        'label' => 'Merit',
        'url' => route('admin.merits')
      ]
    ];

    return view('admin.merits.create', compact('breadCrumbs'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'program_name' => 'required',
      'shift' => 'required',
      'first_merit_list' => 'nullable|mimes:pdf',
      'second_merit_list' => 'nullable|mimes:pdf',
      'third_merit_list' => 'nullable|mimes:pdf',
      'fourth_merit_list' => 'nullable|mimes:pdf',
      'fifth_merit_list' => 'nullable|mimes:pdf',
      'sixth_merit_list' => 'nullable|mimes:pdf',
      'seventh_merit_list' => 'nullable|mimes:pdf',
      'eighth_merit_list' => 'nullable|mimes:pdf',
      'nineth_merit_list' => 'nullable|mimes:pdf',
      'tenth_merit_list' => 'nullable|mimes:pdf',
    ], [
      'shift.required' => 'Please select a shift first'
    ]);

    try {

      $files = [
        'first_merit_list',
        'second_merit_list',
        'third_merit_list',
        'fourth_merit_list',
        'fifth_merit_list',
        'sixth_merit_list',
        'seventh_merit_list',
        'eighth_merit_list',
        'nineth_merit_list',
        'tenth_merit_list'
      ];

      $fileNames = [];

      foreach ($files as $file) {
        if ($request->hasFile($file)) {
          $uploadedFile = $request->file($file);
          $fileName = time() . '_' . uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
          $uploadedFile->storeAs('admin/uploads/merit/', $fileName, 'public');
          $fileNames[$file] = $fileName;
        } else {
          $fileNames[$file] = null;
        }
      }

      // Now create record with dynamic file names
      Merit::create(array_merge([
        'program_name' => $request->program_name,
        'shift' => $request->shift,
      ], $fileNames));

      return to_route('admin.merits')
        ->with('message', 'Record Created Successfully');
    } catch (\Exception $e) {
      Log::error('Insertion Failed' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try Again');
    }
  }

  public function edit(Request $request)
  {
    try {
      $breadCrumbs = [
        [
          'label' => 'Merit',
          'url' => route('admin.merits')
        ],
        [
          'label' => 'Edit'
        ]
      ];

      $merit = Merit::findOrFail($request->id);
      return view('admin.merits.edit', compact('merit', 'breadCrumbs'));
    } catch (\Exception $e) {
      Log::error('Action Failed' . $e->getMessage());
      return redirect()->back();
    }
  }

  public function update(Request $request, string $id)
  {
    $request->validate([
      'program_name' => 'required',
      'shift' => 'required',
      'first_merit_list' => 'nullable|mimes:pdf',
      'second_merit_list' => 'nullable|mimes:pdf',
      'third_merit_list' => 'nullable|mimes:pdf',
      'fourth_merit_list' => 'nullable|mimes:pdf',
      'fifth_merit_list' => 'nullable|mimes:pdf',
      'sixth_merit_list' => 'nullable|mimes:pdf',
      'seventh_merit_list' => 'nullable|mimes:pdf',
      'eighth_merit_list' => 'nullable|mimes:pdf',
      'nineth_merit_list' => 'nullable|mimes:pdf',
      'tenth_merit_list' => 'nullable|mimes:pdf',
    ], [
      'shift.required' => 'Please select a shift first'
    ]);

    try {
      $merit = Merit::findOrFail($request->id);

      $files = [
        'first_merit_list',
        'second_merit_list',
        'third_merit_list',
        'fourth_merit_list',
        'fifth_merit_list',
        'sixth_merit_list',
        'seventh_merit_list',
        'eighth_merit_list',
        'nineth_merit_list',
        'tenth_merit_list'
      ];

      $fileNames = [];
      foreach ($files as $file) {

        if ($request->hasFile($file)) {
          $uploadedFile = $request->file($file);
          $fileName = time() . '_' . uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
          $uploadedFile->storeAs('admin/uploads/merit/', $fileName, 'public');

          $fileNames[$file] = $fileName;
        }

        if (!$request->hasFile($file)) {
          $fileNames[$file] = $merit->$file;
        }
      }


      Merit::where('id', $id)
        ->update(array_merge([
          'program_name' => $request->program_name,
          'shift' => $request->shift,
        ], $fileNames));

      return to_route('admin.merits')
        ->with('message', 'Record Updated Successfully');
    } catch (\Exception $e) {
      Log::error('Updation Failed' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try Again');
    }
  }





  public function delete(Request $request)
  {
    try {
      $data = Merit::findOrFail($request->id);
      $firstFile = storage_path('app/public/admin/uploads/merit/' . $data->first_merit_list);
      $secondFile = storage_path('app/public/admin/uploads/merit/' . $data->second_merit_list);
      $thirdFile = storage_path('app/public/admin/uploads/merit/' . $data->third_merit_list);
      $fourthFile = storage_path('app/public/admin/uploads/merit/' . $data->fourth_merit_list);
      $fifthFile = storage_path('app/public/admin/uploads/merit/' . $data->fifth_merit_list);
      $sixthFile = storage_path('app/public/admin/uploads/merit/' . $data->sixth_merit_list);
      $seventhFile = storage_path('app/public/admin/uploads/merit/' . $data->seventh_merit_list);
      $eighthFile = storage_path('app/public/admin/uploads/merit/' . $data->eighth_merit_list);
      $ninethFile = storage_path('app/public/admin/uploads/merit/' . $data->nineth_merit_list);
      $tenthFile = storage_path('app/public/admin/uploads/merit/' . $data->tenth_merit_list);

      $files = [
        $firstFile,
        $secondFile,
        $thirdFile,
        $fourthFile,
        $fifthFile,
        $sixthFile,
        $seventhFile,
        $eighthFile,
        $ninethFile,
        $tenthFile
      ];
      foreach ($files as $file) {
        if (file_exists($file)) {
          @unlink($file);
        }
      }
      $data->delete();

      return response()->json([
        'message' => 'Record Deleted Succesfully',
      ], 200);
    } catch (\Exception $e) {
      Log::error('Action Failed' . $e->getMessage());
      return response()->json([
        'message' => 'Something went wrong',
      ], 500);
    }
  }
}