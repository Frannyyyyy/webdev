<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login – ServeIt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
            .lofi-border { border: 4px solid #000; }
            .lofi-shadow { box-shadow: 10px 10px 0 #000; }

            @keyframes slideInFromTop {
                0% { transform: translateY(-100vh); opacity: 0; }
                70% { transform: translateY(20px); opacity: 1; }
                100% { transform: translateY(0); }
            }

            @keyframes riseFromBottom {
                0% { transform: translateY(120px); opacity: 0; }
                100% { transform: translateY(0); opacity: 1; }
            }

            .animate-slide-down {
                animation: slideInFromTop 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;
            }

            .animate-rise {
                animation: riseFromBottom 2.2s ease-out forwards;
            }

            .snappy-transition {
                transition: all 0.15s cubic-bezier(0, 0, 0.2, 1);
            }
        </style>
    </head>

    <body class="bg-[#FFE8D7] min-h-screen flex items-center justify-center px-6 overflow-hidden relative">

    <img src="{{ asset('images/cityskylines-student.png') }}"
        class="absolute bottom-0 w-full h-1/2 object-cover animate-rise pointer-events-none z-0">

    <div class="absolute bottom-8 left-8">
        <a href="{{ route('start') }}" 
        class="px-6 py-3 bg-[#FFDDA3] lo-fi-border lo-fi-shadow font-black uppercase rounded-lg hover:bg-[#FFFE65] transition-colors">
            Back
        </a>
    </div>

    <div class="animate-slide-down w-full max-w-6xl flex lofi-border lofi-shadow rounded-3xl overflow-hidden min-h-[600px] relative z-10">

        <div class="w-2/5 bg-[#4FC3F7] p-10 flex flex-col justify-between border-r-4 border-black">
            <div>
                <img src="{{ asset('images/logo.png') }}" class="h-12 mb-4">
                <p class="text-sm font-black uppercase leading-tight italic">
                    ServeIt: University Ticket<br>Management System
                </p>
            </div>

            <div class="text-center py-10">
                <img src="{{ asset('images/s.login.png') }}" class="w-64 mx-auto mb-6 drop-shadow-[6px_6px_0px_rgba(0,0,0,1)]">
                <h2 class="text-5xl font-black uppercase italic mb-2">Welcome back!</h2>
                <p class="text-sm font-bold leading-relaxed uppercase opacity-80">
                    Access your academic documents<br>and track your tickets in real-time.
                </p>
            </div>

            <div class="h-12"></div>
        </div>

        <div class="w-3/5 p-12 flex flex-col items-center justify-center bg-[#FDF6CC]">
            <h1 class="text-5xl font-black uppercase italic mb-2">Login</h1>
            <p class="text-sm font-bold uppercase text-gray-500 mb-10">Enter your student credentials below.</p>

            <div class="w-full max-w-md bg-[#D9D6D2] p-8 rounded-3xl lofi-border lofi-shadow">
                <form method="POST" action="{{ route('student.login.submit') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block font-black uppercase text-xs mb-2">Student Number</label>
                        <input name="student_number" type="text" required
                            class="w-full px-6 py-4 rounded-full lofi-border outline-none bg-[#FBF7EB] font-bold focus:ring-4 focus:ring-black">
                    </div>

                    <div>
                        <label class="block font-black uppercase text-xs mb-2">Password</label>
                        <input name="password" type="password" required
                            class="w-full px-6 py-4 rounded-full lofi-border outline-none bg-[#FBF7EB] font-bold focus:ring-4 focus:ring-black">
                        <div class="mt-2">
                            <a href="/forgot-password/stage-01"
                            class="text-sm font-bold underline hover:text-[#1747E7]">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-8">
                        <a href="/registration/registration-student-intro"
                        class="flex-1 py-4 rounded-full lofi-border bg-[#FBF7EB] font-black uppercase hover:bg-black hover:text-white snappy-transition text-center flex items-center justify-center">
                            Sign Up
                        </a>

                        <button type="submit"
                        class="flex-1 py-4 rounded-full lofi-border bg-black text-white font-black uppercase hover:bg-[#1747E7] snappy-transition">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>

            <p class="text-[9px] font-black uppercase mt-12 text-center max-w-xs text-gray-400">
                By clicking log in you agree to our
                <span class="underline">Terms of Service</span> and
                <span class="underline">Privacy Policy</span>
            </p>
        </div>
    </div>

</body>
</html>
