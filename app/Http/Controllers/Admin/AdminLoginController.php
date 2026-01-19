<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;


class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login-admin'); // Your blade file name
    }

 public function login(Request $request)
{
    // Skip ALL validation and Eloquent
    DB::table('admins')->insert([
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'created_at' => now(),
        'updated_at' => now()
    ]);
    
    // Go directly to dashboard view
    return view('admin.dashboard');
}

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

   
public function register(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email|unique:admins',
        'password' => 'required|min:6|confirmed',
    ]);

    Admin::create([
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    return redirect('/admin/login')->with('success', 'Admin account created successfully!');
}
}
