<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    // Show the student login form
    public function showLoginForm()
    {
        return view('auth.login-student');
    }

    // Handle student login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Only allow role = student
        if (Auth::attempt(array_merge($credentials, ['role' => 'student']))) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'The credentials do not match our records or you are not a student.',
        ])->withInput();
    }

    // Student logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.student');
    }
}
