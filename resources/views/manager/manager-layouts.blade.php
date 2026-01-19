<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'ServeIt - Manager Dashboard')</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;700;900&display=swap');

    body { 
        font-family: 'Public Sans', sans-serif; 
        transition: background-color 0.3s, color 0.3s; 
    }

    /* LOFI STYLES */
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

    /* DARK MODE */
    body.dark-mode { background-color: #1b1b1b; color: #e0e0e0; }
    body.dark-mode aside, body.dark-mode .bg-white, body.dark-mode main > div, 
    body.dark-mode table th, body.dark-mode table td { background-color: #2a2a2a !important; color: #e0e0e0 !important; }
    body.dark-mode .lofi-border { border-color: #e0e0e0; }
    body.dark-mode .lofi-shadow { box-shadow: 6px 6px 0px 0px #e0e0e0; }
    body.dark-mode .bg-\[#FDF6CC\], body.dark-mode .bg-\[#FFD6D7\], 
    body.dark-mode .bg-\[#BDDBFF\], body.dark-mode button.bg-\[#1747E7\] { 
        background-color: #000 !important; color: #fff !important; 
    }
    body.dark-mode .text-black { color: #e0e0e0 !important; }

    /* GRADIENT BACKGROUND */
    #gradientBackground {
        position: fixed;
        inset: 0;
        z-index: -1;
        background: linear-gradient(270deg, #FF416C, #FF4B2B, #1FA2FF, #12D8FA);
        background-size: 800% 800%;
        transition: background 0.3s;
    }

</style>
</head>

<body class="bg-[#FBF7EB] text-black flex">

<!-- GRADIENT BACKGROUND -->
<div id="gradientBackground"></div>

<!-- SIDEBAR -->
<aside class="w-64 bg-white h-screen p-6 border-r-4 border-black lofi-shadow flex flex-col">
    <h2 class="text-3xl font-black mb-10">ServeIt</h2>

    {{-- User Card & Timers --}}
    <div class="mb-6 flex flex-col gap-3">
        <div class="lofi-border lofi-shadow rounded-full px-4 py-2 flex items-center justify-between">
            <span class="font-black uppercase">@yield('sidebar-user', 'Manager')</span>
            <i class="fa-solid fa-user"></i>
        </div>

        {{-- Real-time Clock --}}
        <div class="lofi-border lofi-shadow rounded-full px-4 py-2 flex flex-col">
            <span class="text-xs font-bold opacity-70 uppercase">Current Time</span>
            <span id="real-time-clock" class="font-black text-orange-500">00:00:00 AM</span>
        </div>

        {{-- Session Timer --}}
        <div class="lofi-border lofi-shadow rounded-full px-4 py-2 flex flex-col">
            <span class="text-xs font-bold opacity-70 uppercase">Session Duration</span>
            <span id="session-timer" class="font-black text-orange-500">00:00:00</span>
        </div>
    </div>

    <nav class="flex flex-col gap-4 flex-1">
        <a href="{{ route('manager.dashboard') }}" class="sidebar-link bg-[#1747E7] text-white font-bold px-4 py-2 rounded lofi-shadow">Dashboard</a>
        <a href="{{ route('manager.tickets') }}" class="sidebar-link px-4 py-2 rounded lofi-shadow">Tickets</a>
        <a href="{{ route('manager.agents') }}" class="sidebar-link px-4 py-2 rounded lofi-shadow">Agents</a>
    </nav>

    {{-- Logout Button --}}
    <button type="button" onclick="openLogoutModal()" class="sidebar-link px-4 py-2 rounded lofi-shadow w-full text-left mt-4">
        Logout
    </button>
</aside>

<!-- MAIN AREA -->
<div class="flex-1 flex flex-col min-h-screen">
    <!-- HEADER -->
    <header class="p-6 bg-white shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] border-b-4 border-black flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-5xl font-black mb-1">Support Manager Dashboard</h1>
            <p class="text-xl font-medium text-gray-800 italic">Operational Command Center</p>
        </div>
        <div class="flex items-center gap-4">
            <!-- DARK/LIGHT MODE TOGGLE -->
            <button id="modeToggle" class="px-4 py-2 bg-black text-white font-bold rounded lofi-shadow hover:bg-gray-800">
                Toggle Dark/Light
            </button>

            <!-- GRADIENT SLIDER -->
            <div class="flex items-center gap-2">
                <label for="gradientSlider" class="font-bold text-sm">Gradient</label>
                <input type="range" id="gradientSlider" min="0" max="100" value="50" class="w-48">
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="p-6 flex-1 overflow-auto">
        @yield('content')
    </main>
</div>

<!-- LOGOUT MODAL -->
<div id="logoutModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div id="logoutCard" class="bg-[#FBF7EB] lofi-border lofi-shadow rounded-3xl w-full max-w-md p-8 transform scale-75 opacity-0 transition-all duration-300 ease-out">
        <h2 class="text-3xl font-black uppercase text-center mb-4">Exit Dashboard?</h2>
        <p class="text-center font-bold text-gray-700 mb-8">Are you sure you want to log out and return to role selection?</p>
        <div class="flex gap-4">
            <button onclick="closeLogoutModal()" class="flex-1 py-3 bg-white lofi-border font-black uppercase hover:bg-gray-100">Cancel</button>
            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <input type="hidden" name="redirect_to" value="{{ route('login.selection') }}">
                <button type="submit" class="w-full py-3 bg-black text-white lofi-border font-black uppercase hover:bg-red-600">Yes, Exit</button>
            </form>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script>
    const sessionTimerEl = document.getElementById('session-timer');
    const realTimeClockEl = document.getElementById('real-time-clock');
    const modeToggle = document.getElementById('modeToggle');
    const gradientBg = document.getElementById('gradientBackground');
    const gradientSlider = document.getElementById('gradientSlider');

    // Persistent session using localStorage
    if (!localStorage.getItem('sessionStart')) {
        localStorage.setItem('sessionStart', new Date().getTime());
    }

    function updateTimers() {
        const now = new Date();
        const startTime = parseInt(localStorage.getItem('sessionStart'));

        // Real-time clock
        realTimeClockEl.textContent = now.toLocaleTimeString([], {
            hour: '2-digit', minute: '2-digit', second: '2-digit'
        });

        // Session timer
        let diff = Math.floor((now.getTime() - startTime) / 1000);
        const hours = String(Math.floor(diff / 3600)).padStart(2, '0');
        diff %= 3600;
        const minutes = String(Math.floor(diff / 60)).padStart(2, '0');
        const seconds = String(diff % 60).padStart(2, '0');

        sessionTimerEl.textContent = `${hours}:${minutes}:${seconds}`;
    }

    setInterval(updateTimers, 1000);
    updateTimers();

    // LOGOUT MODAL FUNCTIONS
    function openLogoutModal() {
        const modal = document.getElementById('logoutModal');
        const card = document.getElementById('logoutCard');
        modal.classList.remove('hidden'); modal.classList.add('flex');
        requestAnimationFrame(() => {
            card.classList.remove('scale-75', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        });
    }

    function closeLogoutModal() {
        const modal = document.getElementById('logoutModal');
        const card = document.getElementById('logoutCard');
        card.classList.add('scale-75', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden'); modal.classList.remove('flex');
        }, 300);
    }

    // DARK/LIGHT MODE TOGGLE
    modeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
        updateGradient();
    });

    // Preserve mode on reload
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
    }

    // GRADIENT COLORS
    const lightGradient = ['#FF416C', '#FF4B2B', '#1FA2FF', '#12D8FA'];
    const darkGradient = ['#0F0C29', '#302B63', '#24243e', '#ff512f'];

    function updateGradient() {
        const colors = document.body.classList.contains('dark-mode') ? darkGradient : lightGradient;
        const pos = gradientSlider.value;
        const stops = colors.map((c, i) => {
            const step = i * (100 / (colors.length - 1));
            const adjusted = step * (pos / 100);
            return `${c} ${adjusted}%`;
        }).join(', ');
        gradientBg.style.background = `linear-gradient(270deg, ${stops})`;
    }

    // Slider input
    gradientSlider.addEventListener('input', updateGradient);

    // Initialize gradient
    updateGradient();

</script>
</body>
</html>
