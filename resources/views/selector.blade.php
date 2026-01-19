<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServeIt - Choose Your Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lo-fi-border { border: 4px solid black; }
        .lo-fi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); }
        body { transition: background-color 0.3s ease; }
        .card-hover:hover {
            transform: translate(-4px, -4px);
            box-shadow: 12px 12px 0px 0px rgba(0,0,0,1);
        }
    </style>
</head>
<body id="bg-screen" class="bg-[#FBF7EB] min-h-screen flex flex-col items-center justify-center p-6">

    <div class="absolute bottom-8 left-8">
        <a href="{{ route('landing') }}" 
        class="px-6 py-3 bg-[#FFDDA3] lo-fi-border lo-fi-shadow font-black uppercase rounded-lg hover:bg-[#FFFE65] transition-colors">
            Back
        </a>
    </div>

    <div class="mb-12 text-center">
        <img src="{{ asset('images/logo.png') }}" alt="Serve It" class="h-20 mx-auto mb-6">
        <h2 class="text-xl font-black uppercase italic tracking-tight">Please click or tap the appropriate button.</h2>
        <h1 class="text-5xl font-black uppercase mt-2 tracking-tighter">Are you a...</h1>
    </div>

    <div class="grid gap-8 w-full max-w-md">
        <a href="{{ route('login.student') }}" 
           onmouseenter="changeBg('#BDDBFF')" 
           onmouseleave="resetBg()"
           class="bg-[#4FC3F7] p-4 flex flex-col items-center justify-center lo-fi-border lo-fi-shadow card-hover transition-all duration-150">
            <img src="{{ asset('images/studentlogo.png') }}" alt="" class="h-24 mb-2 object-contain">
            <span class="text-4xl font-black uppercase">Student</span>
        </a>

        <a href="{{ route('login.alumni') }}" 
           onmouseenter="changeBg('#FDF6CC')" 
           onmouseleave="resetBg()"
           class="bg-[#FFD43B] p-4 flex flex-col items-center justify-center lo-fi-border lo-fi-shadow card-hover transition-all duration-150">
            <img src="{{ asset('images/alumnilogo.png') }}" alt="" class="h-24 mb-2 object-contain">
            <span class="text-4xl font-black uppercase">Alumni</span>
        </a>

        <a href="{{ route('login.selection') }}"
           onmouseenter="changeBg('#FFDDA3')" 
           onmouseleave="resetBg()"
           class="bg-[#FF8A50] p-4 flex flex-col items-center justify-center lo-fi-border lo-fi-shadow card-hover transition-all duration-150">
            <img src="{{ asset('images/employeelogo.png') }}" alt="" class="h-24 mb-2 object-contain">
            <span class="text-4xl font-black uppercase">Employee</span>
        </a>
    </div>

    <div class="mt-16 flex gap-12 font-black uppercase underline decoration-4 underline-offset-4">
        <a href="#" class="hover:text-[#1747E7]">Contact Us</a>
        <a href="#" class="hover:text-[#1747E7]">About Us</a>
    </div>

    <script>
        const body = document.getElementById('bg-screen');
        const defaultColor = "#FBF7EB";
        function changeBg(color) {
            body.style.backgroundColor = color;
        }
        function resetBg() {
            body.style.backgroundColor = defaultColor;
        }
    </script>
</body>
</html>
