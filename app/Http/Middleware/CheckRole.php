<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Log};
use Closure;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            Log::info('CheckRole: User not logged in');
            abort(403, 'User not logged in');
        }

        $userRole = Auth::user()->role;
        Log::info('CheckRole: User role = ' . $userRole);
        Log::info('CheckRole: Allowed roles = ' . implode(', ', $roles));

        if (!in_array($userRole, $roles)) {
            Log::warning('CheckRole: Access denied for role ' . $userRole);
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
