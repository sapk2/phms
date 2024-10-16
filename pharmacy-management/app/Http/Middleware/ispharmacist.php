<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ispharmacist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (Auth::check()) {
            // Check if authenticated user is an admin
            if (Auth::user()->role == 'admin') {
                return $next($request);
            }
            // Redirect to home if user is not an admin
            return redirect()->route('home');
        }
        // Redirect to login if user is not authenticated
        return redirect()->route('login');
    }
}
