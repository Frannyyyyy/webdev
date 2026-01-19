<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportManagerController extends Controller
{
public function index()
    {
        // This points to resources/views/manager/dashboard.blade.php
        return view('manager.dashboard');
    }
}
