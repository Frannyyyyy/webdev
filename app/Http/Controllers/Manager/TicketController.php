<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Display all tickets for the manager
    public function index()
    {
        // Replace this with actual ticket data retrieval later
        return view('manager.tickets');
    }
}
