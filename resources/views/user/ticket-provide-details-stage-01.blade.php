<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServeIt - Required Ticket Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; transition: border-color 0.3s ease; }
        .lofi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); transition: box-shadow 0.3s ease; }
        body.dark-mode { background-color: #121212; color: #ffffff; }
        .dark-mode aside, .dark-mode .bg-white { background-color: #1e1e1e !important; color: #ffffff !important; }
        .dark-mode .lofi-border { border-color: #ffffff; }
        .dark-mode .lofi-shadow { box-shadow: 8px 8px 0px 0px #ffffff; }
        .dark-mode input, .dark-mode select { background-color: #2d2d2d; color: white; }
        .dark-mode .bg-[#BDDBFF] { color: #000; }
        .dark-mode .text-black { color: #ffffff !important; }
        .dark-mode .bg-[#C4C4C4] { background-color: #444 !important; }
    </style>
</head>
<body class="bg-[#FBF7EB] min-h-screen flex font-sans text-black transition-colors duration-300">

    <main class="flex-1 p-12 overflow-y-auto">

        <div class="text-center mb-10">
            <h1 class="text-5xl font-black uppercase italic tracking-tight">Required Ticket Details</h1>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="bg-[#BDDBFF] lofi-border lofi-shadow rounded-3xl overflow-hidden">
                <div class="bg-[#C4C4C4] border-b-4 border-black p-4 text-center">
                    <h2 class="text-2xl font-black uppercase tracking-widest text-black">Student Information</h2>
                </div>

                <form id="studentForm" class="p-10 space-y-8">
                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex flex-col gap-2">
                            <label class="font-black uppercase text-xs opacity-70">Email address (Use your personal email):</label>
                            <input type="email" required placeholder="example@email.com" class="p-4 lofi-border rounded-2xl font-bold bg-white text-black focus:bg-[#FDF6CC] outline-none transition-all">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="font-black uppercase text-xs opacity-70">Student ID:</label>
                            <input type="text" required placeholder="2023-XXXXX" class="p-4 lofi-border rounded-2xl font-bold bg-white text-black focus:bg-[#FDF6CC] outline-none transition-all">
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-black uppercase text-xs opacity-70">Full Name (Last Name, First Name, Middle Initial):</label>
                        <input type="text" required placeholder="Dela Cruz, Juan, A." class="p-4 lofi-border rounded-2xl font-bold bg-white text-black focus:bg-[#FDF6CC] outline-none transition-all">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="font-black uppercase text-xs">Current Home Address (No., Street, Barangay, City/Town, Zip Code):</label>
                        <input type="text" required placeholder="Enter complete address" class="p-4 lofi-border rounded-2xl font-bold bg-white text-black focus:bg-[#FDF6CC] outline-none transition-all">
                    </div>

                    <div class="grid grid-cols-2 gap-10">
                        <div class="flex flex-col gap-2">
                            <label class="font-black uppercase text-xs">Program (Do Not Abbreviate):</label>
                            <input type="text" required placeholder="Bachelor of Science in ..." class="p-4 lofi-border rounded-2xl font-bold bg-white text-black focus:bg-[#FDF6CC] outline-none transition-all">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="font-black uppercase text-xs">College Department:</label>
                            <div class="relative">
                                <select required class="w-full p-4 lofi-border rounded-2xl font-bold bg-white text-black appearance-none cursor-pointer outline-none">
                                    <option value="" disabled selected>Select department</option>
                                    <option value="CCS">College of Computer Studies</option>
                                    <option value="CBA">College of Business Administration</option>
                                    <option value="CAS">College of Arts and Sciences</option>
                                    <option value="COE">College of Engineering</option>
                                </select>
                                <span class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none">▼</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-12 flex justify-center">
                <button onclick="goToStage2()" class="px-16 py-6 bg-black text-white lofi-border lofi-shadow rounded-full font-black text-3xl uppercase hover:bg-[#1747E7] hover:-translate-y-1 transition-all active:translate-y-1">
                    Next Step
                </button>
            </div>
        </div>
    </main>

    <script>
        function goToStage2() {
            const urlParams = new URLSearchParams(window.location.search);
            const price = urlParams.get('price') || '150'; 
            
            // Correct URL
            window.location.href = "{{ route('user.ticket.stage02') }}?price=" + price;
        }


        window.onload = () => {
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
            }
        };
    </script>
</body>
</html>