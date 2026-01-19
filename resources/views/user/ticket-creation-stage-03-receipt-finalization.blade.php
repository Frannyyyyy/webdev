<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServeIt - Receipt Finalization</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lofi-border { border: 4px solid #000; transition: border-color 0.3s ease; }
        .lofi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); transition: box-shadow 0.3s ease; }
        body.dark-mode { background-color: #121212; color: #ffffff; }
        .dark-mode .bg-white { background-color: #1e1e1e !important; color: white; }
        .dark-mode .lofi-border { border-color: #ffffff; }
        .dark-mode .lofi-shadow { box-shadow: 8px 8px 0px 0px #ffffff; }
        .dark-mode #receipt-card { background-color: #2d2d2d !important; color: white; }
        #notification { transition: all 0.3s ease; }
    </style>
</head>
<body class="bg-[#FBF7EB] min-h-screen flex font-sans text-black transition-colors duration-300">

<div id="notification" class="fixed top-10 left-1/2 -translate-x-1/2 bg-[#FFD43B] text-black lofi-border lofi-shadow rounded-2xl p-6 text-center font-black text-lg uppercase opacity-0 pointer-events-none z-50 max-w-md">
    Ticket successfully submitted!<br>
    Click <span id="notification-okay" class="underline cursor-pointer">Okay</span> to go back to Dashboard.
</div>

<main class="flex-1 p-12 overflow-y-auto">
<header class="flex justify-center items-center mb-10 border-b-4 border-black pb-4">
    <div class="text-3xl font-black italic uppercase">
        ServeIt: <span class="font-bold not-italic text-xl normal-case">University Ticket Management System</span>
    </div>
</header>

<div class="max-w-3xl mx-auto space-y-10">
    <div class="bg-[#BDDBFF] lofi-border lofi-shadow rounded-[40px] p-10 text-center">
        <h2 class="text-3xl font-black uppercase tracking-tight mb-8 text-black">
            Kindly settle your bill in the registrar
        </h2>

        <div id="receipt-card" class="bg-white lofi-border rounded-3xl p-8 space-y-6">
            <div class="flex justify-between items-center border-b-2 border-black/10 pb-4">
                <span class="font-black uppercase text-sm opacity-60">Document Fee:</span>
                <span class="font-black text-4xl">₱ <span id="display-total">0.00</span></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-black uppercase text-sm opacity-60">Requested Date:</span>
                <span id="display-date">-</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-black uppercase text-sm opacity-60">Delivery Method:</span>
                <span id="display-delivery">-</span>
            </div>
            <div>
                <span class="font-black uppercase text-sm opacity-60">Purpose:</span>
                <p id="display-purpose">-</p>
            </div>
            <div>
                <span class="font-black uppercase text-sm opacity-60">Notes:</span>
                <p id="display-notes">-</p>
            </div>
        </div>
        <p class="mt-6 text-xs font-bold uppercase opacity-70 text-black">
            * Please present your Student ID and this digital receipt upon payment.
        </p>
    </div>

    <div class="flex flex-col items-center gap-4">
        <button onclick="submitTicket()" class="w-full max-w-md py-6 bg-black text-white lofi-border lofi-shadow rounded-full font-black text-3xl uppercase hover:bg-[#1747E7] hover:-translate-y-1 transition-all active:translate-y-1">
            Submit
        </button>
        <button onclick="window.history.back()" class="font-black uppercase italic hover:underline underline-offset-4 decoration-2">
            ← Back to Request Details
        </button>
    </div>
</div>
</main>

<script>
window.onload = () => {
    const urlParams = new URLSearchParams(window.location.search);

    document.getElementById('display-total').innerText = urlParams.get('total') || '0.00';
    document.getElementById('display-date').innerText = urlParams.get('date') || '-';
    document.getElementById('display-delivery').innerText = decodeURIComponent(urlParams.get('delivery') || '-');
    document.getElementById('display-purpose').innerText = decodeURIComponent(urlParams.get('purpose') || '-');
    document.getElementById('display-notes').innerText = decodeURIComponent(urlParams.get('notes') || '-');

    if (localStorage.getItem('theme') === 'dark') document.body.classList.add('dark-mode');
};

function submitTicket() {
    const notification = document.getElementById('notification');
    notification.classList.remove('opacity-0', 'pointer-events-none');
    notification.classList.add('opacity-100');

    const okayBtn = document.getElementById('notification-okay');
    okayBtn.onclick = () => {
        window.location.href = "{{ route('user.dashboard') }}";
    };
}
</script>
</body>
</html>
