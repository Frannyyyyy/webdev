<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Records - ServeIt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;700;900&display=swap');

        body { font-family: 'Public Sans', sans-serif; transition: background-color 0.3s, color 0.3s; }
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); }
        .sidebar-link:hover { background-color: #BDDBFF; transform: translate(-2px, -2px); box-shadow: 4px 4px 0px 0px #000; }
        
        ::-webkit-scrollbar { width: 12px; }
        ::-webkit-scrollbar-track { background: #FBF7EB; border-left: 4px solid #000; }
        ::-webkit-scrollbar-thumb { background: #000; border: 2px solid #FBF7EB; }

        .status-in-progress { background-color: #FDE047; }
        .status-cancelled { background-color: #F87171; }
        .status-completed { background-color: #2DD4BF; }

        body.dark-mode { background-color: #1b1b1b; color: #e0e0e0; }
        body.dark-mode .bg-white { background-color: #2a2a2a !important; color: #e0e0e0; }
        body.dark-mode .bg-[#FDF6CC] { background-color: #3b3b3b !important; color: #e0e0e0; }
        body.dark-mode .lofi-border { border-color: #e0e0e0; }
        body.dark-mode .lofi-shadow { box-shadow: 8px 8px 0px 0px #e0e0e0; }
        body.dark-mode .text-black { color: #e0e0e0; }
        body.dark-mode .bg-[#C4C4C4] { background-color: #444 !important; color: #fff; }
        body.dark-mode tr.bg-[#F9F9F9] { background-color: #333 !important; }
        body.dark-mode input { background-color: #2a2a2a; color: #fff; }
        body.dark-mode .sidebar-link.bg-[#1747E7] { background-color: #000 !important; color: #fff !important; }
    </style>
</head>
<body class="bg-[#FBF7EB] min-h-screen flex text-black overflow-hidden">

    <aside class="w-80 bg-[#FDF6CC] lofi-border flex flex-col h-screen p-8 justify-between shrink-0">
        <div>
            <div class="flex items-center gap-4 mb-12">
                <div onclick="toggleProfile()" class="w-16 h-16 bg-[#D9D6D2] lofi-border rounded-full flex items-center justify-center overflow-hidden cursor-pointer hover:scale-105 transition-transform">
                    <img src="{{ asset('images/studentlogo.png') }}" class="w-full h-full object-cover">
                </div>
                <div>
                    <span class="font-black text-2xl uppercase italic block leading-none">Anon</span>
                    <span class="text-[10px] font-bold uppercase opacity-60">Student Account</span>
                </div>
            </div>

            <nav class="space-y-3">
                <a href="{{ route('user.homepage') }}" 
                   class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.homepage') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
                    <img src="{{ asset('images/side.home.png') }}" class="w-6 {{ request()->routeIs('user.homepage') ? 'invert' : '' }}"> Homepage
                </a>

                <a href="{{ route('user.dashboard') }}" 
                   class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.dashboard') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
                    <img src="{{ asset('images/side.dashboard.png') }}" class="w-6 {{ request()->routeIs('user.dashboard') ? 'invert' : '' }}"> Dashboard
                </a>

                <a href="{{ route('user.document-list') }}" 
                   class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.document-list') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
                    <img src="{{ asset('images/side.docu.png') }}" class="w-6 {{ request()->routeIs('user.document-list') ? 'invert' : '' }}"> Document List
                </a>

                <a href="{{ route('user.records') }}" 
                   class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.records') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
                    <img src="{{ asset('images/side.records.png') }}" class="w-6 {{ request()->routeIs('user.records') ? 'invert' : '' }}"> Records
                </a>

                <a href="{{ route('user.help') }}" 
                   class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.help') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
                    <img src="{{ asset('images/side.help.png') }}" class="w-6 {{ request()->routeIs('user.help') ? 'invert' : '' }}"> Help
                </a>
            </nav>
        </div>

        <div class="space-y-6">
            <button onclick="openLogout()" class="w-full flex items-center gap-4 p-4 lofi-border rounded-xl bg-white font-black uppercase hover:bg-red-400 transition-all text-black">
                <img src="{{ asset('images/side.logout.png') }}" class="w-6"> Logout
            </button>
            
            <div class="text-[10px] font-bold uppercase space-y-1 opacity-70">
                <p>Email: support@example.com</p>
                <p>Phone: +63 9123456789</p>
                <p>Address: 123 Sample Street, Manila, Philippines</p>
                <p class="pt-2">Office Hours: Mon-Fri, 9AM-5PM</p>
            </div>
        </div>
    </aside>

    <main class="flex-1 p-12 overflow-y-auto">
        <header class="flex justify-between items-start mb-10">
            <div>
                <h1 class="text-6xl font-black uppercase italic tracking-tighter mb-2">List of Transactions</h1>
                <p class="text-xs font-bold uppercase opacity-80">Track and manage your history of requested university documents.</p>
            </div>
            <div class="flex flex-col items-end gap-4">
                <div id="theme-toggle" class="flex items-center gap-2 bg-white lofi-border p-1 px-3 rounded-full cursor-pointer text-black">
                    <div class="w-3 h-3 bg-black rounded-full"></div>
                    <span class="font-black text-[10px] uppercase">Light</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-black text-xl italic uppercase">Serve It</span>
                    <img src="{{ asset('images/logo.png') }}" class="h-8">
                </div>
            </div>
        </header>

        <div class="mb-8 max-w-xl">
            <div class="relative">
                <input type="text" id="searchInput" placeholder="SEARCH TICKET ID (E.G., #TOR-2026-01)..." 
                    class="w-full p-4 pl-12 lofi-border lofi-shadow rounded-2xl font-black uppercase text-sm outline-none focus:ring-4 focus:ring-[#1747E7] transition-all">
                <svg class="w-6 h-6 absolute left-4 top-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <div class="bg-white lofi-border lofi-shadow rounded-3xl overflow-hidden">
            <table class="w-full text-left text-black">
                <thead>
                    <tr class="bg-[#C4C4C4] border-b-4 border-black text-xs font-black uppercase text-black">
                        <th class="p-5 border-r-4 border-black">Ticket ID</th>
                        <th class="p-5 border-r-4 border-black">Document Type</th>
                        <th class="p-5 border-r-4 border-black">Date Filed</th>
                        <th class="p-5 border-r-4 border-black">Status</th>
                        <th class="p-5">Action</th>
                    </tr>
                </thead>
                <tbody class="font-bold text-sm uppercase italic">
                    <tr class="border-b-4 border-black">
                        <td class="p-6 border-r-4 border-black">TICKET-2026-001</td>
                        <td class="p-6 border-r-4 border-black font-black">Transcript of Records (TOR)</td>
                        <td class="p-6 border-r-4 border-black">2026-01-01 | 3:30 PM</td>
                        <td class="p-6 border-r-4 border-black">
                            <span class="status-in-progress text-black lofi-border px-4 py-1 rounded-full text-[10px] font-black">In Progress</span>
                        </td>
                        <td class="p-6">
                            <button class="bg-[#1747E7] text-white lofi-border px-4 py-2 rounded-xl text-[10px] font-black hover:bg-black transition-colors shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                                View Details
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b-4 border-black bg-[#F9F9F9]">
                        <td class="p-6 border-r-4 border-black">TICKET-2025-088</td>
                        <td class="p-6 border-r-4 border-black font-black">Good Moral Certificate</td>
                        <td class="p-6 border-r-4 border-black">2025-12-15 | 10:00 AM</td>
                        <td class="p-6 border-r-4 border-black">
                            <span class="status-completed text-black lofi-border px-4 py-1 rounded-full text-[10px] font-black">Completed</span>
                        </td>
                        <td class="p-6">
                            <button class="bg-[#1747E7] text-white lofi-border px-4 py-2 rounded-xl text-[10px] font-black hover:bg-black transition-colors shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                                View Details
                            </button>
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <td class="p-6 border-r-4 border-black">TICKET-2025-042</td>
                        <td class="p-6 border-r-4 border-black font-black">Diploma (Duplicate)</td>
                        <td class="p-6 border-r-4 border-black">2025-11-20 | 1:15 PM</td>
                        <td class="p-6 border-r-4 border-black">
                            <span class="status-cancelled text-black lofi-border px-4 py-1 rounded-full text-[10px] font-black">Cancelled</span>
                        </td>
                        <td class="p-6">
                            <button class="bg-[#1747E7] text-white lofi-border px-4 py-2 rounded-xl text-[10px] font-black hover:bg-black transition-colors shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                                View Details
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex justify-between items-center">
            <p class="text-[10px] font-black uppercase opacity-50 italic">Showing 3 of 3 transactions</p>
            <div class="flex gap-2 text-black">
                <button class="w-10 h-10 lofi-border bg-white flex items-center justify-center font-black hover:bg-black hover:text-white transition-all shadow-[4px_4px_0px_0px_#000]"> < </button>
                <button class="w-10 h-10 lofi-border bg-black text-white flex items-center justify-center font-black shadow-[4px_4px_0px_0px_#000]"> 1 </button>
                <button class="w-10 h-10 lofi-border bg-white flex items-center justify-center font-black hover:bg-black hover:text-white transition-all shadow-[4px_4px_0px_0px_#000]"> > </button>
            </div>
        </div>
    </main>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const themeDot = themeToggle.querySelector('div');
        const themeLabel = themeToggle.querySelector('span');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const isDark = body.classList.contains('dark-mode');
            themeDot.classList.toggle('bg-black', !isDark);
            themeDot.classList.toggle('bg-white', isDark);
            themeLabel.innerText = isDark ? 'Dark' : 'Light';
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });

        window.addEventListener('DOMContentLoaded', () => {
            if(localStorage.getItem('theme') === 'dark') {
                body.classList.add('dark-mode');
                themeDot.classList.remove('bg-black');
                themeDot.classList.add('bg-white');
                themeLabel.innerText = 'Dark';
            }

            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('tbody tr');
            searchInput.addEventListener('keyup', () => {
                const term = searchInput.value.toUpperCase();
                rows.forEach(row => {
                    const text = row.innerText.toUpperCase();
                    row.style.display = text.includes(term) ? '' : 'none';
                });
            });
        });
    </script>
        
        @include('user.profile-overlay')
        @include('user.logout-modal')

</body>
</html>
