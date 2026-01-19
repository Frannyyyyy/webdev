<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumniController extends Controller
{

    public function showLogin()
        {
            return view('auth.login-alumni');
        }

    public function dashboard() {
        return view('alumni.dashboard');
    }

    public function documents() {
        return view('alumni.documents');
    }

    public function records() {
        return view('alumni.records');
    }

    public function help() {
        return view('alumni.help');
    }
}
