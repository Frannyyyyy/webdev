<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Step 2 – ServeIt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; }
        .lofi-shadow { box-shadow: 10px 10px 0px 0px rgba(0,0,0,1); }
        .inner-shadow { box-shadow: inset 5px 5px 0px 0px rgba(0,0,0,0.1); }
        
        .custom-checkbox {
            width: 24px;
            height: 24px;
            border: 3px solid black;
            appearance: none;
            background: white;
            cursor: pointer;
            position: relative;
        }
        .custom-checkbox:checked { background: black; }
        .custom-checkbox:checked::after {
            content: '✔';
            color: white;
            position: absolute;
            top: -4px;
            left: 3px;
            font-size: 16px;
        }
    </style>
</head>
<body class="bg-[#FBF7EB] min-h-screen p-8 font-sans text-black">

    <div class="flex items-center gap-4 mb-8">
        <img src="{{ asset('images/logo.png') }}" class="h-20">
        <h1 class="text-4xl font-black uppercase tracking-tight">Servelt: University Ticket Management System</h1>
    </div>

    <div class="text-center mb-16">
        <h2 class="text-7xl font-black uppercase tracking-tighter">Registration</h2>
        <p class="text-gray-500 font-bold mt-2 text-lg">Lorem ipsum. Lorem ipsum. Lorem ipsum. Lorem ipsum.</p>
    </div>

    <div class="max-w-5xl mx-auto relative">
        
        <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-black text-white px-12 py-4 rounded-full z-20 border-4 border-black">
            <span class="font-black uppercase text-2xl tracking-widest">Personal Information</span>
        </div>

        <div class="bg-[#FFD6D7] lofi-border lofi-shadow rounded-[50px] pt-20 p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="font-black uppercase text-lg ml-4">First name:</label>
                        <input type="text" class="w-full h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-6 font-bold text-lg outline-none">
                    </div>

                    <div class="space-y-2">
                        <label class="font-black uppercase text-lg ml-4">Middle name:</label>
                        <input type="text" class="w-full h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-6 font-bold text-lg outline-none">
                        <label class="flex items-center gap-3 ml-4 mt-2 cursor-pointer font-bold uppercase text-xs">
                            <input type="checkbox" class="custom-checkbox"> I don't have a middle name.
                        </label>
                    </div>

                    <div class="space-y-2">
                        <label class="font-black uppercase text-lg ml-4">Last name:</label>
                        <input type="text" class="w-full h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-6 font-bold text-lg outline-none">
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="font-black uppercase text-lg ml-4">Date of birth:</label>
                        <div class="flex gap-4">
                            <select class="flex-1 h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-4 font-black uppercase text-sm cursor-pointer outline-none">
                                <option disabled selected>Month</option>
                                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>

                            <select class="w-24 h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-2 font-black uppercase text-sm cursor-pointer text-center outline-none">
                                <option disabled selected>Date</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
                                @endfor
                            </select>

                            <select class="w-32 h-14 lofi-border rounded-full bg-[#E5E3D6] inner-shadow px-2 font-black uppercase text-sm cursor-pointer text-center outline-none">
                                <option disabled selected>Year</option>
                                @for ($i = date('Y'); $i >= 1950; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="font-black uppercase text-lg ml-4">Permanent Address:</label>
                        <textarea class="w-full h-40 lofi-border rounded-[30px] bg-[#E5E3D6] inner-shadow p-6 font-bold text-lg outline-none resize-none"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-12">
            <div class="flex justify-center mt-10 mb-10">
            <a href="/registration/registration-step-3" class="bg-[#E5E3D6] lofi-border lofi-shadow rounded-full px-28 py-5 font-black text-3xl uppercase hover:bg-black hover:text-white transition-all transform hover:-translate-y-1 active:translate-y-1">
                Next
            </a>
        </div>
    </div>
    
        <div class="bg-[#E5E3D6] lofi-border lofi-shadow rounded-full px-12 py-4 w-full text-center border-4 border-black">
            <p class="font-black text-sm uppercase tracking-tighter">
                By clicking signing up you agree to our <span class="underline decoration-2">Terms of Service</span> and <span class="underline decoration-2">Privacy Policy</span>
            </p>
        </div>
    </div>

</body>
</html>