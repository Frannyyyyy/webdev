<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServeIt - Employee Role Selection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Lo-fi border and shadow */
        .lo-fi-border { border: 4px solid black; }
        .lo-fi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); }
        body { transition: background-color 0.3s ease; }

        /* Card hover effect */
        .card-hover:hover {
            transform: translate(-4px, -4px);
            box-shadow: 12px 12px 0px 0px rgba(0,0,0,1);
        }

        /* ----- Entrance Animations ----- */
        .enter {
            opacity: 0;
            transition: all 0.9s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .from-left { transform: translateX(-120%); }
        .from-right { transform: translateX(120%); }
        .from-bottom { transform: translateY(120%); }
        .from-top { transform: translateY(-120%); }

        .enter-active {
            opacity: 1;
            transform: translate(0, 0);
        }

        /* Staggered delays */
        .delay-1 { transition-delay: 0.2s; }
        .delay-2 { transition-delay: 0.4s; }
        .delay-3 { transition-delay: 0.6s; }
        .delay-4 { transition-delay: 0.8s; }
    </style>
</head>
<body id="bg-screen" class="bg-[#FBF7EB] min-h-screen flex flex-col items-center justify-center p-6">

    <!-- Back Button -->
    <div class="absolute bottom-8 left-8 enter from-top delay-1">
        <a href="{{ route('start') }}" 
           class="px-6 py-3 bg-[#FFDDA3] lo-fi-border lo-fi-shadow font-black uppercase rounded-lg hover:bg-[#FFFE65] transition-colors">
            Back
        </a>
    </div>

    <!-- Top Links -->
    <div class="absolute top-8 right-8 flex gap-4 enter from-top delay-1">
        <a href="#" class="bg-black text-white px-6 py-2 rounded-full font-bold uppercase text-sm border-2 border-black hover:bg-white hover:text-black transition-colors">Contact Us</a>
        <a href="#" class="bg-black text-white px-6 py-2 rounded-full font-bold uppercase text-sm border-2 border-black hover:bg-white hover:text-black transition-colors">About Us</a>
    </div>

    <!-- Page Header -->
    <div class="mb-12 text-center enter from-top delay-2">
        <img src="{{ asset('images/logo.png') }}" alt="Serve It" class="h-20 mx-auto mb-6">
        <h1 class="text-4xl font-black mb-2">ServeIt: University Ticket Management System</h1>
        <h2 class="text-3xl font-bold mt-4">Please click or tap the appropriate button.</h2>
        <p class="text-2xl font-medium text-gray-500 mt-2">Are you a...</p>
    </div>

    <!-- Role Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 w-full max-w-6xl px-4">

        <!-- Support Manager (From Left) -->
        <div class="flex flex-col items-center enter from-left delay-2">
            <a href="{{ route('login.employee', ['role' => 'manager']) }}"
               onmouseenter="changeBg('#f39a71')" 
               onmouseleave="resetBg()"
               class="bg-[#b8430d] w-full aspect-square flex items-center justify-center rounded-[40px] lo-fi-border lo-fi-shadow card-hover transition-all duration-150">
                <img src="{{ asset('images/r.supman.png') }}" alt="Support Manager" class="w-3/4 h-3/4 object-contain">
            </a>
            <span class="text-3xl font-black mt-6 uppercase">Support Manager</span>
        </div>

        <!-- Admin (From Bottom) -->
        <div class="flex flex-col items-center enter from-bottom delay-3">
            <a href="{{ route('login.employee', ['role' => 'admin']) }}"
               onmouseenter="changeBg('#8E97FD')" 
               onmouseleave="resetBg()"
               class="bg-[#6366F1] w-full aspect-square flex items-center justify-center rounded-[40px] lo-fi-border lo-fi-shadow card-hover transition-all duration-150">
                <img src="{{ asset('images/r.admin.png') }}" alt="Admin" class="w-3/4 h-3/4 object-contain">
            </a>
            <span class="text-3xl font-black mt-6 uppercase">Admin</span>
        </div>

        <!-- Support Agent (From Right) -->
        <div class="flex flex-col items-center enter from-right delay-4">
            <a href="{{ route('login.employee', ['role' => 'agent']) }}"
            onmouseenter="changeBg('#506583')"
            onmouseleave="resetBg()"
            class="bg-[#6e83a3] w-full aspect-square flex items-center justify-center rounded-[40px] lo-fi-border lo-fi-shadow card-hover">
                <img src="{{ asset('images/r.supage.png') }}" alt="Support Agent" class="w-3/4 h-3/4 object-contain">
            </a>
            <span class="text-3xl font-black mt-6 uppercase">Support Agent</span>
        </div>

    </div>

    <!-- JS for background color on hover and entrance animations -->
    <script>
        const body = document.getElementById('bg-screen');
        const defaultColor = "#FBF7EB";

        function changeBg(color) { body.style.backgroundColor = color; }
        function resetBg() { body.style.backgroundColor = defaultColor; }

        // Entrance animations
        window.addEventListener('load', () => {
            document.querySelectorAll('.enter').forEach(el => {
                el.classList.add('enter-active');
            });
        });
    </script>

</body>
</html>
