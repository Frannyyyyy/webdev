<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function history()
    {
        return view('agent.history');
    }

    public function show($id)
    {
        return view('agent.ticket-view', compact('id'));
    }
}