@extends('layouts.dashboard')

@section('content')
<div class="max-w-2xl mx-auto text-center py-20">
    <div class="mb-8">
        <img src="{{ asset('assets/images/t1.png') }}" class="h-32 mx-auto mb-6">
        <h1 class="text-5xl font-black uppercase mb-4">Your ticket has been submitted!</h1>
        <p class="text-xl font-bold text-gray-600">Check your dashboard for real-time status updates.</p>
    </div>

    <a href="/dashboard" class="inline-block bg-black text-white px-10 py-4 font-black uppercase border-4 border-black hover:bg-white hover:text-black transition-all">
        Back to Dashboard
    </a>
</div>
@endsection