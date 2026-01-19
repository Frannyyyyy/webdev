@extends('layouts.admin-layouts')

@section('title', 'Admin Dashboard')

@section('content')
<div class="px-8 pt-8 pb-5">
    <h1 class="text-3xl font-black">Admin Dashboard</h1>
    <p class="font-bold text-gray-700">System Overview & Management</p>
</div>

<div class="border-t-[2px] border-black"></div>

<div class="px-8 py-6 space-y-10">
    <!-- Overview & System Config -->
    @include('admin.partials.dashboard-overview')
    @include('admin.partials.dashboard-config')
</div>
@endsection
