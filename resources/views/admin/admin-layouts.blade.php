<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            transition: background-color 0.3s ease, color 0.3s ease; 
        }

        .modal-backdrop { position: fixed; inset: 0; background: rgba(0,0,0,.45); z-index: 50; }
        .modal-card { position: fixed; inset: 0; display:flex; align-items:center; justify-content:center; z-index: 60; padding: 16px; }

        ::-webkit-scrollbar { width: 12px; }
        ::-webkit-scrollbar-track { background: #FBF7EB; border-left: 4px solid #000; }
        ::-webkit-scrollbar-thumb { background: #000; border: 2px solid #FBF7EB; }

        /* DARK MODE */
        body.dark-mode { background-color: #1b1b1b; color: #e0e0e0; }
        body.dark-mode aside, body.dark-mode main { background-color: #2a2a2a !important; color: #e0e0e0 !important; }
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

        .timer-card { padding: 0.75rem 1rem; border: 3px solid black; box-shadow: 4px 4px 0px 0px #000; border-radius: 1rem; background: white; font-weight: 900; margin-bottom: 0.5rem;}
        .timer-title { font-size: 10px; text-transform: uppercase; opacity: 0.6; margin-bottom: 0.25rem; }
        .timer-value { font-size: 1.25rem; font-variant-numeric: tabular-nums; color: #F97316; }
    </style>
</head>
<body class="bg-[#FBF7EB] antialiased">

<!-- GRADIENT BACKGROUND -->
<div id="gradientBackground"></div>

<div class="flex h-[calc(100vh-2rem)] border-[4px] border-black overflow-hidden m-4 rounded-3xl shadow-[10px_10px_0px_#000]">

    <aside class="w-[280px] bg-[#FBF7EB] border-r-[4px] border-black flex flex-col overflow-y-auto">
        <div class="p-5 space-y-4">
            <div class="inline-flex items-center gap-3 bg-[#D1D5DB] border-[4px] border-black rounded-full px-4 py-2 shadow-[6px_6px_0px_#000] w-full">
                <div class="w-10 h-10 rounded-full border-[3px] border-black bg-white flex items-center justify-center overflow-hidden shrink-0">
                    <span class="font-black text-xl">👤</span>
                </div>
                <span class="font-black text-lg truncate">@yield('sidebar-user', 'Admin')</span>
            </div>

            <div class="timer-card">
                <div class="timer-title">Current Time</div>
                <div id="real-time-clock" class="timer-value">00:00:00 AM</div>
            </div>

            <div class="timer-card">
                <div class="timer-title">Session Duration</div>
                <div id="session-timer" class="timer-value text-orange-600">00:00:00</div>
            </div>
        </div>

        <hr class="border-t-4 border-black mx-5 my-2">

        <nav class="px-4 space-y-3 mt-4">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl border-[3px] border-black shadow-[4px_4px_0px_#000]
                      {{ request()->is('admin/dashboard') ? 'bg-[#F59E0B] font-black' : 'bg-white font-black hover:bg-[#FFFE65] transition' }}">
                <span class="text-xl">🏠</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.users') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl border-[3px] border-black shadow-[4px_4px_0px_#000]
                    bg-white font-black hover:bg-[#FFFE65] transition">
                <span class="text-xl">📄</span>
                <span>User Management</span>
            </a>
        </nav>

        <div class="mt-auto p-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="hidden" name="redirect_to" value="{{ route('login.selection') }}">
                <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border-[3px] border-black shadow-[4px_4px_0px_#000]
                            bg-white font-black hover:bg-red-400 transition group">
                    <span class="group-hover:rotate-12 transition">🚪</span>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 bg-[#FBF7EB] overflow-y-auto">
        <div class="p-8 flex justify-end gap-4">
            <button id="modeToggle" class="px-4 py-2 bg-black text-white font-bold rounded hover:bg-gray-800 shadow">
                Toggle Dark/Light
            </button>
            <div class="flex items-center gap-2">
                <label for="gradientSlider" class="font-bold text-sm">Gradient</label>
                <input type="range" id="gradientSlider" min="0" max="100" value="50" class="w-48">
            </div>
        </div>
        <div class="p-8">
            @yield('content')
        </div>
    </main>
</div>

<script>
    const sessionTimerEl = document.getElementById('session-timer');
    const realTimeClockEl = document.getElementById('real-time-clock');
    const modeToggle = document.getElementById('modeToggle');
    const gradientSlider = document.getElementById('gradientSlider');
    const gradientBg = document.getElementById('gradientBackground');

    // Persistent session start
    if (!localStorage.getItem('sessionStart')) localStorage.setItem('sessionStart', new Date().getTime());

    function updateTimers() {
        const now = new Date();
        const startTime = parseInt(localStorage.getItem('sessionStart'));
        realTimeClockEl.textContent = now.toLocaleTimeString([], {hour:'2-digit', minute:'2-digit', second:'2-digit'});
        let diff = Math.floor((now.getTime() - startTime)/1000);
        const hours = String(Math.floor(diff/3600)).padStart(2,'0');
        diff %= 3600;
        const minutes = String(Math.floor(diff/60)).padStart(2,'0');
        const seconds = String(diff%60).padStart(2,'0');
        sessionTimerEl.textContent = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateTimers,1000);
    updateTimers();

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
    gradientSlider.addEventListener('input', updateGradient);
    updateGradient();
</script>

@stack('scripts')
</body>
</html>
