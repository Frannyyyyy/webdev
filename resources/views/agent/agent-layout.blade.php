<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Support Agent Dashboard')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@400;700;900&display=swap');

        body { 
            font-family: 'Lexend', sans-serif; 
            background-color: #FBF7EB; 
            transition: background-color 0.3s, color 0.3s;
        }

        /* LOFI STYLES */
        .lofi-border { border: 3px solid black; }
        .lofi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); }

        .custom-scroll::-webkit-scrollbar { width: 8px; }
        .custom-scroll::-webkit-scrollbar-thumb { background: black; border-radius: 10px; }

        /* Session & real-time display */
        .timer-card { padding: 0.75rem 1rem; border: 3px solid black; box-shadow: 4px 4px 0px 0px #000; border-radius: 1rem; background: white; font-weight: 900; }
        .timer-title { font-size: 10px; text-transform: uppercase; opacity: 0.6; line-height: 1; margin-bottom: 0.25rem; }
        .timer-value { font-size: 1.25rem; font-variant-numeric: tabular-nums; color: #F97316; }

        /* DARK MODE */
        body.dark-mode { background-color: #1b1b1b; color: #e0e0e0; }
        body.dark-mode aside, body.dark-mode main { background-color: #2a2a2a !important; color: #e0e0e0 !important; }
        body.dark-mode .lofi-border { border-color: #e0e0e0; }
        body.dark-mode .lofi-shadow { box-shadow: 6px 6px 0px 0px #e0e0e0; }
        body.dark-mode .timer-card { background-color: #1f1f1f; color: #e0e0e0; border-color: #e0e0e0; }

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

<body class="h-screen overflow-hidden p-6 bg-[#FBF7EB]">

<!-- GRADIENT BACKGROUND -->
<div id="gradientBackground"></div>

<div class="h-full w-full lofi-border bg-white rounded-[40px] flex overflow-hidden lofi-shadow">

    {{-- Sidebar --}}
    <aside class="w-72 border-r-[3px] border-black p-6 flex flex-col gap-6 bg-[#FBF7EB]">

        {{-- User Card --}}
        <div class="bg-[#D1D5DB] lofi-border rounded-full py-3 px-6 flex items-center gap-3 lofi-shadow">
            <div class="bg-white rounded-full p-1 border-2 border-black overflow-hidden">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Agent" class="w-7 h-7">
            </div>
            <span class="font-black text-sm uppercase">@yield('sidebar-user', 'Support Agent')</span>
        </div>

        {{-- Real-time & Session Timer --}}
        <div class="flex flex-col gap-3">
            <div class="timer-card">
                <div class="timer-title">Current Time</div>
                <div id="real-time-clock" class="timer-value">00:00:00 AM</div>
            </div>
            <div class="timer-card">
                <div class="timer-title">Session Duration</div>
                <div id="session-timer" class="timer-value">00:00:00</div>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex flex-col gap-4 mt-4">
            <a href="{{ route('agent.dashboard') }}"
               class="{{ request()->routeIs('agent.dashboard') ? 'bg-[#F97316]' : 'bg-white hover:bg-gray-50' }}
                      lofi-border rounded-xl py-3 px-6 flex items-center gap-3 lofi-shadow">
                <i class="fa-solid fa-house text-sm"></i>
                <span class="font-black text-sm">Dashboard</span>
            </a>

            <a href="{{ route('agent.history') }}"
               class="{{ request()->routeIs('agent.history') ? 'bg-[#F97316]' : 'bg-white hover:bg-gray-50' }}
                      lofi-border rounded-xl py-3 px-6 flex items-center gap-3 lofi-shadow">
                <i class="fa-solid fa-clock-rotate-left text-sm"></i>
                <span class="font-black text-sm">My History</span>
            </a>
        </nav>

        {{-- Logout Button --}}
        <div class="mt-auto">
            <button type="button"
                    onclick="openLogoutModal()"
                    class="w-full bg-white lofi-border rounded-xl py-3 px-6 flex items-center gap-3 lofi-shadow hover:bg-red-50">
                <i class="fa-solid fa-power-off text-[#F97316]"></i>
                <span class="font-black text-sm">Logout</span>
            </button>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 flex flex-col h-full bg-white overflow-y-auto custom-scroll p-10">
        
        {{-- Dark Mode Toggle + Gradient Slider --}}
        <div class="flex items-center justify-end gap-4 mb-6">
            <button id="modeToggle" class="px-4 py-2 bg-black text-white font-bold rounded lofi-shadow hover:bg-gray-800">
                Toggle Dark/Light
            </button>

            <div class="flex items-center gap-2">
                <label for="gradientSlider" class="font-bold text-sm">Gradient</label>
                <input type="range" id="gradientSlider" min="0" max="100" value="50" class="w-48">
            </div>
        </div>

        @yield('content')
    </main>
</div>

{{-- LOGOUT MODAL --}}
<div id="logoutModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div id="logoutCard"
         class="bg-[#FBF7EB] lofi-border lofi-shadow rounded-3xl w-full max-w-md p-8
                transform scale-75 opacity-0 transition-all duration-300 ease-out">

        <h2 class="text-3xl font-black uppercase text-center mb-4">
            Exit Dashboard?
        </h2>

        <p class="text-center font-bold text-gray-700 mb-8">
            Are you sure you want to log out and return to role selection?
        </p>

        <div class="flex gap-4">
            <button onclick="closeLogoutModal()"
                    class="flex-1 py-3 bg-white lofi-border font-black uppercase hover:bg-gray-100">
                Cancel
            </button>

            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <input type="hidden" name="redirect_to" value="{{ route('login.selection') }}">
                <button type="submit"
                        class="w-full py-3 bg-black text-white lofi-border font-black uppercase hover:bg-red-600">
                    Yes, Exit
                </button>
            </form>
        </div>
    </div>
</div>

{{-- SESSION TIMER & REAL-TIME CLOCK + DARK MODE + GRADIENT --}}
<script>
    const sessionTimerEl = document.getElementById('session-timer');
    const realTimeClockEl = document.getElementById('real-time-clock');
    const modeToggle = document.getElementById('modeToggle');
    const gradientSlider = document.getElementById('gradientSlider');
    const gradientBg = document.getElementById('gradientBackground');

    // Persistent session start
    if (!localStorage.getItem('sessionStart')) {
        localStorage.setItem('sessionStart', new Date().getTime());
    }

    function updateTimers() {
        const now = new Date();
        const startTime = parseInt(localStorage.getItem('sessionStart'));
        // Real-time clock
        realTimeClockEl.textContent = now.toLocaleTimeString([], {hour:'2-digit', minute:'2-digit', second:'2-digit'});
        // Session timer
        let diff = Math.floor((now.getTime() - startTime)/1000);
        const hours = String(Math.floor(diff/3600)).padStart(2,'0');
        diff %= 3600;
        const minutes = String(Math.floor(diff/60)).padStart(2,'0');
        const seconds = String(diff%60).padStart(2,'0');
        sessionTimerEl.textContent = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateTimers,1000);
    updateTimers();

    // Logout Modal
    function openLogoutModal() {
        const modal = document.getElementById('logoutModal');
        const card = document.getElementById('logoutCard');
        modal.classList.remove('hidden'); modal.classList.add('flex');
        requestAnimationFrame(()=>{card.classList.remove('scale-75','opacity-0'); card.classList.add('scale-100','opacity-100');});
    }
    function closeLogoutModal() {
        const modal = document.getElementById('logoutModal');
        const card = document.getElementById('logoutCard');
        card.classList.add('scale-75','opacity-0');
        setTimeout(()=>{modal.classList.add('hidden'); modal.classList.remove('flex');},300);
    }

    // Dark Mode Toggle
    modeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
        updateGradient();
    });

    if(localStorage.getItem('darkMode')==='true') document.body.classList.add('dark-mode');

    // Gradient
    const lightGradient = ['#FF416C','#FF4B2B','#1FA2FF','#12D8FA'];
    const darkGradient = ['#0F0C29','#302B63','#24243e','#ff512f'];

    function updateGradient() {
        const colors = document.body.classList.contains('dark-mode') ? darkGradient : lightGradient;
        const pos = gradientSlider.value;
        const stops = colors.map((c,i)=>{
            const step = i*(100/(colors.length-1));
            const adjusted = step*(pos/100);
            return `${c} ${adjusted}%`;
        }).join(', ');
        gradientBg.style.background = `linear-gradient(270deg, ${stops})`;
    }
    gradientSlider.addEventListener('input',updateGradient);
    updateGradient();
</script>

@stack('scripts')
</body>
</html>
