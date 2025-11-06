<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  public function viewLogin()
  {
    return view('admin.auth.login');
  }
  public function viewRegister()
  {
    return view('admin.auth.register');
  }


  public function attemptRegister(Request $request)
  {

    // return response()->json("asdwaqwqwdqwd");

    $v = Validator::make($request->all(), [
      'first_name' => 'required|string|max:255|min:3',
      'last_name' => 'required|string|max:255|min:3',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:6|confirmed',
    ], [
      'password.confirmed' => 'Password does not match.',
    ]);

    if ($v->fails()) {
      return response()->json([
        'status' => 422,
        'errors' => $v->errors(),
      ]);
    }

    $user = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    if ($user) {
      return response()->json([
        'status' => 200,
        'message' => 'User Registered Successfully!'
      ]);
    }
  }

  public function attemptLogin(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return response()->json([
        'status' => 200,
        'message' => 'Login Successful!'
      ], 200);
    }

    return response()->json([
      'status' => 401,
      'message' => 'Invalid email or password.'
    ], 401);
  }

  public function logout()
  {
    if (Auth::check()) {
      Auth::logout();
      return to_route('auth.login');
    }
  }
  public function profile()
  {
    // $id = Auth::user()->id;
    // $currentUser = User::find($id);
    // $currentUser = json_encode($currentUser);
    return view('admin.profile',);
  }

  public function getProfile()
  {
    $id = Auth::user()->id;
    $currentUser = User::find($id);
    if ($id) {
      return response()->json($currentUser);
    }
  }

  public function editProfile(Request $request)
  {
    $id = $request->id;
  }
}