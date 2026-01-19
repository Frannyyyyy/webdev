<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index()
    {
        // For now, we’ll just return a view
        return view('manager.agents');
    }
}
