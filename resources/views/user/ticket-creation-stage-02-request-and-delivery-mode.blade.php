<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServeIt - Request & Delivery Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; transition: border-color 0.3s ease; }
        .lofi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); transition: box-shadow 0.3s ease; }
        body.dark-mode { background-color: #121212; color: #ffffff; }
        .dark-mode .bg-white { background-color: #1e1e1e !important; color: white; }
        .dark-mode .lofi-border { border-color: #ffffff; }
        .dark-mode .lofi-shadow { box-shadow: 8px 8px 0px 0px #ffffff; }
        .dark-mode input, .dark-mode select, .dark-mode textarea { background-color: #2d2d2d; color: white; }
        .dark-mode .bg-[#BDDBFF] { color: #000; }
        .dark-mode .bg-[#C4C4C4] { background-color: #444 !important; }
        .dark-mode .bg-[#FFD6D7] { color: #000; }
        .dark-mode .text-gray-500 { color: #aaa; }
        .cursor-pointer { cursor: pointer; }
    </style>
</head>
<body class="bg-[#FBF7EB] min-h-screen flex font-sans text-black transition-colors duration-300">
<main class="flex-1 p-12 overflow-y-auto">
    <header class="flex justify-center items-center mb-10 border-b-4 border-black pb-4">
        <div class="text-3xl font-black italic uppercase">
            ServeIt: <span class="font-bold not-italic text-xl normal-case">University Ticket Management System</span>
        </div>
    </header>
    <div class="max-w-6xl mx-auto flex gap-10">
        <div class="flex-1 space-y-8">
            <div class="bg-[#BDDBFF] lofi-border lofi-shadow rounded-3xl overflow-hidden">
                <div class="bg-[#C4C4C4] border-b-4 border-black p-4 text-center">
                    <h2 class="text-2xl font-black uppercase tracking-widest text-black">Request Details</h2>
                </div>
                <div class="p-8 space-y-6">
                    <div class="flex items-end gap-6">
                        <div class="flex-1">
                            <label class="font-black uppercase text-xs mb-2 block opacity-70">Order Date:</label>
                            <div class="flex gap-2">
                                <select id="month-select" class="flex-1 p-3 lofi-border rounded-xl font-bold bg-white appearance-none outline-none">
                                    <option value="" disabled>Select Month</option>
                                    <option value="0">January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                    <option value="4">May</option>
                                    <option value="5">June</option>
                                    <option value="6">July</option>
                                    <option value="7">August</option>
                                    <option value="8">September</option>
                                    <option value="9">October</option>
                                    <option value="10">November</option>
                                    <option value="11">December</option>
                                </select>
                                <select id="day-select" class="w-20 p-3 lofi-border rounded-xl font-bold bg-white text-center outline-none"></select>
                                <input type="number" id="year-input" placeholder="YYYY" min="2024" class="w-24 p-3 lofi-border rounded-xl font-bold bg-white text-center outline-none">
                            </div>
                        </div>
                        <div class="bg-[#FFD6D7] lofi-border rounded-2xl p-2 flex items-center gap-4 px-4 h-[60px]">
                            <button onclick="updateQty(-1)" class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center font-bold text-xl hover:scale-110 active:scale-90 transition-all">−</button>
                            <span class="font-black uppercase text-sm">QTY</span>
                            <span id="qty-val" class="text-3xl font-black min-w-[30px] text-center">1</span>
                            <button onclick="updateQty(1)" class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center font-bold text-xl hover:scale-110 active:scale-90 transition-all">+</button>
                        </div>
                    </div>
                    <div>
                        <label class="font-black uppercase text-xs mb-2 block opacity-70">Purpose of request:</label>
                        <input type="text" id="purpose-input" placeholder="e.g., Job Application, Further Studies" class="w-full p-4 lofi-border rounded-2xl font-bold bg-white outline-none focus:bg-[#FDF6CC] transition-all">
                    </div>
                </div>
            </div>

            <div class="bg-[#BDDBFF] lofi-border lofi-shadow rounded-3xl overflow-hidden">
                <div class="bg-[#C4C4C4] border-b-4 border-black p-4 text-center">
                    <h2 class="text-2xl font-black uppercase tracking-widest text-black">Delivery Details</h2>
                </div>
                <div class="p-8 grid grid-cols-2 gap-10">
                    <div class="space-y-4">
                        <label class="font-black uppercase text-xs block opacity-70">How do you want to receive the document?</label>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 cursor-pointer delivery-option" data-option="Email">
                                <div class="w-8 h-8 lofi-border bg-white flex items-center justify-center text-[#1747E7] font-black">✓</div>
                                <span class="font-black">Email</span>
                            </div>
                            <div class="flex items-center gap-3 cursor-pointer delivery-option" data-option="In-person Pick-up">
                                <div class="w-8 h-8 lofi-border bg-white flex items-center justify-center text-[#1747E7] font-black">✓</div>
                                <span class="font-black">In-person Pick-up</span>
                            </div>
                            <div class="flex items-center gap-3 cursor-pointer delivery-option" data-option="Physical Mail">
                                <div class="w-8 h-8 lofi-border bg-white flex items-center justify-center text-[#1747E7] font-black">✓</div>
                                <span class="font-black">Physical Mail</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="font-black uppercase text-xs mb-2 block opacity-70">Additional Notes / Instruction:</label>
                        <textarea id="notes-input" rows="4" placeholder="Any specific instructions for the registrar..." class="w-full p-4 lofi-border rounded-2xl font-bold bg-white outline-none focus:bg-[#FDF6CC] resize-none transition-all"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-80 space-y-6 pt-20">
            <div class="bg-white lofi-border lofi-shadow rounded-2xl p-6 relative">
                <p class="text-gray-500 font-bold text-xl uppercase tracking-tighter">Total</p>
                <p class="text-4xl font-black text-right mt-2">₱ <span id="total-price">0.00</span></p>
            </div>
            <button onclick="goToStage3()" class="w-full py-6 bg-[#FFD43B] text-black lofi-border lofi-shadow rounded-2xl font-black text-4xl uppercase hover:bg-black hover:text-white transition-all active:translate-y-1">
                Next
            </button>
        </div>
    </div>
</main>

<script>
const urlParams = new URLSearchParams(window.location.search);
const basePrice = parseFloat(urlParams.get('price')) || 150;
let qty = 1;
const monthSelect = document.getElementById('month-select');
const daySelect = document.getElementById('day-select');
const yearInput = document.getElementById('year-input');

function updateQty(val) {
    qty += val;
    if(qty < 1) qty = 1;
    document.getElementById('qty-val').innerText = qty;
    refreshTotal();
}

function refreshTotal() {
    const total = qty * basePrice;
    document.getElementById('total-price').innerText = total.toFixed(2);
}

function updateDays() {
    const month = parseInt(monthSelect.value);
    const year = parseInt(yearInput.value);
    if (isNaN(month) || isNaN(year)) return;
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    daySelect.innerHTML = '';
    for (let d = 1; d <= daysInMonth; d++) {
        const opt = document.createElement('option');
        opt.value = d;
        opt.text = d;
        daySelect.appendChild(opt);
    }
}

monthSelect.addEventListener('change', updateDays);
yearInput.addEventListener('input', updateDays);

document.querySelectorAll('.delivery-option').forEach(option => {
    option.addEventListener('click', () => {
        const checkbox = option.querySelector('div');
        checkbox.textContent = checkbox.textContent === '' ? '✓' : '';
    });
});

window.onload = () => {
    const today = new Date();
    monthSelect.value = today.getMonth();
    yearInput.value = today.getFullYear();
    updateDays();
    daySelect.value = today.getDate();
    refreshTotal();
    if (localStorage.getItem('theme') === 'dark') document.body.classList.add('dark-mode');
};

function goToStage3() {
    const selectedDate = `${yearInput.value}-${parseInt(monthSelect.value)+1}-${daySelect.value}`;
    const selectedDelivery = Array.from(document.querySelectorAll('.delivery-option'))
        .filter(opt => opt.querySelector('div').textContent === '✓')
        .map(opt => opt.dataset.option)
        .join(', ') || 'Not selected';
    const purpose = document.getElementById('purpose-input').value || 'N/A';
    const notes = document.getElementById('notes-input').value || 'N/A';
    const finalTotal = (qty * basePrice).toFixed(2);

    const query = `?total=${finalTotal}&date=${selectedDate}&delivery=${encodeURIComponent(selectedDelivery)}&purpose=${encodeURIComponent(purpose)}&notes=${encodeURIComponent(notes)}`;
    window.location.href = "{{ route('user.ticket.stage03') }}" + query;
}
</script>
</body>
</html>
