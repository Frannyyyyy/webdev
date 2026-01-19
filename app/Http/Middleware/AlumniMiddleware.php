<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    // Show the alumni login page
    public function showLogin()
    {
        return view('auth.login-alumni');
    }

    // Handle login form submission
    public function login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check role
            if (Auth::user()->role === 'alumni') {
                return redirect()->route('alumni.dashboard');
            }

            // Logout if not alumni
            Auth::logout();
            return back()->with('error', 'Access denied: Alumni only.');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    // Alumni dashboard (protected by AlumniMiddleware)
    public function dashboard()
    {
        return view('alumni.dashboard');
    }
}
