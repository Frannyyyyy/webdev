@extends('layouts.dashboard')

@section('content')
<div class="max-w-md mx-auto bg-white lofi-border lofi-shadow">
    <div class="p-6 text-center border-b-4 border-black bg-[#FFFE65]">
        <h2 class="text-xl font-black uppercase">Kindly settle your bill in the registrar</h2>
    </div>

    <div class="p-8 space-y-6">
        <div class="flex justify-between border-b-2 border-dashed border-black pb-2">
            <span class="font-bold text-gray-600">Document:</span>
            <span class="font-black text-right">Certificate of Enrollment (COR)</span>
        </div>
        <div class="flex justify-between border-b-2 border-dashed border-black pb-2">
            <span class="font-bold text-gray-600">Document Fee:</span>
            <span class="font-black">₱100.00</span>
        </div>
        
        <div class="bg-gray-100 p-4 text-xs italic border-2 border-black">
            Please present this ticket ID at the cashier window for payment verification.
        </div>

        <form action="{{ route('tickets.success') }}" method="GET">
            <button class="w-full bg-black text-white py-4 font-black uppercase text-xl hover:bg-[#00C6AD]">
                SUBMIT
            </button>
        </form>
    </div>
</div>
@endsection