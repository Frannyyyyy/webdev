<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servelt - Alumni Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid black; }
        
        .lofi-shadow { box-shadow: 6px 6px 0px 0px rgba(0,0,0,1); }
        
        .sidebar-item { transition: all 0.2s ease; cursor: pointer; }
        
        .sidebar-item:hover { background: #FFD43B; text-decoration: underline; 
                    border-left: 8px solid black; }
        
        .active-nav { background: #FFD43B !important; 
                    border-left: 12px solid black; }
        
        @keyframes blink { 50% { opacity: 0.85; } }
        .clock-blink { animation: blink 1s steps(1) infinite; }
        
        body.dark-mode { background: #1A1A1A; color: #F0F0F0; }
        
        body.dark-mode header, body.dark-mode aside, body.dark-mode footer { 
            background: #2A2A2A; color: #F0F0F0; border-color: #F0F0F0; }

        .mood-overlay { position: fixed; top:0; left:0; width:100%; height:100%; 
                    pointer-events:none; z-index:1000; mix-blend-mode: overlay; 
                    transition: background 0.3s; }
        
        .modal-bg { position: fixed; inset:0; background: rgba(0,0,0,0.5); display: 
                    flex; justify-content: center; align-items: center; opacity:0; 
                    pointer-events:none; transition: opacity 0.3s; z-index:1050; }
        
        .modal-bg.show { opacity:1; pointer-events:auto; }
        
        .modal-card { background:#FFFE65; border:8px solid black; 
                    padding:2rem; text-align:center; position:relative; max-width:300px; }
        
        .modal-card img { max-width:100px; margin-bottom:1rem; }
        
        .modal-card button { margin:0.5rem; padding:0.5rem 1rem; font-weight:bold; 
                    border:4px solid black; background:black; color:white; cursor:pointer; }
        
        .click-counter {
            position: fixed;
            bottom: 6rem;
            left: 1rem;
            background: #FFFE65;
            border: 4px solid black;
            padding: 0.5rem 1rem;
            font-weight: bold;
            z-index: 1060;
            font-size: 14px;
            text-align: center;
        }

    </style>
</head>

<body class="bg-[#FBF7EB] flex min-h-screen border-[12px] border-black relative">

    <div id="mood-overlay" class="mood-overlay"></div>

    <aside class="w-64 bg-white border-r-8 border-black flex flex-col z-10">
        <div class="p-6 border-b-4 border-black text-center bg-[#FFFE65]">
            <img src="{{ asset('images/logo.png') }}" class="h-10 mx-auto" alt="Logo">
        </div>

        <div class="p-4 border-b-4 border-black flex items-center gap-3">
            <div class="w-10 h-10 rounded-full border-2 border-black bg-gray-200 overflow-hidden">
                <img src="{{ asset('images/alumnilogo.png') }}" alt="Alumni">
            </div>
            <span class="font-black uppercase text-sm">{{ auth()->user()->name ?? 'Anon' }}</span>
        </div>

        <nav class="flex-1 font-bold uppercase text-sm">
            <a href="{{ route('alumni.dashboard') }}" class="sidebar-item flex items-center gap-2 p-4 border-b-2 border-black 
                    {{ request()->routeIs('alumni.dashboard') ? 'active-nav' : '' }}" data-href="{{ route('alumni.dashboard') }}">
                <img src="{{ asset('images/side.dashboard.png') }}" class="w-5 h-5">Dashboard
            </a>
            <a href="{{ route('alumni.documents') }}" class="sidebar-item flex items-center gap-2 p-4 border-b-2 border-black 
                    {{ request()->routeIs('alumni.documents') ? 'active-nav' : '' }}" data-href="{{ route('alumni.documents') }}">
                <img src="{{ asset('images/side.docu.png') }}" class="w-5 h-5">Document List
            </a>
            <a href="{{ route('alumni.records') }}" class="sidebar-item flex items-center gap-2 p-4 border-b-2 border-black 
                    {{ request()->routeIs('alumni.records') ? 'active-nav' : '' }}" data-href="{{ route('alumni.records') }}">
                <img src="{{ asset('images/side.records.png') }}" class="w-5 h-5">Records
            </a>
            <a href="{{ route('alumni.help') }}" class="sidebar-item flex items-center gap-2 p-4 border-b-2 border-black 
                    {{ request()->routeIs('alumni.help') ? 'active-nav' : '' }}" data-href="{{ route('alumni.help') }}">
                <img src="{{ asset('images/side.help.png') }}" class="w-5 h-5">Help
            </a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-2 p-4 w-full bg-black text-white font-black uppercase hover:bg-red-600 transition-colors">
                <img src="{{ asset('images/side.logout.png') }}" class="w-5 h-5">Logout
            </button>
        </form>
    </aside>

    <main class="flex-1 flex flex-col z-10">
        <header class="p-4 bg-white border-b-4 border-black flex justify-between items-center relative">
            <div class="flex flex-col md:flex-row gap-4 items-center">
                <h1 class="font-black italic uppercase text-xs md:text-base">Servelt: University Ticket Management System</h1>
                <div id="session-timer" class="px-3 py-1 border-2 border-black font-black bg-[#FFFE65] lofi-shadow text-xs md:text-sm">Session: 00:00:00</div>
                <div id="live-clock" class="clock-blink border-2 border-black px-3 py-1 bg-[#FFFE65] font-black text-xs md:text-sm lofi-shadow text-center">--:--:--</div>
            </div>

            <div class="flex items-center gap-4">
                <input type="range" id="mood-slider" min="0" max="100" value="50" class="w-32">
                <button id="theme-toggle" class="px-3 py-1 border-2 border-black font-black bg-[#FFFE65] lofi-shadow uppercase">Toggle Dark</button>
                <input type="text" placeholder="Search..." class="border-2 border-black px-2 py-1 text-sm focus:bg-[#FFFE65] outline-none">
                <div class="w-8 h-8 bg-black lofi-border rounded-sm"></div>
            </div>
        </header>

        <div class="p-8 flex-1 overflow-y-auto z-10">
            @yield('content')
        </div>

        <footer class="p-6 bg-white border-t-8 border-black grid grid-cols-1 md:grid-cols-3 gap-4 text-[10px] font-black uppercase z-10">
            <div>
                <p>Email: alumni-support@example.com</p>
                <p>Phone: +63 9123456789</p>
            </div>
            <div class="text-center italic normal-case">"Continuing Excellence After Graduation"</div>
            <div class="text-right">
                <p>Address: 123 Sample Street, Manila</p>
                <p>Mon - Fri, 9AM - 5PM</p>
            </div>
        </footer>
    </main>

    <div id="confirmation-modal" class="modal-bg">
        <div class="modal-card">
            <img src="{{ asset('images/l.confirmation.png') }}" alt="Confirm">
            <p class="font-black uppercase text-sm mb-4">Are you sure you want to leave this page?</p>
            <button id="confirm-yes">Yes</button>
            <button id="confirm-no">No</button>
        </div>
    </div>

    <div class="click-counter" id="click-counter">Clicks: 0</div>

    <script>
        let sessionSeconds = 0;
        function updateSessionTimer() {
            sessionSeconds++;
            const h = String(Math.floor(sessionSeconds/3600)).padStart(2,'0');
            const m = String(Math.floor(sessionSeconds/60)%60).padStart(2,'0');
            const s = String(sessionSeconds%60).padStart(2,'0');
            document.getElementById('session-timer').textContent = `Session: ${h}:${m}:${s}`;
        }
        setInterval(updateSessionTimer,1000);

        function updateClock() {
            const clock = document.getElementById('live-clock');
            const now = new Date();
            clock.innerHTML = `
                <div>${now.toLocaleTimeString('en-US',{hour:'2-digit',minute:'2-digit',second:'2-digit',hour12:true})}</div>
                <div class="text-[9px] uppercase">${now.toLocaleDateString('en-US',{weekday:'short',month:'short',day:'numeric'})}</div>
            `;
        }
        updateClock();
        setInterval(updateClock,1000);

        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click',()=>{
            document.body.classList.toggle('dark-mode');
            updateMood();
        });

        const moodSlider = document.getElementById('mood-slider');
        const moodOverlay = document.getElementById('mood-overlay');
        function updateMood() {
            const val = moodSlider.value;
            if(document.body.classList.contains('dark-mode')){
                moodOverlay.style.background = `linear-gradient(135deg, 
                    rgba(${50+val*3},${50},${150+val*1.5},0.5), 
                    rgba(150,${50+val*3},${50},0.5))`;
            } else {
                moodOverlay.style.background = `linear-gradient(135deg, 
                    rgba(${255-val*2.5},${val*2.5},150,0.5), 
                    rgba(150,${255-val*2.5},${val*2.5},0.5))`;
            }
        }
        moodSlider.addEventListener('input',updateMood);
        updateMood();

        let clickCount = 0;
        const clickCounter = document.getElementById('click-counter');
        document.body.addEventListener('click',()=>{ clickCount++; clickCounter.textContent=`Clicks: ${clickCount}`; });

        const modal = document.getElementById('confirmation-modal');
        let targetHref = null;
        document.querySelectorAll('.sidebar-item').forEach(el=>{
            el.addEventListener('click', e=>{
                e.preventDefault();
                targetHref = el.getAttribute('data-href');
                modal.classList.add('show');
            });
        });

        document.getElementById('confirm-no').addEventListener('click',()=>{ modal.classList.remove('show'); targetHref=null; });
        document.getElementById('confirm-yes').addEventListener('click',()=>{ if(targetHref){ window.location.href=targetHref; } });
    </script>

</body>
</html>
