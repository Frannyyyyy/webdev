@extends('admin.admin-layouts')

@section('title', 'Admin Dashboard')

@section('sidebar-user', 'Admin') {{-- You can dynamically replace 'Admin' --}}

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-black mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Example Card -->
        <div class="bg-white border-[3px] border-black rounded-xl shadow-[4px_4px_0px_#000] p-6">
            <h2 class="font-black text-xl mb-2">Total Users</h2>
            <p class="text-2xl">123</p>
        </div>

        <div class="bg-white border-[3px] border-black rounded-xl shadow-[4px_4px_0px_#000] p-6">
            <h2 class="font-black text-xl mb-2">Active Sessions</h2>
            <p class="text-2xl">45</p>
        </div>

        <div class="bg-white border-[3px] border-black rounded-xl shadow-[4px_4px_0px_#000] p-6">
            <h2 class="font-black text-xl mb-2">Pending Tasks</h2>
            <p class="text-2xl">7</p>
        </div>
    </div>
</div>
@endsection
