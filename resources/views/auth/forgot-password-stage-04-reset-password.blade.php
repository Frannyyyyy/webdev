<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 10px 10px 0px 0px rgba(0,0,0,1); }
        .inner-shadow { box-shadow: inset 5px 5px 0px 0px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-[#FDF6CC] min-h-screen p-8 font-sans text-black flex flex-col items-center justify-center">

    <div class="max-w-3xl w-full relative">
        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-[#DB1F1E] text-white px-16 py-4 rounded-full z-20 border-4 border-black">
            <span class="font-black uppercase text-2xl tracking-widest whitespace-nowrap">Change Password</span>
        </div>

        <div class="bg-[#FFD6D7] lofi-border lofi-shadow rounded-[50px] pt-24 p-12 space-y-8">
            <div class="text-center mb-4">
                <h2 class="text-4xl font-black uppercase tracking-tighter">Create New Password</h2>
                <p class="font-bold text-gray-700 mt-2">Your identity has been verified. Please set your new credentials.</p>
            </div>

            <div class="space-y-2">
                <label class="font-black uppercase text-xl ml-4">New Password:</label>
                <input type="password" 
                    class="w-full h-18 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-8 py-4 font-bold text-2xl outline-none focus:ring-4 focus:ring-black transition-all"
                    placeholder="••••••••">
            </div>

            <div class="space-y-2">
                <label class="font-black uppercase text-xl ml-4">Confirm New Password:</label>
                <input type="password" 
                    class="w-full h-18 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-8 py-4 font-bold text-2xl outline-none focus:ring-4 focus:ring-black transition-all"
                    placeholder="••••••••">
            </div>

            <div class="text-center pt-6">
                <a href="/start" class="bg-black text-white lofi-border lofi-shadow rounded-full px-20 py-5 font-black text-3xl uppercase hover:bg-[#1747E7] transition-all transform hover:-translate-y-1 active:translate-y-1 inline-block">
                    Reset & Login
                </a>
            </div>
        </div>

        <div class="mt-12 text-center">
            <div class="inline-block bg-[#E5E3D6] lofi-border lofi-shadow rounded-full px-10 py-4 max-w-2xl">
                <p class="font-black text-xs uppercase tracking-widest leading-relaxed">
                    🔒 Ensure your password is at least 8 characters long, has special character(s), and at least is something you personally remember easily (emphasis on the <span class="underline">"personally"</span>.)
                </p>
            </div>
        </div>
    </div>

</body>
</html>