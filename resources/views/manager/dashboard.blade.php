@extends('manager.manager-layouts')

@section('content')
<section>
    <h2 class="text-2xl font-black mb-6">Overview</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-16">
        <div class="relative bg-[#2557FA] rounded-2xl border-[3px] border-black p-6 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] flex items-center justify-between text-white">
            <div class="flex flex-col">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-ticket text-2xl"></i>
                    <span class="font-bold text-lg">Total Tickets</span>
                </div>
                <span class="text-5xl font-black tracking-tighter">50</span>
            </div>
        </div>

        <div class="relative bg-[#E97E4A] rounded-2xl border-[3px] border-black p-6 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] flex items-center justify-between text-white">
            <div class="flex flex-col">
                <span class="font-bold text-lg mb-2">Unassigned</span>
                <span class="text-5xl font-black tracking-tighter">15</span>
            </div>
            <img src="/path-to-your-avatar.jpg" class="w-12 h-12 rounded-full border-2 border-white absolute -top-4 -left-4 shadow-md" alt="Avatar">
        </div>

        <div class="bg-[#E97E4A] rounded-2xl border-[3px] border-black p-6 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] flex items-center justify-between text-white">
            <div class="flex flex-col">
                <span class="font-bold text-lg mb-2">Assigned</span>
                <span class="text-5xl font-black tracking-tighter">30</span>
            </div>
        </div>

        <div class="bg-[#E97E4A] rounded-2xl border-[3px] border-black p-6 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] flex items-center justify-between text-white">
            <div class="flex flex-col">
                <span class="font-bold text-lg mb-2 text-right">Escalated</span>
                <span class="text-5xl font-black tracking-tighter text-right">7</span>
            </div>
        </div>
    </div>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl border-[4px] border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] overflow-hidden">
            <div class="p-4 border-b-[4px] border-black">
                <h3 class="font-black text-2xl">Agent Availability</h3>
            </div>
            <table class="w-full text-left">
                <thead class="bg-[#EAE8D6] border-b-[2px] border-black">
                    <tr>
                        <th class="p-4 font-black">Name</th>
                        <th class="p-4 font-black">Employee ID</th>
                        <th class="p-4 font-black text-center">Tickets</th>
                    </tr>
                </thead>
                <tbody class="font-bold">
                    <tr>
                        <td class="p-4">Deanne Mata</td>
                        <td class="p-4 text-gray-600 font-medium">EMP-001-02-T</td>
                        <td class="p-4 text-center">3</td>
                    </tr>
                </tbody>
            </table>
            <div class="p-4 bg-white flex justify-end">
                <button class="bg-[#D1D5DB] border-2 border-black px-4 py-1 rounded font-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-y-[1px] active:shadow-none transition-all">
                    + Add New
                </button>
            </div>
        </div>
    </div>
</section>
@endsection
