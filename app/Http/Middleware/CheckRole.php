<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'user') {
                return redirect()->route('webpage');
            } 
        }

        return $next($request);
    }
}
