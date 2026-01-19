<div class="min-h-screen bg-[#FDF6CC] flex items-center justify-center p-6">
    <div class="max-w-xl w-full bg-white border-8 border-black p-10 shadow-[12px_12px_0px_0px_rgba(0,0,0,1)]">
        <div class="text-center mb-8">
            <img src="{{ asset('assets/images/logo.png') }}" class="h-16 mx-auto mb-4">
            <h2 class="text-3xl font-black uppercase underline">Create New Password</h2>
        </div>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div>
                <label class="block font-black uppercase">New Password</label>
                <input type="password" name="password" class="w-full border-4 border-black p-3 focus:bg-[#BDDBFF] outline-none">
            </div>

            <div>
                <label class="block font-black uppercase">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="w-full border-4 border-black p-3 focus:bg-[#BDDBFF] outline-none">
            </div>

            <button type="submit" class="w-full bg-[#1747E7] text-white py-5 font-black text-2xl border-4 border-black hover:bg-black transition-colors">
                UPDATE PASSWORD
            </button>
        </form>
    </div>
</div>