<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Proceed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 10px 10px 0px 0px rgba(0,0,0,1); }
    </style>
</head>
<body class="bg-[#FDF6CC] min-h-screen p-8 font-sans text-black flex flex-col items-center justify-center">

    <div class="max-w-xl w-full bg-white lofi-border lofi-shadow rounded-[50px] p-12 text-center">
        <div class="bg-[#FFFE65] w-24 h-24 rounded-full lofi-border mx-auto mb-6 flex items-center justify-center">
            <span class="text-5xl">📩</span>
        </div>
        
        <h2 class="text-4xl font-black uppercase mb-4 tracking-tighter">Email Sent!</h2>
        <p class="font-bold text-lg mb-8 leading-tight">
            We have sent a verification link and instruction to your email address. 
            Please check your inbox.
        </p>
        
        <a href="/forgot-password/stage-03" class="bg-[#FFD43B] lofi-border lofi-shadow rounded-full px-16 py-4 font-black text-2xl uppercase hover:bg-black hover:text-white transition-all inline-block transform hover:-translate-y-1 active:translate-y-1">
            Proceed
        </a>
    </div>

</body>
</html>