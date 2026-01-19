<div class="flex min-h-[90vh] border-8 border-black m-6 bg-white overflow-hidden">
    <div class="w-full md:w-1/2 p-12 flex flex-col justify-center">
        <img src="{{ asset('assets/images/logo.png') }}" class="h-12 w-fit mb-8">
        <h1 class="text-5xl font-black uppercase mb-2">Forgot Password?</h1>
        <p class="italic text-gray-600 mb-10">Enter your email address to receive a password reset link.</p>

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block font-black uppercase">Email Address</label>
                <input type="email" name="email" class="w-full border-4 border-black p-4 focus:bg-[#FFFE65] outline-none font-bold" required>
            </div>
            
            <div class="flex flex-col gap-4">
                <button type="submit" class="bg-black text-white px-10 py-4 font-black text-xl border-4 border-black hover:bg-[#1747E7] transition-all">
                    SEND RESET LINK
                </button>
                <a href="{{ route('login', ['role' => 'student']) }}" class="text-center font-bold underline uppercase text-sm">Back to Login</a>
            </div>
        </form>
    </div>

    <div class="hidden md:flex w-1/2 bg-[#4FC3F7] p-12 flex-col justify-center items-center text-center border-l-8 border-black">
        <h2 class="text-5xl font-black mb-6">No Worries!</h2>
        <p class="text-xl font-medium max-w-sm mb-10">We'll help you get back into your account in no time.</p>
        <img src="{{ asset('assets/images/tfp-person.png') }}" class="h-80">
    </div>
</div>