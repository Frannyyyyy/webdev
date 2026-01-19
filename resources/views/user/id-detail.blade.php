@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto">
    <a href="/homepage" class="font-black underline uppercase mb-6 inline-block"><- Back to Documents</a>

    <div class="bg-white lofi-border lofi-shadow overflow-hidden">
        <div class="bg-[#1747E7] text-white p-4 font-black uppercase italic">
            Servelt: University Ticket Management System
        </div>
        
        <div class="p-10 flex gap-10">
            <div class="w-1/3 bg-gray-100 lofi-border aspect-square flex items-center justify-center">
                <img src="{{ asset('assets/images/info.img') }}" class="w-20 opacity-50">
            </div>
            
            <div class="flex-1 space-y-4">
                <h2 class="text-4xl font-black uppercase">Identification Card (ID)</h2>
                <div class="space-y-1 font-bold">
                    <p class="text-blue-600">Estimated Processing Time: 3-5 business days</p>
                    <p class="text-2xl">Price: ₱100.00</p>
                </div>
                <p class="italic text-gray-600 py-4 border-y-2 border-black border-dashed">
                    Please note that certain reasons for replacement may require supporting documents, such as an Affidavit of Loss.
                </p>
                <a href="/id-replacement/create" class="inline-block bg-black text-white px-12 py-4 font-black text-xl hover:bg-[#00C6AD]">CREATE A TICKET</a>
            </div>
        </div>
    </div>
</div>
@endsection