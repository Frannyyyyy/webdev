<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login-admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 1. Check if user exists in users table
        $user = User::where('email', $request->email)->first();
        
        // 2. If user exists, login normally
        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->role !== 'admin') {
                // Update role to admin if not admin
                $user->update(['role' => 'admin']);
            }
            
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }
        
        // 3. If user doesn't exist, CREATE NEW USER in users table
        $newUser = User::create([
            'name' => $request->email, // Use email as name
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'status' => 'Active',
            'department' => 'Administration',
        ]);
        
        // 4. Login with new user
        Auth::login($newUser);
        $request->session()->regenerate();
        
        return redirect('/admin/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
