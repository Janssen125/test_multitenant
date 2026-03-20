<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictRole
{
    /**
     * Handle an incoming request and ensure user has the required platform role.
     * 
     * Multiple roles can be passed separated by comma: e.g. "super_admin,admin"
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $roles = explode(',', $role);
        
        if (!in_array(auth()->user()->role, $roles)) {
            // Check if super_admin should always have access
            if (auth()->user()->role === 'super_admin') {
                return $next($request);
            }

            return response()->json(['error' => 'Unauthorized role access.'], 403);
        }

        return $next($request);
    }
}
