@extends('layouts.dashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-white lofi-border lofi-shadow">
    <div class="bg-black text-white p-4 font-black uppercase tracking-widest">Required Ticket Details</div>

    <form action="/ticket-receipt" method="POST" class="p-8 bg-[#BDDBFF] space-y-8">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2 font-black border-b-2 border-black uppercase">Student Information</div>
            <div>
                <label class="block text-xs font-black uppercase">Student ID:</label>
                <input type="text" value="2021-00000-MN-0" class="w-full border-2 border-black p-2 bg-gray-100 font-bold" readonly>
            </div>
            <div>
                <label class="block text-xs font-black uppercase">Birthday:</label>
                <input type="text" value="January 01, 2000" class="w-full border-2 border-black p-2 bg-gray-100 font-bold" readonly>
            </div>
        </div>

        <div class="space-y-6 pt-6 border-t-2 border-black">
            <div class="font-black border-b-2 border-black uppercase">Request Details</div>
            
            <div>
                <label class="block font-black uppercase mb-2">Purpose of Request:</label>
                <select class="w-full border-4 border-black p-3 font-bold bg-white">
                    <option>Lost / Stolen</option>
                    <option>Damaged</option>
                    <option>Update Information</option>
                </select>
            </div>

            <div class="bg-white lofi-border p-6">
                <p class="font-black uppercase text-sm mb-4">Supporting Document (Only if Stolen/Lost):</p>
                <label class="block border-4 border-dashed border-black p-10 text-center cursor-pointer hover:bg-gray-50">
                    <input type="file" class="hidden">
                    <span class="text-4xl font-black">+</span>
                    <p class="font-black uppercase text-xs">Upload Affidavit of Loss</p>
                </label>
            </div>
        </div>

        <div class="flex justify-between items-center bg-white p-5 border-4 border-black">
            <div class="font-black">
                <span class="text-xs uppercase text-gray-500">Total:</span>
                <p class="text-3xl">₱100.00</p>
            </div>
            <button class="bg-[#1747E7] text-white px-12 py-4 font-black text-xl border-4 border-black hover:bg-black">NEXT</button>
        </div>
    </form>
</div>
@endsection