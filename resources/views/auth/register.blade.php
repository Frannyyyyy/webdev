<body class="bg-[#FDF6CC] p-10">
    <div class="max-w-5xl mx-auto bg-white border-8 border-black shadow-[12px_12px_0px_0px_rgba(0,0,0,1)]">
        <div class="bg-black text-white p-4">
            <h2 class="text-xl font-black uppercase tracking-widest">Registration — Educational Information</h2>
        </div>

        <div class="p-10 bg-[#BDDBFF]">
            <div class="grid lg:grid-cols-2 gap-12">
                <div class="space-y-6">
                    <h3 class="font-black text-2xl uppercase underline">Program Status</h3>
                    <div class="space-y-4">
                        @foreach(['Graduated', 'Undergraduate', 'Unfinished degree'] as $status)
                        <label class="flex items-center gap-4 cursor-pointer group">
                            <input type="radio" name="prog_status" class="w-8 h-8 border-4 border-black appearance-none checked:bg-black bg-white transition-all">
                            <span class="font-black text-xl uppercase group-hover:text-[#1747E7]">{{ $status }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block font-black text-xl uppercase mb-2">Program:</label>
                        <select class="w-full border-4 border-black p-3 bg-white font-bold">
                            <option>Bachelor's Degree (Traditional)</option>
                            <option>Itech</option>
                            <option>Open University</option>
                            <option>Graduate School</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-black text-xl uppercase mb-2">Year Admitted in PUP:</label>
                        <input type="number" placeholder="20XX" class="w-full border-4 border-black p-3 font-bold">
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center border-t-4 border-black pt-8">
                <p class="text-sm font-bold italic mb-6">By clicking signing up you agree to our Terms of Service and Privacy Policy</p>
                <button class="w-full lg:w-1/2 bg-[#1747E7] text-white py-6 border-4 border-black font-black text-3xl hover:bg-black transition-all">
                    SUBMIT
                </button>
            </div>
        </div>
    </div>
</body>