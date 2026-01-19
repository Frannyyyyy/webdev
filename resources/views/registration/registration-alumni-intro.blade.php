<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - ServeIt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 10px 10px 0px 0px rgba(0,0,0,1); }
        .inner-shadow { box-shadow: inset 5px 5px 0px 0px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-[#FBF7EB] min-h-screen p-8 font-sans text-black">

    <div class="flex items-center gap-4 mb-8">
        <img src="{{ asset('images/logo.png') }}" class="h-20">
        <h1 class="text-4xl font-black uppercase tracking-tight">Servelt: University Ticket Management System</h1>
    </div>

    <div class="text-center mb-16">
        <h2 class="text-7xl font-black uppercase tracking-tighter">Registration</h2>
        <p class="text-gray-500 font-bold mt-2 text-lg">Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum.</p>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
        
        <div class="lg:col-span-3 relative">
            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-black text-white px-12 py-4 rounded-full z-20 border-4 border-black">
                <span class="font-black uppercase text-2xl tracking-widest">Account Information</span>
            </div>

            <div class="bg-[#FFD6D7] lofi-border lofi-shadow rounded-[50px] pt-16 p-12 space-y-8">
                <div class="space-y-2">
                    <label class="font-black uppercase text-lg ml-4">Mobile number:</label>
                    <input type="text" class="w-full h-16 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-8 font-bold text-xl outline-none focus:ring-4 focus:ring-black transition-all">
                </div>
                <div class="space-y-2">
                    <label class="font-black uppercase text-lg ml-4">Email address (Use your personal email):</label>
                    <input type="email" class="w-full h-16 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-8 font-bold text-xl outline-none focus:ring-4 focus:ring-black transition-all">
                </div>
                <div class="space-y-2">
                    <label class="font-black uppercase text-lg ml-4">Password:</label>
                    <input type="password" class="w-full h-16 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-8 font-bold text-xl outline-none focus:ring-4 focus:ring-black transition-all">
                </div>
                <div class="space-y-2">
                    <label class="font-black uppercase text-lg ml-4">Confirm Password:</label>
                    <input type="password" class="w-full h-16 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-8 font-bold text-xl outline-none focus:ring-4 focus:ring-black transition-all">
                </div>
            </div>

            <div class="flex justify-center mt-10">
                <a href="/registration/registration-step-2" class="bg-[#E5E3D6] lofi-border lofi-shadow rounded-full px-28 py-5 font-black text-3xl uppercase hover:bg-black hover:text-white transition-all transform hover:-translate-y-1 active:translate-y-1">
                    Next
                </a>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white lofi-border lofi-shadow rounded-[50px] p-12 flex flex-col items-center text-center min-h-[550px] justify-center">
            <div class="relative mb-10">
                <div class="absolute inset-0 bg-[#FFD43B] rounded-full scale-125 -z-10 translate-y-6"></div>
                <img src="{{ asset('images/a.regi.png') }}" class="w-64 h-64 object-contain drop-shadow-xl">
            </div>
            <h3 class="text-5xl font-black uppercase mb-6 italic tracking-tighter">Hello there!</h3>
            <p class="text-lg font-bold leading-relaxed text-gray-700 max-w-sm">
                Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum.
            </p>
        </div>

    </div>

    <div class="flex justify-center mt-16 mb-8">
        <div class="bg-[#E5E3D6] lofi-border lofi-shadow rounded-full px-12 py-4 max-w-3xl text-center border-4 border-black">
            <p class="font-black text-sm uppercase tracking-tighter">
                By clicking signing up you agree to our <span class="underline decoration-2">Terms of Service</span> and <span class="underline decoration-2">Privacy Policy</span>
            </p>
        </div>
    </div>

</body>
</html>