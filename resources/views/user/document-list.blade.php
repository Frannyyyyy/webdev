<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServeIt - Document List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;700;900&display=swap');

        body {
            font-family: 'Public Sans', sans-serif;
            transition: background-color .3s, color .3s
        }

        .lofi-border {
            border: 4px solid #000
        }

        .lofi-shadow {
            box-shadow: 8px 8px 0 0 #000
        }

        .sidebar-link:hover {
            background-color: #BDDBFF;
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0 0 #000
        }

        .card:hover {
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0 0 #000
        }

        ::-webkit-scrollbar {
            width: 12px
        }

        ::-webkit-scrollbar-track {
            background: #FBF7EB;
            border-left: 4px solid #000
        }

        ::-webkit-scrollbar-thumb {
            background: #000;
            border: 2px solid #FBF7EB
        }

        body.dark-mode {
            background-color: #1b1b1b;
            color: #e0e0e0
        }

        body.dark-mode aside,
        body.dark-mode .bg-white,
        body.dark-mode #detailModal>div {
            background-color: #2a2a2a !important;
            color: #e0e0e0 !important
        }

        body.dark-mode .lofi-border {
            border-color: #e0e0e0
        }

        body.dark-mode .lofi-shadow {
            box-shadow: 6px 6px 0 0 #e0e0e0
        }

        body.dark-mode .text-black {
            color: #e0e0e0 !important
        }

        body.dark-mode .sidebar-link.bg-[#1747E7] {
            background-color: #000 !important;
            color: #fff !important;
            border-color: #e0e0e0
        }

        body.dark-mode .bg-[#BDDBFF],
        body.dark-mode .bg-[#FFD6D7],
        body.dark-mode button.bg-[#1747E7] {
            background-color: #000 !important;
            color: #fff !important
        }

        body.dark-mode #modalTitle {
            color: #fff
        }
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
                <a href="{{ route('user.homepage') }}" class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.homepage') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
                    <img src="{{ asset('images/side.home.png') }}" class="w-6 {{ request()->routeIs('user.homepage') ? 'invert' : '' }}"> Homepage
                </a>
                <a href="{{ route('user.dashboard') }}" class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.dashboard') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
                    <img src="{{ asset('images/side.dashboard.png') }}" class="w-6 {{ request()->routeIs('user.dashboard') ? 'invert' : '' }}"> Dashboard
                </a>
                <a href="{{ route('user.document-list') }}" class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.document-list') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
                    <img src="{{ asset('images/side.docu.png') }}" class="w-6 {{ request()->routeIs('user.document-list') ? 'invert' : '' }}"> Document List
                </a>
                <a href="{{ route('user.records') }}" class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.records') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
                    <img src="{{ asset('images/side.records.png') }}" class="w-6 {{ request()->routeIs('user.records') ? 'invert' : '' }}"> Records
                </a>
                <a href="{{ route('user.help') }}" class="sidebar-link flex items-center gap-4 p-4 lofi-border rounded-xl {{ request()->routeIs('user.help') ? 'bg-[#1747E7] text-white shadow-[4px_4px_0px_0px_#000]' : 'bg-white' }} font-black uppercase transition-all">
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
            <div id="theme-toggle" class="flex items-center gap-2 bg-white lofi-border p-2 px-4 rounded-full cursor-pointer text-black">
                <div class="w-3 h-3 bg-black rounded-full"></div>
                <span class="font-black text-[10px] uppercase">Light</span>
            </div>
            <img src="{{ asset('images/logo.png') }}" class="h-12">
        </header>

        <h1 class="text-6xl font-black uppercase italic tracking-tighter mb-4">Academic Document Request</h1>
        <p class="text-xl font-bold uppercase mb-10 opacity-70">Processing times and fees vary by document.</p>

        <div class="grid grid-cols-3 gap-8 pb-20">
            <div class="bg-white lofi-border lofi-shadow p-6 rounded-3xl flex flex-col items-center text-center card text-black">
                <div class="w-20 h-20 rounded-full flex items-center justify-center overflow-visible mb-4">
                    <img src="{{ asset('images/TOR.png') }}" class="w-full h-full object-contain scale-125">
                </div>
                <h3 class="text-xl font-black uppercase mb-2">Transcript of Records</h3>
                <button onclick="openModal('Transcript of Records','₱100','3-5 Business Days','Submit a request for your official Transcript of Records.')" class="mt-auto w-full py-3 bg-[#1747E7] text-white lofi-border font-black uppercase rounded-xl hover:bg-black transition-all">Details</button>
            </div>

            <div class="bg-white lofi-border lofi-shadow p-6 rounded-3xl flex flex-col items-center text-center card text-black">
                <div class="w-20 h-20 rounded-full flex items-center justify-center overflow-visible mb-4">
                    <img src="{{ asset('images/COR.png') }}" class="w-full h-full object-contain scale-125">
                </div>
                <h3 class="text-xl font-black uppercase mb-2">Cert. of Enrollment</h3>
                <button onclick="openModal('Certificate of Enrollment','₱150','3-5 Business Days','Request an official Certificate of Enrollment for verification purposes.')" class="mt-auto w-full py-3 bg-[#1747E7] text-white lofi-border font-black uppercase rounded-xl hover:bg-black transition-all">Details</button>
            </div>

            <div class="bg-white lofi-border lofi-shadow p-6 rounded-3xl flex flex-col items-center text-center card text-black">
                <div class="w-20 h-20 rounded-full flex items-center justify-center overflow-visible mb-4">
                    <img src="{{ asset('images/GM.png') }}" class="w-full h-full object-contain scale-125">
                </div>
                <h3 class="text-xl font-black uppercase mb-2">Good Moral</h3>
                <button onclick="openModal('Good Moral Certificate','₱150','3-5 Business Days','Obtain a Good Moral Certificate issued by the school.')" class="mt-auto w-full py-3 bg-[#1747E7] text-white lofi-border font-black uppercase rounded-xl hover:bg-black transition-all">Details</button>
            </div>

            <div class="bg-white lofi-border lofi-shadow p-6 rounded-3xl flex flex-col items-center text-center card text-black">
                <div class="w-20 h-20 rounded-full flex items-center justify-center overflow-visible mb-4">
                    <img src="{{ asset('images/D.png') }}" class="w-full h-full object-contain scale-125">
                </div>
                <h3 class="text-xl font-black uppercase mb-2">Diploma</h3>
                <button onclick="openModal('Diploma','₱200','15-30 Business Days','Request your official Diploma for graduation verification.')" class="mt-auto w-full py-3 bg-[#1747E7] text-white lofi-border font-black uppercase rounded-xl hover:bg-black transition-all">Details</button>
            </div>

            <div class="bg-white lofi-border lofi-shadow p-6 rounded-3xl flex flex-col items-center text-center card text-black">
                <div class="w-20 h-20 rounded-full flex items-center justify-center overflow-visible mb-4">
                    <img src="{{ asset('images/HD.png') }}" class="w-full h-full object-contain scale-125">
                </div>
                <h3 class="text-xl font-black uppercase mb-2">Honorable Dismissal</h3>
                <button onclick="openModal('Honorable Dismissal','₱150','5-7 Business Days','Submit a request for your Honorable Dismissal letter.')" class="mt-auto w-full py-3 bg-[#1747E7] text-white lofi-border font-black uppercase rounded-xl hover:bg-black transition-all">Details</button>
            </div>
        </div>
    </main>

    <div id="detailModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-6">
        <div class="bg-[#FBF7EB] lofi-border lofi-shadow rounded-[50px] max-w-2xl w-full p-12 relative">
            <button onclick="closeModal()" class="absolute top-8 left-8 bg-[#BDDBFF] lofi-border px-4 py-2 font-black uppercase rounded-xl hover:bg-white transition-all text-black">← Back</button>
            <div class="text-center space-y-6 mt-12">
                <h2 id="modalTitle" class="text-5xl font-black uppercase italic leading-tight text-black">Document</h2>
                <div class="flex justify-center gap-8">
                    <div class="bg-white lofi-border p-6 rounded-3xl w-40 text-black">
                        <p class="text-xs font-black uppercase opacity-50">Price</p>
                        <p id="modalPrice" class="text-3xl font-black">₱0</p>
                    </div>
                    <div class="bg-white lofi-border p-6 rounded-3xl w-56 text-black">
                        <p class="text-xs font-black uppercase opacity-50">Processing Time</p>
                        <p id="modalTime" class="text-xl font-black">0 Days</p>
                    </div>
                </div>
                <p id="modalDesc" class="text-sm font-bold uppercase mt-4 text-black"></p>
                <a href="{{ route('user.ticket.stage01') }}" class="block w-full py-6 bg-black text-white lofi-border lofi-shadow rounded-full font-black text-3xl uppercase hover:bg-[#1747E7] transition-all">Create a Ticket</a>
            </div>
        </div>
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle')
        const themeDot = themeToggle.querySelector('div')
        const themeLabel = themeToggle.querySelector('span')
        const body = document.body

        if (localStorage.getItem('theme') === 'dark') applyDarkMode()

        themeToggle.addEventListener('click', () => {
            body.classList.contains('dark-mode') ? applyLightMode() : applyDarkMode()
        })

        function applyDarkMode() {
            body.classList.add('dark-mode');
            themeLabel.innerText = 'Dark';
            themeDot.classList.remove('bg-black');
            themeDot.classList.add('bg-white');
            localStorage.setItem('theme', 'dark')
        }

        function applyLightMode() {
            body.classList.remove('dark-mode');
            themeLabel.innerText = 'Light';
            themeDot.classList.add('bg-black');
            themeDot.classList.remove('bg-white');
            localStorage.setItem('theme', 'light')
        }

        function openModal(t, p, ti, d) {
            document.getElementById('modalTitle').innerText = t;
            document.getElementById('modalPrice').innerText = p;
            document.getElementById('modalTime').innerText = ti;
            document.getElementById('modalDesc').innerText = d;
            document.getElementById('detailModal').classList.remove('hidden')
        }

        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden')
        }
    </script>

        @include('user.profile-overlay')
        @include('user.logout-modal')

</body>
</html>
