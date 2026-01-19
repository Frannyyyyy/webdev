@extends('manager.manager-layouts')

@section('content')
    <h2 class="text-3xl font-bold mb-6">All Tickets</h2>

    <!-- Example tickets table -->
    <table class="w-full border-collapse border border-black">
        <thead>
            <tr>
                <th class="border border-black px-4 py-2">ID</th>
                <th class="border border-black px-4 py-2">Title</th>
                <th class="border border-black px-4 py-2">Status</th>
                <th class="border border-black px-4 py-2">Agent</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-black px-4 py-2">1</td>
                <td class="border border-black px-4 py-2">Ticket Example</td>
                <td class="border border-black px-4 py-2">Open</td>
                <td class="border border-black px-4 py-2">John Doe</td>
            </tr>
            <!-- Add more tickets dynamically later -->
        </tbody>
    </table>
@endsection
