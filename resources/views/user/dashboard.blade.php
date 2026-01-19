<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ServeIt - Dashboard</title>
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

.card:hover { transform: translate(-2px,-2px); box-shadow: 4px 4px 0px 0px #000; }

    ::-webkit-scrollbar { width: 12px; }
    ::-webkit-scrollbar-track { background: #FBF7EB; border-left: 4px solid #000; }
    ::-webkit-scrollbar-thumb { background: #000; border: 2px solid #FBF7EB; }

    body.dark-mode { background-color: #1b1b1b; color: #e0e0e0; }
    body.dark-mode aside, body.dark-mode .bg-white, body.dark-mode .progress-line, body.dark-mode main > div, body.dark-mode table th, body.dark-mode table td { background-color: #2a2a2a !important; color: #e0e0e0 !important; }
    body.dark-mode .lofi-border { border-color: #e0e0e0; }
    body.dark-mode .lofi-shadow { box-shadow: 6px 6px 0px 0px #e0e0e0; }
    body.dark-mode .bg-\[#FDF6CC\], body.dark-mode .bg-\[#FFD6D7\], body.dark-mode .bg-\[#BDDBFF\], body.dark-mode button.bg-\[#1747E7\] { background-color: #000 !important; color: #fff !important; }
    body.dark-mode .text-black { color: #e0e0e0 !important; }
    body.dark-mode .progress-line { background-color: #e0e0e0; }
    body.dark-mode .sidebar-link.bg-\[#1747E7\] { background-color: #000 !important; color: #fff !important; border-color: #e0e0e0; }
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
    <header class="flex justify-between items-start mb-10 text-black">
        <div>
            <h1 class="text-6xl font-black uppercase italic tracking-tighter mb-2">Dashboard</h1>
            <p class="text-xs font-bold uppercase leading-relaxed max-w-2xl opacity-80">
                Monitor the live status of your document requests. Refer to the <span class="underline underline-offset-2">'Help'</span> section for guidance.
            </p>
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

    <div class="relative mb-16 pt-4">
        <div class="progress-line"></div>
        <div class="grid grid-cols-5 gap-4 relative z-10 text-black">
            @foreach(range(1,5) as $i)
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 bg-white lofi-border rounded-2xl flex items-center justify-center mb-3 lofi-shadow">
                    <img src="{{ asset("images/status$i.png") }}" class="w-12 h-12">
                </div>
                <p class="font-black text-[9px] uppercase text-center leading-tight">
                    @if($i==1) Document Request<br>Submitted 
                    @elseif($i==2) Awaiting<br>Receipt Upload
                    @elseif($i==3) Payment<br>Verification
                    @elseif($i==4) Document<br>Processing
                    @else Ready for<br>Pickup @endif
                </p>
            </div>
            @endforeach
        </div>
    </div>

    <section>
        <div class="flex items-center gap-4 mb-6 text-black">
            <h2 class="text-3xl font-black uppercase italic shrink-0">Current Request Status</h2>
            <div class="h-1 w-full bg-black lofi-border"></div>
        </div>

        <div class="bg-white lofi-border lofi-shadow rounded-3xl overflow-hidden">
            <table class="w-full text-left text-black">
                <thead>
                    <tr class="bg-[#C4C4C4] border-b-4 border-black text-xs font-black uppercase text-black">
                        <th class="p-5 border-r-4 border-black">Reference Number</th>
                        <th class="p-5 border-r-4 border-black">Details</th>
                        <th class="p-5 border-r-4 border-black">Status</th>
                        <th class="p-5">Action Required</th>
                    </tr>
                </thead>
                <tbody class="font-bold text-sm text-black">
                    <tr class="border-black">
                        <td class="p-6 border-r-4 border-black">TICKET-2026-001</td>
                        <td class="p-6 border-r-4 border-black italic font-black">Transcript of Records (TOR)</td>
                        <td class="p-6 border-r-4 border-black">
                            <span class="bg-[#FFD6D7] text-black lofi-border px-3 py-1 rounded-full text-[10px] uppercase font-black">Awaiting Receipt</span>
                        </td>
                        <td class="p-6">
                            <p class="text-[10px] font-black uppercase mb-3">Kindly upload the Official Receipt below.</p>
                            <button class="w-full py-3 bg-[#FFD6D7] text-black lofi-border rounded-xl font-black uppercase text-[10px] hover:bg-black hover:text-white transition-all shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] active:shadow-none active:translate-x-1 active:translate-y-1">Upload Receipt +</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<script>
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
</script>

        @include('user.profile-overlay')
        @include('user.logout-modal')

</body>
</html>
