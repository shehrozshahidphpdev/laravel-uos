<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\User;

class AuthController extends Controller
{
  /*
    IGNORE THE METHOD RED UNDERLINED ERROR
  */
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if (! $token = auth('api')->attempt($credentials)) {
      return response()->json(['error' => 'Invalid credentials'], 401);
    }

    return $this->respondWithToken($token);
  }

  public function register(Request $request)
  {
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
    // generates the jwt token
    $token = auth('api')->login($user);

    return $this->respondWithToken($token);
  }

  public function me()
  {
    return response()->json(auth('api')->user());
  }

  public function logout()
  {
    auth('api')->logout();
    return response()->json(['message' => 'Successfully logged out']);
  }

  public function refresh()
  {
    return $this->respondWithToken(auth('api')->refresh());
  }

  protected function respondWithToken($token)
  {
    return response()->json([
      'status' => 200,
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth('api')->factory()->getTTL() * 60,
      'user' => auth('api')->user(),
    ]);
  }
}