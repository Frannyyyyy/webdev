<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Login – ServeIt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
            .lofi-border { border: 4px solid #000; }
            .lofi-shadow { box-shadow: 10px 10px 0 #000; }

            @keyframes slideInFromTop {
                0% { transform: translateY(-100vh); opacity: 0; }
                70% { transform: translateY(25px); opacity: 1; }
                100% { transform: translateY(0); }
            }

            @keyframes riseFromBottom {
                0% { transform: translateY(120px); opacity: 0; }
                100% { transform: translateY(0); opacity: 1; }
            }

            .animate-slide-down { animation: slideInFromTop 0.7s cubic-bezier(0.23, 1, 0.32, 1) forwards; }
            .animate-rise { animation: riseFromBottom 2.2s ease-out forwards; }
            .snappy-transition { transition: all 0.15s cubic-bezier(0, 0, 0.2, 1); }
        </style>
    </head>
    <body class="bg-[#FFE8D7] min-h-screen flex items-center justify-center px-6 overflow-hidden relative">

    <div class="absolute inset-x-0 bottom-0 h-1/3 pointer-events-none animate-rise"
        style="background-image: url('{{ asset('images/cityskylines-alumni.png') }}');
                background-repeat: no-repeat;
                background-position: bottom center;
                background-size: cover;">
    </div>

        <div class="absolute bottom-8 left-8 z-20">
            <a href="{{ route('start') }}" 
            class="px-8 py-3 bg-[#FFDDA3] lofi-border lofi-shadow font-black uppercase rounded-xl hover:bg-[#FFFE65] transition-all active:translate-y-1 active:shadow-none inline-block">
                <i class="fa-solid fa-arrow-left mr-2"></i> Back
            </a>
        </div>

        <div class="animate-slide-down w-full max-w-6xl flex lofi-border lofi-shadow rounded-3xl overflow-hidden min-h-[600px] bg-[#FFD43B] relative z-10">

        <!-- Left Panel -->
        <div class="w-2/5 bg-[#D9D6D2] p-10 flex flex-col justify-between border-r-4 border-black">
            <div>
                <img src="{{ asset('images/logo.png') }}" class="h-12 mb-4">
                <p class="text-sm font-black uppercase leading-tight italic">
                    Servelt: Alumni Portal<br>Access System
                </p>
            </div>

            <div class="text-center py-10">
                <img src="{{ asset('images/a.login.png') }}" class="w-64 mx-auto mb-6 drop-shadow-[6px_6px_0px_rgba(0,0,0,1)]">
                <h2 class="text-5xl font-black uppercase italic mb-2">Hello there!</h2>
                <p class="text-sm font-bold leading-relaxed uppercase opacity-80">
                    Requesting your Transcript or Diploma?<br>Log in to start your request.
                </p>
            </div>

            <div class="h-12"></div>
        </div>

        <!-- Right Panel -->
        <div class="w-3/5 p-12 flex flex-col items-center justify-center bg-[#FFD43B]">
            <h1 class="text-5xl font-black uppercase italic mb-2">Login</h1>
            <p class="text-sm font-bold uppercase text-black mb-10 opacity-70">Enter your alumni credentials below.</p>

            <div class="w-full max-w-md bg-[#D9D6D2] p-8 rounded-3xl lofi-border lofi-shadow">
                <form method="POST" action="{{ route('alumni.login.submit') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block font-black uppercase text-xs mb-2">Email Address</label>
                        <input type="email" name="email" placeholder="alumni@email.com"
                            value="{{ old('email') }}"
                            class="w-full px-6 py-4 rounded-full lofi-border outline-none bg-[#FBF7EB] font-bold placeholder:opacity-30 snappy-transition focus:ring-4 focus:ring-black">
                        @error('email')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block font-black uppercase text-xs mb-2">Password</label>
                        <input type="password" name="password"
                            class="w-full px-6 py-4 rounded-full lofi-border outline-none bg-[#FBF7EB] font-bold snappy-transition focus:ring-4 focus:ring-black">
                        @error('password')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <a href="/forgot-password/stage-01" class="text-sm font-bold underline mt-2 inline-block">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- Session error -->
                    @if(session('error'))
                        <p class="text-red-600 text-xs mt-2 text-center">{{ session('error') }}</p>
                    @endif

                    <!-- Buttons -->
                    <div class="flex gap-4 mt-8">
                        <a href="/registration/registration-alumni-intro"
                            class="flex-1 py-4 rounded-full lofi-border bg-[#FBF7EB] font-black uppercase hover:bg-black hover:text-white snappy-transition text-center flex items-center justify-center">
                            Sign Up
                        </a>

                        <button type="submit"
                            class="flex-1 py-4 rounded-full lofi-border bg-black text-white font-black uppercase hover:bg-[#1747E7] snappy-transition text-center flex items-center justify-center">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>

            <p class="text-[9px] font-bold uppercase mt-12 text-center max-w-xs text-gray-600">
                By clicking log in you agree to our
                <span class="underline">Terms of Service</span> and
                <span class="underline">Privacy Policy</span>
            </p>
        </div>
    </div>

</body>
</html>
