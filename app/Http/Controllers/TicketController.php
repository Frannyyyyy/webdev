<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Step 1 & 2: Form Input
    public function create() {
        return view('user.tickets.create');
    }

    // Step 3: Receipt Page (Page 5)
    public function showReceipt(Request $request) {
        $data = $request->all();
        return view('user.tickets.receipt', compact('data'));
    }

    // Step 4: Final Feedback (Page 7)
    public function success() {
        return view('user.tickets.success');
    }
}