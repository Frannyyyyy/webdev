@extends('agent.agent-layout')

@section('content')
    {{-- Top Header Section --}}
    <div class="mb-8">
        <h1 class="text-3xl font-black uppercase">Support Agent Dashboard</h1>
        <p class="italic text-gray-600">Operational Command Center</p>
        <hr class="border-black border-t-2 mt-4">
    </div>

    {{-- Page Title --}}
    <h2 class="text-2xl font-black text-center mb-6 uppercase tracking-tight">Assigned Tickets</h2>

    {{-- Search & Filter Bar --}}
    <div class="flex items-center gap-4 mb-6">
        <div class="flex-1 relative">
            <input type="text" placeholder="Search Ticket ID" 
                class="w-full lofi-border rounded-full py-3 px-6 focus:outline-none focus:ring-2 focus:ring-orange-500">
            <i class="fa-solid fa-magnifying-glass absolute right-6 top-4"></i>
        </div>
        <button class="text-2xl hover:scale-110 transition-transform">
            <i class="fa-solid fa-filter"></i>
        </button>
    </div>

    {{-- Ticket Table --}}
    <div class="lofi-border rounded-[30px] overflow-hidden lofi-shadow bg-white">
        <table class="w-full text-left border-collapse">
            <thead class="border-b-[3px] border-black">
                <tr class="bg-white">
                    <th class="p-4 font-black uppercase text-sm">Ticket ID</th>
                    <th class="p-4 font-black uppercase text-sm">Date & Time</th>
                    <th class="p-4 font-black uppercase text-sm">Student Name</th>
                    <th class="p-4 font-black uppercase text-sm">Document Type</th>
                    <th class="p-4 font-black uppercase text-sm text-center">Ticket Status</th>
                    <th class="p-4 font-black uppercase text-sm text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50 border-b-2 border-gray-100 last:border-0">
                    <td class="p-4 font-bold">TIC-2026-001-T</td>
                    <td class="p-4 text-xs text-gray-500">Jan 01, 2026 | 9:30 AM</td>
                    <td class="p-4 font-bold">Deanne Mata</td>
                    <td class="p-4 text-xs font-bold text-orange-600">Certificate of Registration</td>
                    <td class="p-4 text-center">
                        <span class="bg-[#5c6bb1] text-white px-4 py-1 rounded-full border-2 border-black text-xs font-bold">Received</span>
                    </td>
                    <td class="p-4 text-center">
                        <button class="bg-[#1d4ed8] text-white px-6 py-1 rounded-full border-2 border-black text-xs font-bold hover:scale-105 transition-transform">View</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
