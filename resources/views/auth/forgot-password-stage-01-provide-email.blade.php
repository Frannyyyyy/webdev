<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Step 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 10px 10px 0px 0px rgba(0,0,0,1); }
        .inner-shadow { box-shadow: inset 5px 5px 0px 0px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-[#FDF6CC] min-h-screen p-8 font-sans text-black flex flex-col items-center justify-center">

    <div class="max-w-2xl w-full relative">
        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-black text-white px-12 py-4 rounded-full z-20 border-4 border-black">
            <span class="font-black uppercase text-xl tracking-widest">Forgot Password</span>
        </div>

        <div class="bg-[#BDDBFF] lofi-border lofi-shadow rounded-[50px] pt-20 p-12 text-center">
            <h2 class="text-3xl font-black uppercase mb-6">Recover Account</h2>
            <p class="font-bold mb-8 text-gray-700">Please enter your registered email address to receive a verification PIN.</p>
            
            <div class="space-y-2 text-left">
                <label class="font-black uppercase text-lg ml-4">Email Address:</label>
                <input type="email" placeholder="username@email.com" class="w-full h-16 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-8 font-bold text-xl outline-none focus:ring-4 focus:ring-black">
            </div>

            <div class="mt-10">
                <a href="/forgot-password/stage-02" class="bg-black text-white lofi-border lofi-shadow rounded-full px-20 py-4 font-black text-2xl uppercase hover:bg-[#1747E7] transition-all inline-block">
                    Send Email
                </a>
            </div>
        </div>
    </div>
</body>
</html>