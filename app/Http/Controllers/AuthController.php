<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRoleSelection() {
        return view('auth.role-selection');
    }

    public function showLogin($role) {
        // Validates role and returns the split-screen login
        return view('auth.login', compact('role'));
    }

    public function showRegistration() {
        return view('auth.register');
    }

    public function showForgotPasswordForm()
{
    return view('auth.passwords.email');
}

public function showResetPasswordForm($token)
{
    return view('auth.passwords.reset', ['token' => $token]);
}

}
