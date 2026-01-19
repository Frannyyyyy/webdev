@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-white lofi-border lofi-shadow overflow-hidden">
    <div class="bg-black text-white p-4 font-black uppercase tracking-widest">
        Required Ticket Details
    </div>

    <form action="{{ route('tickets.receipt') }}" method="POST" class="p-8 bg-[#BDDBFF] space-y-8">
        @csrf
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2"><h3 class="font-black border-b-2 border-black pb-1 uppercase">Student Information</h3></div>
            <div>
                <label class="block font-bold text-xs uppercase">Student ID:</label>
                <input type="text" value="2021-00000-MN-0" class="w-full border-2 border-black p-2 bg-gray-100 italic" readonly>
            </div>
            <div>
                <label class="block font-bold text-xs uppercase">Email Address:</label>
                <input type="email" value="sample@student.pup.edu.ph" class="w-full border-2 border-black p-2 bg-gray-100 italic" readonly>
            </div>
            <div class="col-span-2">
                <label class="block font-bold text-xs uppercase">Full Name:</label>
                <input type="text" value="DELA CRUZ, JUAN P." class="w-full border-2 border-black p-2 bg-gray-100 font-bold" readonly>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 pt-6 border-t-2 border-black">
            <div class="col-span-2"><h3 class="font-black border-b-2 border-black pb-1 uppercase">Request Details</h3></div>
            <div>
                <label class="block font-bold text-xs uppercase">QTY:</label>
                <div class="flex items-center">
                    <button type="button" class="border-2 border-black px-3 bg-white font-bold">-</button>
                    <input type="number" name="qty" value="1" class="w-16 border-y-2 border-black p-1 text-center font-black">
                    <button type="button" class="border-2 border-black px-3 bg-white font-bold">+</button>
                </div>
            </div>
            <div>
                <label class="block font-bold text-xs uppercase">Purpose of Request:</label>
                <input type="text" name="purpose" class="w-full border-2 border-black p-2 bg-white" placeholder="e.g. Employment">
            </div>
        </div>

        <div class="pt-6 border-t-2 border-black">
            <h3 class="font-black border-b-2 border-black pb-1 uppercase mb-4">Delivery Details</h3>
            <div class="space-y-2">
                <label class="flex items-center gap-3 p-3 bg-gray-200 border-2 border-black opacity-50">
                    <input type="checkbox" disabled> <span>Email (Not Available)</span>
                </label>
                <label class="flex items-center gap-3 p-3 bg-white border-2 border-black cursor-pointer">
                    <input type="checkbox" checked name="delivery" value="pickup"> <span class="font-bold">In-person Pick-up (Recommended)</span>
                </label>
            </div>
        </div>

        <div class="flex justify-between items-center bg-white p-4 border-4 border-black">
            <div>
                <span class="font-bold text-gray-500 uppercase text-xs">Total:</span>
                <p class="text-3xl font-black">₱100.00</p>
            </div>
            <button class="bg-[#1747E7] text-white px-12 py-4 font-black text-xl border-2 border-black hover:bg-black">NEXT</button>
        </div>
    </form>
</div>
@endsection