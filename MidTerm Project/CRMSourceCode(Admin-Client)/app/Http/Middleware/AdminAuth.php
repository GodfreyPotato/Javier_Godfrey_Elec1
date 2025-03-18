<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Check if admin session is set
        if (!Session::has('auth_admin')) {
            return redirect()->route('login')->withErrors(['email' => 'Unauthorized access.']);
        }

        return $next($request);
    }
}
