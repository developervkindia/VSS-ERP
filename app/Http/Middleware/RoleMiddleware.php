<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
       /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            abort(403, 'Unauthorized: User is not authenticated.');
        }
// Debug the user's roles
Log::info('User Roles: ', Auth::user()->getRoleNames()->toArray());
        // Check if the user has the required role
        if (!Auth::user()->hasRole($role)) {
            abort(403, 'Unauthorized: You do not have the required role.');
        }

        return $next($request);
    }
}
