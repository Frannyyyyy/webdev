<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ServeIt - Homepage</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;700;900&display=swap');

        body { font-family: 'Public Sans', sans-serif; transition: background-color 0.3s, color 0.3s; }
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); }

        .sidebar-link:hover { 
            background-color: #BDDBFF; 
            transform: translate(-2px, -2px); 
            box-shadow: 4px 4px 0px 0px #000; 
        }

        .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .card-hover:hover { transform: translate(-4px,-4px); box-shadow: 12px 12px 0px 0px #000; }
        
        .card-hover:has(.details-panel:not(.hidden)) { transform: translate(-4px,-4px); box-shadow: 12px 12px 0px 0px #000; }

        ::-webkit-scrollbar { width: 12px; }
        ::-webkit-scrollbar-track { background: #FBF7EB; border-left: 4px solid #000; }
        ::-webkit-scrollbar-thumb { background: #000; border: 2px solid #FBF7EB; }

        body.dark-mode { background-color: #1b1b1b; color: #e0e0e0; }
        body.dark-mode aside, body.dark-mode .bg-white { background-color: #2a2a2a !important; color: #e0e0e0 !important; }
        body.dark-mode .lofi-border { border-color: #e0e0e0; }
        body.dark-mode .lofi-shadow { box-shadow: 8px 8px 0px 0px #e0e0e0; }
        body.dark-mode .text-black { color: #e0e0e0 !important; }
        body.dark-mode a.bg-\[#BDDBFF\], body.dark-mode a.bg-\[#00C6AD\], body.dark-mode a.bg-\[#FFD6D7\] { color: #fff !important; background-color: #000 !important; }
        body.dark-mode .sidebar-link.bg-\[#1747E7\] { background-color: #000 !important; color: #fff !important; border-color: #e0e0e0; }
        body.dark-mode .card-hover:hover, body.dark-mode .card-hover:has(.details-panel:not(.hidden)) { box-shadow: 12px 12px 0px 0px #e0e0e0; }
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
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-6xl font-black uppercase italic tracking-tighter">Select a service below.</h1>
            <div class="mt-4 bg-white lofi-border p-4 rounded-3xl max-w-2xl italic font-bold border-l-[12px] border-l-[#1747E7]">
                Note: Some requests may require uploading supporting files (e.g., Affidavit of Loss or Clearance).
            </div>
        </div>
        
        <div class="flex flex-col items-end gap-4 text-black">
            <div id="theme-toggle" class="flex items-center gap-2 bg-white lofi-border p-1 px-3 rounded-full cursor-pointer">
                <div class="w-3 h-3 bg-black rounded-full"></div>
                <span class="font-black text-[10px] uppercase">Light</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="font-black text-xl italic uppercase">Serve It</span>
                <img src="{{ asset('images/logo.png') }}" class="h-12">
            </div>
        </div>
    </header>

    <div class="grid grid-cols-2 gap-8 max-w-4xl items-start">
        <div class="bg-[#00C6AD] p-10 rounded-3xl lofi-border lofi-shadow card-hover flex flex-col items-center text-black relative">
            <span class="text-6xl mb-4 pointer-events-none">📄</span>
            <span class="text-3xl font-black uppercase mb-4 text-center pointer-events-none">Request a Document</span>
            <button class="bg-white lofi-border px-6 py-2 rounded-xl font-black uppercase text-xs hover:bg-black hover:text-white transition-all text-black z-10" 
                onclick="toggleDetails('doc-details')">
                Details
            </button>
            <div id="doc-details" class="details-panel mt-4 p-4 bg-white lofi-border rounded-2xl shadow-lg hidden text-black max-w-xs text-sm z-10">
                <p><strong>Description:</strong> Access and request official academic certifications and records like TOR, COR, or Good Moral.</p>
                <p class="mt-2"><strong>Fee:</strong> ₱50 per document</p>
                <p><strong>Requirements:</strong> Student ID, completed request form</p>
                <p><strong>Processing Time:</strong> 2-3 business days</p>
            </div>
        </div>

        <div class="bg-[#FF6B6B] p-10 rounded-3xl lofi-border lofi-shadow card-hover flex flex-col items-center text-black relative">
            <span class="text-6xl mb-4 pointer-events-none">🪪</span>
            <span class="text-3xl font-black uppercase mb-4 text-center pointer-events-none">ID Replacement</span>
            <button class="bg-white lofi-border px-6 py-2 rounded-xl font-black uppercase text-xs hover:bg-black hover:text-white transition-all text-black z-10" 
                onclick="toggleDetails('id-details')">
                Details
            </button>
            <div id="id-details" class="details-panel mt-4 p-4 bg-white lofi-border rounded-2xl shadow-lg hidden text-black max-w-xs text-sm z-10">
                <p><strong>Description:</strong> Apply for a new Student ID card if yours has been lost, stolen, or damaged.</p>
                <p class="mt-2"><strong>Fee:</strong> ₱100.00</p>
                <p><strong>Requirements:</strong> Affidavit of Loss (if stolen/lost)</p>
                <p><strong>Processing Time:</strong> 3-5 business days</p>
            </div>
        </div>
    </div>
</main>

<script>
/* Theme and Toggle Logic ... */
const themeToggle = document.getElementById('theme-toggle');
const themeDot = themeToggle.querySelector('div');
const themeLabel = themeToggle.querySelector('span');

themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const isDark = document.body.classList.contains('dark-mode');
    themeDot.classList.toggle('bg-black', !isDark);
    themeDot.classList.toggle('bg-white', isDark);
    themeLabel.innerText = isDark ? 'Dark' : 'Light';
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
});

window.addEventListener('DOMContentLoaded', () => {
    if(localStorage.getItem('theme') === 'dark'){
        document.body.classList.add('dark-mode');
        themeDot.classList.remove('bg-black');
        themeDot.classList.add('bg-white');
        themeLabel.innerText = 'Dark';
    }
});

function toggleDetails(id) {
    const panel = document.getElementById(id);
    panel.classList.toggle('hidden');
}
</script>

        @include('user.profile-overlay')
        @include('user.logout-modal')

</body>
</html>
