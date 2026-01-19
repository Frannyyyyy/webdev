<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; 
class IsEmployee
{
public function handle(Request $request, Closure $next): Response
{
    if (Auth::check() && Auth::user()->role === 'employee') {
        return $next($request);
    }
    
    return redirect()->route('login.employee')->with('error', 'Middleware rejected your role: ' . (Auth::user()->role ?? 'None'));
}
}