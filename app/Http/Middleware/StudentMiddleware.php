<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 1️⃣ Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login.student')->with('error', 'Please login first.');
        }

        $user = Auth::user();

        // 2️⃣ Check if the user has the student role
        if ($user->role !== 'student') {
            // Redirect other roles to their dashboards
            switch ($user->role) {
                case 'employee':
                    return redirect()->route('agent.dashboard');
                case 'manager':
                    return redirect()->route('manager.dashboard');
                case 'admin':
                    return redirect()->route('admin.dashboard');
                default:
                    return redirect()->route('landing');
            }
        }

        // 3️⃣ Everything is okay, allow the request
        return $next($request);
    }
}
