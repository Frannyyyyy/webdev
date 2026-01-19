<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $activeSessions = DB::table('sessions')->count();
        $pendingTasks = Ticket::count();
        
        return view('admin.dashboard', compact('totalUsers', 'activeSessions', 'pendingTasks'));
    }
}
