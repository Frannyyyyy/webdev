@extends('agent.agent-layout')

@section('title', 'My History')

@section('content')
<div class="space-y-6">
    <header class="border-b-2 border-black/10 pb-4">
        <h1 class="text-4xl font-black uppercase">My History</h1>
        <p class="text-lg font-medium italic text-gray-700">Records of Processed Tickets</p>
    </header>

    <section class="bg-[#FBF7EB] p-6 rounded-xl border-2 border-transparent">
        <h2 class="text-3xl font-black text-center mb-8">Completed Tickets</h2>

        <div class="flex items-center gap-4 mb-6 max-w-2xl mx-auto">
            <div class="relative flex-1">
                <input type="text" 
                       placeholder="Search History..." 
                       class="w-full p-3 pl-5 rounded-full border-[3px] border-black font-bold shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] focus:outline-none">
                <button class="absolute right-4 top-1/2 -translate-y-1/2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>

        <div class="bg-white rounded-3xl border-[3px] border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#EAE8D6] border-b-[3px] border-black">
                    <tr>
                        <th class="p-4 font-black text-lg">Ticket ID</th>
                        <th class="p-4 font-black text-lg text-center">Date Completed</th>
                        <th class="p-4 font-black text-lg text-center">Student Name</th>
                        <th class="p-4 font-black text-lg text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="font-bold">
                    <tr class="border-b-2 border-black/5 hover:bg-gray-50 transition-colors">
                        <td class="p-4">TIC-2026-005-T</td>
                        <td class="p-4 text-center text-sm text-gray-600">Jan 12, 2026 | 2:15 PM</td>
                        <td class="p-4 text-center">John Doe</td>
                        <td class="p-4 text-center">
                            <span class="bg-[#00C49A] text-black px-6 py-1 rounded-full border-2 border-black text-sm shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                                Released
                            </span>
                        </td>
                    </tr>
                    
                    <tr class="border-b-2 border-black/5">
                        <td class="p-4">TIC-2026-009-T</td>
                        <td class="p-4 text-center text-sm text-gray-600">Jan 11, 2026 | 10:00 AM</td>
                        <td class="p-4 text-center">Jane Smith</td>
                        <td class="p-4 text-center">
                            <span class="bg-[#00C49A] text-black px-6 py-1 rounded-full border-2 border-black text-sm shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                                Released
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
