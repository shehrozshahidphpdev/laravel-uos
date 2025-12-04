<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Models\Admin\OricTeam;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OricTeamController extends Controller
{
  public $settings;

  public function __construct()
  {
    $this->settings = Setting::first();
  }
  public function index()
  {
    $data = OricTeam::all();

    $breadCrumbs = [
      [
        'label' => 'ORIC TEAMS',
      ]
    ];

    return view('admin.oricteam.list', [
      'breadcrumbs' => $breadCrumbs,
      'oricTeams' => $data
    ]);
  }
  public function create()
  {
    $breadCrumbs = [
      [
        'label' => 'Oric Teams',
        'url' => route('admin.oric-team')
      ],
      [
        'label' => 'Create'
      ]
    ];

    return view('admin.oricteam.create', [
      'breadCrumbs' => $breadCrumbs,
    ]);
  }
  public function store(Request $request)
  {
    $request->validate([
      'dept_name' => 'required|min:4',
      'members' => 'required|min:4'
    ]);

    try {
      OricTeam::create([
        'dept_name' => $request->dept_name,
        'members' => $request->members
      ]);
      return to_route('admin.oric-team')
        ->with('message', 'Record Created Successfully');
    } catch (\Exception $e) {
      Log::error('Action Failed: ' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try again');
    }
  }
  public function edit(Request $request, string $id)
  {

    $data = OricTeam::findOrFail($id);
    $breadCrumbs = [
      [
        'label' => 'Oric Teams',
        'url' => route('admin.oric-team')
      ],
      [
        'label' => 'Create'
      ]
    ];

    return view('admin.oricteam.edit', [
      'breadCrumbs' => $breadCrumbs,
      'oricTeam' => $data
    ]);
  }
  public function update(Request $request, string $id)
  {
    $request->validate([
      'dept_name' => 'required|min:4',
      'members' => 'required|min:4'
    ]);

    try {
      OricTeam::where('id', $id)->update([
        'dept_name' => $request->dept_name,
        'members' => $request->members
      ]);
      return to_route('admin.oric-team')
        ->with('message', 'Record updated Successfully');
    } catch (\Exception $e) {
      Log::error('Updation Failed: ' . $e->getMessage());
      return redirect()
        ->back()
        ->with('message', 'Something Went Wrong Please Try again');
    }
  }
  public function delete(string $id)
  {
    try {
      $data = OricTeam::findOrFail($id);
      $data->delete();
      return response()->json([
        'message' => 'Record Deleted Successfully',
      ], 200);
    } catch (\Exception $e) {
      Log::error('Seletion Failed: ' . $e->getMessage());
      return response()->json([
        'message' => 'SomeThing Went Wrong Please Try Again',
      ], 200);
    }
  }
}
