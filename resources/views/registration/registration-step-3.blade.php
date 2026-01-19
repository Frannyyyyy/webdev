<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Step 3 – ServeIt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 10px 10px 0px 0px rgba(0,0,0,1); }
        .inner-shadow { box-shadow: inset 5px 5px 0px 0px rgba(0,0,0,0.1); }
        input[type="checkbox"] { width: 30px; height: 30px; border: 4px solid black; cursor: pointer; appearance: none; background: white; position: relative; }
        input[type="checkbox"]:checked { background: #000; }
        input[type="checkbox"]:checked::after { content: '✔'; color: white; position: absolute; top: -5px; left: 4px; font-size: 20px; }
    </style>
</head>
<body class="bg-[#FBF7EB] min-h-screen p-8 font-sans text-black">

    <div class="flex items-center gap-4 mb-8">
        <img src="{{ asset('images/logo.png') }}" class="h-20">
        <h1 class="text-4xl font-black uppercase tracking-tight">Servelt: University Ticket Management System</h1>
    </div>

    <div class="text-center mb-12">
        <h2 class="text-7xl font-black uppercase tracking-tighter">Registration</h2>
        <p class="text-gray-500 font-bold mt-2 text-lg italic">Final Step: Academic Details</p>
    </div>

    <div class="max-w-5xl mx-auto relative">
        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-black text-white px-12 py-4 rounded-full z-20 border-4 border-black">
            <span class="font-black uppercase text-2xl tracking-widest">Educational Information</span>
        </div>

        <div class="bg-[#FFD6D7] lofi-border lofi-shadow rounded-[50px] pt-16 p-12 space-y-10">
            
            <div class="space-y-4">
                <label class="font-black uppercase text-xl block">Program status:</label>
                <div class="flex flex-wrap gap-10">
                    <label class="flex items-center gap-3 font-bold uppercase cursor-pointer">
                        <input type="checkbox"> Graduated
                    </label>
                    <label class="flex items-center gap-3 font-bold uppercase cursor-pointer">
                        <input type="checkbox"> Undergraduate
                    </label>
                    <label class="flex items-center gap-3 font-bold uppercase cursor-pointer">
                        <input type="checkbox"> Unfinished Degree
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label class="font-black uppercase text-lg">Program:</label>
                    <input type="text" class="w-full h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-6 font-bold">
                </div>
                <div class="space-y-3">
                    <label class="font-black uppercase text-lg">Registrar:</label>
                    <input type="text" class="w-full h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-6 font-bold">
                </div>
                <div class="space-y-3">
                    <label class="font-black uppercase text-lg">Year admitted in PUP:</label>
                    <select class="w-full h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-6 font-black uppercase">
                        <option>Dropdown</option>
                    </select>
                </div>
                <div class="space-y-3">
                    <label class="font-black uppercase text-lg">Admitted as:</label>
                    <select class="w-full h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-6 font-black uppercase">
                        <option>Dropdown</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 pt-6 border-t-4 border-black border-dashed">
                <label class="flex items-center gap-3 font-bold uppercase text-xs">
                    <input type="checkbox"> Graduate School
                </label>
                <label class="flex items-center gap-3 font-bold uppercase text-xs">
                    <input type="checkbox"> Itech
                </label>
                <label class="flex items-center gap-3 font-bold uppercase text-xs">
                    <input type="checkbox"> College of Law
                </label>
                <label class="flex items-center gap-3 font-bold uppercase text-xs">
                    <input type="checkbox" checked> Bachelor's Degree
                </label>
                <label class="flex items-center gap-3 font-bold uppercase text-xs">
                    <input type="checkbox"> Open University
                </label>
            </div>
        </div>

        <div class="flex justify-center mt-12 mb-10">
            <button type="submit" class="bg-black text-white lofi-border lofi-shadow rounded-full px-28 py-5 font-black text-3xl uppercase hover:bg-[#1747E7] transition-all transform hover:-translate-y-2">
                Submit
            </button>
        </div>
    </div>
</body>
</html>