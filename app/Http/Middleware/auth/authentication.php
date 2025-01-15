<?php

namespace App\Http\Middleware\auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class authentication
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect unauthenticated users to a default login page
            return redirect()->route('login');
        }
    
    
        // Allow access to the intended page if no redirection is required
        return $next($request);
    }
    
}
