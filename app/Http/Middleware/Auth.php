<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {

    $user = auth('api')->user();

    if (!$user) {
      if ($request->expectsJson()) {
        return response()->json([
          'status' => 401,
          'message' => 'Unauthorized'
        ]);
      }
      return to_route('api.auth.login');
    }
    return $next($request);
  }
}
