@extends('agent.agent-layout')

@section('title', 'Ticket Details')

@section('content')

<a href="{{ route('agent.dashboard') }}"
   class="inline-block mb-6 font-black uppercase border-4 border-black px-6 py-2 bg-white hover:bg-gray-100 lofi-shadow">
    ← Back to Dashboard
</a>

<div class="max-w-5xl mx-auto grid grid-cols-3 gap-8">

    {{-- Student Profile --}}
    <div class="col-span-1 space-y-6">
        <div class="bg-white lofi-border lofi-shadow p-6">
            <div class="w-20 h-20 bg-gray-200 lofi-border mx-auto mb-4 overflow-hidden">
                <img src="{{ asset('assets/images/studentlogo.png') }}">
            </div>

            <h3 class="font-black text-center uppercase border-b-2 border-black pb-2">
                Student Profile
            </h3>

            <div class="mt-4 space-y-2 text-xs font-bold uppercase">
                <p><span class="text-gray-500">Name:</span> {{ $ticket['student_name'] }}</p>
                <p><span class="text-gray-500">ID:</span> {{ $ticket['student_id'] }}</p>
            </div>
        </div>
    </div>

    {{-- Ticket Details --}}
    <div class="col-span-2 bg-white lofi-border lofi-shadow overflow-hidden flex flex-col">

        <div class="bg-black text-white p-4 font-black uppercase">
            Ticket: #{{ $ticket['id'] }}
        </div>

        <div class="p-8 space-y-6 flex-1">

            <div class="bg-[#FBF7EB] lofi-border p-4">
                <p class="text-xs font-black uppercase text-gray-400">Requesting:</p>
                <p class="text-xl font-black uppercase">
                    {{ $ticket['document'] }}
                </p>
            </div>

            <div>
                <label class="block font-black uppercase mb-2">
                    Update Ticket Status:
                </label>

                <select class="w-full border-4 border-black p-4 font-black bg-[#FFFE65]">
                    <option {{ $ticket['status'] === 'Payment Verification' ? 'selected' : '' }}>
                        Payment Verification
                    </option>
                    <option>Document Processing</option>
                    <option>Ready for Pickup</option>
                    <option>Escalate to Manager</option>
                </select>
            </div>

            <button class="w-full bg-black text-white py-4 font-black uppercase text-xl hover:bg-[#1747E7]">
                Update & Notify Student
            </button>

        </div>
    </div>

</div>
@endsection
