<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class IsSeller
{
    /**
     * Handle an incoming request.
     *
     * Check if the authenticated user has the 'seller' role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('IsSeller middleware invoked for user ID: ' . optional(Auth::user())->id);
    
        if (Auth::check() && Auth::user()->role === 'seller') {
            return $next($request);
        }
    
        \Log::error('IsSeller middleware: User is not a seller.', ['user' => Auth::user()]);
        return redirect('/')->with('error', 'You do not have seller access.');
    }
}
