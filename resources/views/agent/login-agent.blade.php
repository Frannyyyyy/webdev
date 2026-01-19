<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Agent Login - ServeIt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #6e83a3; }
        .shadow-retro { box-shadow: 8px 8px 0px #000; }
        .input-retro { border: 3px solid #000; }
        .btn-retro { border: 3px solid #000; box-shadow: 4px 4px 0px #000; transition: all 0.1s ease; }
        .btn-retro:active { transform: translate(2px, 2px); box-shadow: 2px 2px 0px #000; }
        .sidebar-border { border-right: 4px solid #000; }
        .lo-fi-border { border: 4px solid black; }
        .lo-fi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); }

        @keyframes slideInFromTop {
            0% { transform: translateY(-100vh); opacity: 0; }
            70% { transform: translateY(20px); opacity: 1; }
            100% { transform: translateY(0); }
        }
        @keyframes riseFromBottom {
            0% { transform: translateY(140px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        .animate-slide-down { animation: slideInFromTop 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
        .animate-rise { animation: riseFromBottom 2.4s ease-out forwards; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 overflow-hidden relative">

    <div class="absolute inset-x-0 bottom-0 h-full pointer-events-none animate-rise"
         style="background-image: url('{{ asset('images/cityskylines-employee.png') }}'); background-repeat: no-repeat; background-position: bottom center; background-size: cover;">
    </div>

    <div class="absolute bottom-8 left-8 z-20">
        <a href="{{ route('login.selection') }}" 
           class="px-6 py-3 bg-[#FFDDA3] lo-fi-border lo-fi-shadow font-black uppercase rounded-lg hover:bg-[#FFFE65] transition-colors">
            Back
        </a>
    </div>

    <div class="animate-slide-down w-full max-w-5xl flex flex-col md:flex-row bg-white rounded-3xl overflow-hidden border-[4px] border-black shadow-retro relative z-10">
        
        <div class="md:w-5/12 bg-[#D1D5DB] p-10 flex flex-col justify-between sidebar-border">
            <div>
                <div class="bg-[#FFFE65] border-2 border-black rounded-full px-4 py-2 inline-block mb-6 shadow-[4px_4px_0px_#000]">
                    <img src="{{ asset('images/logo.png') }}" class="h-8">
                </div>
                <h3 class="font-black text-sm uppercase tracking-widest mb-8">University Ticket Management System</h3>
                <div class="flex justify-center my-8">
                    <img src="{{ asset('images/e.log.png') }}" class="h-64 object-contain">
                </div>
            </div>
            <div>
                <h2 class="text-4xl font-black mb-4 uppercase italic">Welcome back!</h2>
                <p class="text-sm font-bold leading-relaxed">
                    Access the university management portal to process tickets, update document statuses, and assist students.
                </p>
            </div>
        </div>

        <div class="flex-1 bg-[#FBF7EB] p-10 md:p-16 flex flex-col justify-center">
            <div class="max-w-md mx-auto w-full">
                <h1 class="text-5xl font-black mb-2 uppercase tracking-tighter">Login as Support Agent</h1>
                <p class="mb-10 font-bold text-gray-700">Enter your official university credentials below.</p>
                
                <form method="POST" action="{{ route('employee.login.submit') }}" class="bg-[#D1D5DB] p-8 rounded-2xl border-4 border-black shadow-retro">
                    @csrf
                    <div class="mb-6">
                        <label class="block font-black uppercase text-sm mb-2">Email:</label>
                        <input type="email" name="email" placeholder="Enter your email" class="w-full px-4 py-3 rounded-xl input-retro font-bold focus:outline-none focus:bg-[#FFFE65]" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-black uppercase text-sm mb-2">Password:</label>
                        <input type="password" name="password" placeholder="••••••••" class="w-full px-4 py-3 rounded-xl input-retro font-bold focus:outline-none focus:bg-[#FFFE65]" required>
                    </div>
                    <div class="flex justify-end mb-8">
                        <a href="/forgot-password/stage-01" class="text-xs font-black uppercase underline decoration-2 hover:text-[#1747E7]">
                            Forgot Password?
                        </a>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-retro py-3 px-10 bg-[#FBF7EB] font-black uppercase tracking-widest rounded-xl hover:bg-[#FFFE65]">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html>
