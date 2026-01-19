<div id="logoutOverlay" class="fixed inset-0 bg-black/40 opacity-0 pointer-events-none z-[100] flex items-center justify-center backdrop-blur-sm transition-opacity duration-300">
    
    <div id="logoutCard" class="bg-[#FBF7EB] lofi-border lofi-shadow rounded-[40px] w-full max-w-md p-10 relative transform translate-x-[150%] transition-transform duration-500 cubic-bezier(0.16, 1, 0.3, 1)">
        
        <button onclick="closeLogout()" class="absolute top-6 left-6 hover:scale-110 transition-transform">
            <img src="{{ asset('images/l.xbutton.png') }}" class="w-10 h-10">
        </button>

        <div id="confirmState" class="text-center">
            <img src="{{ asset('images/l.confirmation.png') }}" class="w-32 h-32 mx-auto mb-6 object-contain">
            <h2 class="text-3xl font-black uppercase italic leading-tight mb-8">Are you sure you want to log out?</h2>
            
            <div class="flex gap-4">
                <button onclick="showLogoutSuccess()" class="flex-1 py-4 bg-[#FFD6D7] lofi-border font-black uppercase rounded-2xl hover:bg-red-400 transition-all shadow-[4px_4px_0px_0px_#000] active:shadow-none active:translate-x-1 active:translate-y-1">
                    Yes
                </button>
                <button onclick="closeLogout()" class="flex-1 py-4 bg-white lofi-border font-black uppercase rounded-2xl hover:bg-[#BDDBFF] transition-all shadow-[4px_4px_0px_0px_#000] active:shadow-none active:translate-x-1 active:translate-y-1">
                    No
                </button>
            </div>
        </div>

        <div id="successState" class="hidden text-center">
            <img src="{{ asset('images/l.success.png') }}" class="w-32 h-32 mx-auto mb-6 object-contain">
            <h2 class="text-3xl font-black uppercase italic leading-tight mb-8">Successfully Logged Out!</h2>
            
            <button onclick="redirectAfterLogout()" class="block w-full py-4 bg-black text-white lofi-border font-black uppercase rounded-2xl hover:bg-[#1747E7] transition-all shadow-[8px_8px_0px_0px_rgba(255,255,255,0.2)]">
                Okay
            </button>
        </div>
    </div>
</div>

<script>
function openLogout() {
    const overlay = document.getElementById('logoutOverlay');
    const card = document.getElementById('logoutCard');
    overlay.classList.remove('pointer-events-none');
    overlay.classList.add('opacity-100');
    card.classList.remove('translate-x-[150%]');
    card.classList.add('translate-x-0');
}

function closeLogout() {
    const overlay = document.getElementById('logoutOverlay');
    const card = document.getElementById('logoutCard');
    overlay.classList.add('pointer-events-none');
    overlay.classList.remove('opacity-100');
    card.classList.add('translate-x-[150%]');
    card.classList.remove('translate-x-0');
    setTimeout(() => {
        document.getElementById('confirmState').classList.remove('hidden');
        document.getElementById('successState').classList.add('hidden');
    }, 500);
}

function showLogoutSuccess() {
    document.getElementById('confirmState').classList.add('hidden');
    document.getElementById('successState').classList.remove('hidden');
}

function redirectAfterLogout() {
    const type = localStorage.getItem('loginType');
    localStorage.removeItem('loginType');
    if (type === 'alumni') {
        window.location.href = '/login/alumni';
    } else {
        window.location.href = '/login/student';
    }
}
</script>
