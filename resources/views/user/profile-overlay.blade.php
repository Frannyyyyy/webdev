<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServeIt - Profile Overlay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;700;900&display=swap');

        body { font-family: 'Public Sans', sans-serif; }
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); }
        .lofi-input { background-color: #FFD6D7; border: 4px solid #000; padding: 12px; font-weight: 900; text-transform: uppercase; width: 100%; outline: none; }
        .lofi-input:focus { background-color: #fff; }
        
        #profileOverlay {
            transition: opacity 0.4s ease;
        }

        #profileModal {
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            transform: scale(0.9);
        }

        #profileOverlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        #profileOverlay.active #profileModal {
            transform: scale(1);
        }

        .blur-bg {
            backdrop-filter: blur(8px);
        }
    </style>

    <div id="profileOverlay" class="fixed inset-0 bg-black/40 opacity-0 pointer-events-none z-50 flex items-center justify-center blur-bg">
        <div id="profileModal" class="bg-[#FBF7EB] lofi-border lofi-shadow rounded-[50px] w-full max-w-2xl p-12 relative mx-4">
            <img src="{{ asset('images/logo.png') }}" class="absolute top-10 right-10 h-8">
            
            <button onclick="toggleProfile()" class="absolute top-10 left-10 bg-[#BDDBFF] lofi-border px-4 py-2 font-black uppercase rounded-xl hover:bg-white transition-all">
                ← Close
            </button>

            <div class="flex flex-col items-center mb-8 mt-6">
                <h1 class="text-5xl font-black uppercase italic tracking-tighter mb-6">Hi Deanne!</h1>
                <div class="w-32 h-32 bg-[#D9D6D2] lofi-border rounded-full overflow-hidden mb-3">
                    <img src="{{ asset('images/studentlogo.png') }}" class="w-full h-full object-cover">
                </div>
                <button class="text-[12px] font-black uppercase underline hover:text-[#1747E7]">Change Profile Picture</button>
            </div>

            <div id="profileFields" class="space-y-4 mb-8">
                <div>
                    <label class="block text-[10px] font-black uppercase mb-1 ml-1">Full Name</label>
                    <input type="text" value="Deanne" class="lofi-input">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase mb-1 ml-1">Student Number</label>
                    <input type="text" value="2021-10042" class="lofi-input">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase mb-1 ml-1">Email Address</label>
                    <input type="email" value="deanne@sample.edu.ph" class="lofi-input">
                </div>
            </div>

            <div id="passwordFields" class="hidden space-y-4 mb-8">
                <div>
                    <label class="block text-[10px] font-black uppercase mb-1 ml-1">Old Password</label>
                    <input type="password" placeholder="••••••••" class="lofi-input">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase mb-1 ml-1">New Password</label>
                    <input type="password" placeholder="••••••••" class="lofi-input">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase mb-1 ml-1">Confirm New Password</label>
                    <input type="password" placeholder="••••••••" class="lofi-input">
                </div>
            </div>

            <div class="flex gap-4">
                <button id="passBtn" onclick="togglePasswordMode()" class="flex-1 py-4 bg-white lofi-border font-black uppercase rounded-2xl hover:bg-[#FFD6D7] transition-all">
                    Change Password
                </button>
                <button class="flex-1 py-4 bg-[#1747E7] text-white lofi-border font-black uppercase rounded-2xl hover:bg-black transition-all">
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    <script>
        function toggleProfile() {
            const overlay = document.getElementById('profileOverlay');
            overlay.classList.toggle('active');
            
            if(!overlay.classList.contains('active')) {
                setTimeout(() => {
                    resetForm();
                }, 400);
            }
        }

        function togglePasswordMode() {
            const profileFields = document.getElementById('profileFields');
            const passwordFields = document.getElementById('passwordFields');
            const passBtn = document.getElementById('passBtn');

            if (passwordFields.classList.contains('hidden')) {
                profileFields.classList.add('hidden');
                passwordFields.classList.remove('hidden');
                passBtn.innerText = "Back to Profile";
            } else {
                profileFields.classList.remove('hidden');
                passwordFields.classList.add('hidden');
                passBtn.innerText = "Change Password";
            }
        }

        function resetForm() {
            document.getElementById('profileFields').classList.remove('hidden');
            document.getElementById('passwordFields').classList.add('hidden');
            document.getElementById('passBtn').innerText = "Change Password";
        }

        document.getElementById('profileOverlay').addEventListener('click', function(e) {
            if (e.target === this) toggleProfile();
        });
    </script>

</body>
</html>
