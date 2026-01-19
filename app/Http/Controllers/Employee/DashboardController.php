<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

class DashboardController extends Controller
{
    
public function index()
{
    return view('agent.dashboard'); 
}

public function update(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'remarks' => 'nullable|string',
        ]);
        
        return redirect()->back()->with('success', 'Ticket updated successfully!');
    }
}