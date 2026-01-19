<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Verify PIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 10px 10px 0px 0px rgba(0,0,0,1); }
        .inner-shadow { box-shadow: inset 5px 5px 0px 0px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="bg-[#FDF6CC] min-h-screen p-8 font-sans text-black flex flex-col items-center justify-center">

    <div class="max-w-3xl w-full relative">
        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-black text-white px-16 py-4 rounded-full z-20 border-4 border-black">
            <span class="font-black uppercase text-2xl tracking-widest">Recovery PIN</span>
        </div>

        <div class="bg-[#BDDBFF] lofi-border lofi-shadow rounded-[50px] pt-24 p-12 text-center">
            <h2 class="text-4xl font-black uppercase mb-4 tracking-tighter">Enter Recovery PIN</h2>
            <p class="font-bold mb-10 text-gray-800 text-lg">Please enter the 6-digit PIN sent to your email address.</p>
            
            <div class="flex justify-center gap-3 mb-12">
                @for($i = 0; $i < 6; $i++)
                    <input type="text" maxlength="1" 
                        class="w-16 h-20 lofi-border rounded-2xl bg-[#E5E3D6] inner-shadow text-center font-black text-4xl outline-none focus:ring-4 focus:ring-black transition-all">
                @endfor
            </div>

            <div class="mt-4">
                <a href="/forgot-password/stage-04" class="bg-black text-white lofi-border lofi-shadow rounded-full px-24 py-5 font-black text-3xl uppercase hover:bg-[#1747E7] transition-all inline-block transform hover:-translate-y-1 active:translate-y-1">
                    Verify Code
                </a>
            </div>

            <p class="mt-8 font-black uppercase text-sm tracking-widest cursor-pointer hover:underline">
                Didn't receive a PIN? Resend
            </p>
        </div>
    </div>

</body>
</html>