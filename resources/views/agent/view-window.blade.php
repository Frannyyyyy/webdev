<div id="ticketModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center hidden p-4">
    <div class="bg-white w-full max-w-[1000px] lofi-border rounded-3xl lofi-shadow p-8 relative overflow-y-auto max-h-[95vh]">
        <button onclick="closeModal()" class="absolute top-4 right-6 text-4xl font-black hover:text-red-600 transition-colors">&times;</button>
        <h2 class="text-[#D93025] text-4xl font-black text-center mb-6">Ticket Details</h2>

        <div class="flex flex-col md:flex-row gap-8">
            {{-- Student Info --}}
            <div class="flex-[1.2]">
                <h3 class="text-2xl font-black text-center mb-2 uppercase tracking-tight">Student Information</h3>
                <div class="border-t-[3px] border-black mb-4"></div>

                <div class="flex justify-between items-start mb-6">
                    <div class="space-y-1 font-bold text-lg">
                        <p><span class="inline-block w-32">Name:</span> Deanne Mata</p>
                        <p><span class="inline-block w-32">Student ID:</span> 2023-0501-MN-0</p>
                        <p><span class="inline-block w-32">Course:</span> BSIT</p>
                        <p><span class="inline-block w-32">Year:</span> 3rd Year</p>
                    </div>

                    <div class="w-32 h-28 bg-[#F5E6DA] lofi-border rounded-lg flex items-center justify-center text-[10px] text-center p-2 font-black uppercase">
                        Student Photo
                    </div>
                </div>

                <div class="space-y-1 font-bold mb-6 border-l-4 border-black pl-4">
                    <p><span class="text-gray-600">Document:</span> Transcript of Records (TOR)</p>
                    <p><span class="text-gray-600">Purpose:</span> Scholarship</p>
                    <p><span class="text-gray-600">Date Filed:</span> 01/04/2026 9:30 AM</p>
                </div>

                <div class="border-t-[3px] border-black my-6"></div>
                <h3 class="text-xl font-black mb-4 uppercase">Internal Notes (History)</h3>
                <div class="bg-[#F5E6DA] lofi-border rounded-xl p-4 min-h-[100px] relative font-bold italic">
                    - Student called about the delay regarding payment verification...
                    <span class="absolute bottom-2 right-4 text-[10px] text-gray-500 not-italic uppercase font-black cursor-pointer">Click to Edit</span>
                </div>
            </div>

            <div class="hidden md:block w-1.5 bg-black/20 rounded-full"></div>

            {{-- Agent Actions --}}
            <div class="flex-1">
                <h3 class="text-2xl font-black text-center mb-2 uppercase tracking-tight">Agent Actions</h3>
                <div class="border-t-[3px] border-black mb-6"></div>

                {{-- Step 1 --}}
                <div class="mb-8">
                    <p class="font-black text-lg mb-2">Step 1: Payment Verification</p>
                    <div class="flex items-center gap-4">
                        <button class="btn-retro bg-[#00C2CB] px-6 py-2">Confirm</button>
                        <p class="text-[11px] font-bold leading-tight text-gray-700">Click "Confirm" if the student uploaded the correct receipt.</p>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="mb-8">
                    <p class="font-black text-lg">Step 2: Update Progress</p>
                    <p class="text-sm font-bold mt-1 italic text-blue-700 underline">Update status in "Assigned Tickets Tab"</p>
                </div>

                {{-- Step 3 --}}
                <div class="mt-4">
                    <p class="font-black text-lg mb-3">Step 3: Encountered a Problem?</p>
                    <div class="bg-[#EFA34B] lofi-border rounded-xl p-5 lofi-shadow">
                        <label class="text-xs font-black uppercase mb-1 block">Reason for Escalation</label>
                        <select class="w-full p-2 lofi-border rounded-md mb-3 text-sm font-bold">
                            <option>Duplicate Request</option>
                            <option>Missing Proof of Payment</option>
                            <option>Overdue Review</option>
                        </select>

                        <label class="text-xs font-black uppercase mb-1 block">Internal Remarks</label>
                        <textarea class="w-full p-2 lofi-border text-sm h-20 mb-4 font-medium" placeholder="Add optional notes..."></textarea>

                        <div class="flex justify-between items-center">
                            <button class="btn-retro bg-[#D93025] text-white px-4 py-2 text-xs">ESCALATE</button>
                            <button onclick="closeModal()" class="btn-retro bg-[#555] text-white px-6 py-2 text-xs">NEXT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
