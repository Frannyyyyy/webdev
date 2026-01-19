<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServeIt - University Ticket Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .lo-fi-border { border: 4px solid black; }
        .lo-fi-shadow { box-shadow: 8px 8px 0px 0px rgba(0,0,0,1); }
        
        .hover-shadow-grow:hover {
            box-shadow: 12px 12px 0px 0px rgba(0,0,0,1);
            transform: translate(-4px, -4px);
        }

        .logo-hover:hover {
            transform: scale(1.05) rotate(-2deg);
            filter: drop-shadow(15px 15px 0px rgba(0,0,0,0.1));
        }

        .snappy-transition { transition: all 0.15s cubic-bezier(0, 0, 0.2, 1); }
        
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#FBF7EB] text-black selection:bg-[#FFFE65]">

    <section class="min-h-screen flex flex-col items-center justify-center p-6 bg-[#D1D5DB]">
        <div class="relative mb-12">
            <div class="bg-[#FFFE65] lo-fi-border rounded-full px-16 py-8 lo-fi-shadow text-center logo-hover cursor-pointer snappy-transition">
                <p class="text-xs tracking-[0.4em] font-black mb-2 uppercase">Ask . Track . Resolve</p>
                <img src="{{ asset('images/logo.png') }}" alt="Serve It Logo" class="h-72 mx-auto">
            </div>
        </div>

        <div class="max-w-3xl text-center">
            <h2 class="text-3xl font-black mb-4 uppercase">University Ticket Management System</h2>
            <p class="text-lg mb-8 font-bold leading-tight">
                Servelt is designed to streamline student document requests and accelerate document pickup processes.
            </p>
            <a href="/start" class="inline-block bg-black text-white text-2xl px-16 py-5 lo-fi-border hover:bg-[#1747E7] hover-shadow-grow snappy-transition font-black uppercase">
                Start
            </a>
        </div>
    </section>

    <section class="grid md:grid-cols-2 border-t-4 border-black">
        <div class="p-12 bg-white flex flex-col justify-center border-b-4 md:border-b-0 md:border-r-4 border-black">
            <h3 class="text-3xl font-black underline mb-6 uppercase">About Us</h3>
            <p class="text-lg font-bold mb-6">
                Efficient processing and timely document release across university offices.
            </p>
            <img src="{{ asset('images/info.png') }}" class="w-24 opacity-30">
        </div>
        
        <div class="p-12 bg-[#FFDDA3] flex flex-col justify-center">
            <h3 class="text-2xl font-black mb-4 uppercase italic">Announcement:</h3>
            <div class="space-y-4 border-l-8 border-black pl-6 font-black text-sm uppercase">
                <p>• Ensure all receipts are clear for verification.</p>
                <p>• System update scheduled for Registrar offices.</p>
                <p>• Check "Help" for the complete list of fees.</p>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="py-24 bg-white border-t-4 border-black overflow-hidden relative">
        <h2 class="text-4xl font-black text-center mb-10 uppercase italic underline decoration-8 decoration-[#BDDBFF] underline-offset-8">How Our System Works</h2>
        
        <div class="overflow-x-auto no-scrollbar">
            <div class="flex items-center justify-start lg:justify-center min-w-max mx-auto px-20 h-80 relative">
                @php
                    $steps = [
                        ['img' => 't1.png', 'label' => 'Document Request Submitted'],
                        ['img' => 't2.png', 'label' => 'Awaiting Receipt Upload'],
                        ['img' => 't3.png', 'label' => 'Payment Verification'],
                        ['img' => 't4.png', 'label' => 'Document Processing'],
                        ['img' => 't5.png', 'label' => 'Ready for Pickup']
                    ];
                @endphp

                @foreach($steps as $step)
                    <div class="flex flex-col items-center w-48 group cursor-pointer step-item">
                        <div class="w-36 h-36 bg-[#BDDBFF] rounded-full lo-fi-border flex items-center justify-center mb-6 lo-fi-shadow group-hover:-translate-y-6 group-hover:bg-[#FFFE65] snappy-transition">
                            <img src="{{ asset('images/' . ($step['img'] ?? 'info.png')) }}" 
                                    class="w-20 h-20 object-contain">
                        </div>
                        <p class="font-black uppercase text-[11px] leading-tight text-center px-4 transition-colors group-hover:text-[#1747E7]">
                            {{ $step['label'] }}
                        </p>
                    </div>

                    @if(!$loop->last)
                        <div class="w-16 flex items-center justify-center mb-16">
                            <span class="text-4xl font-black">→</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="text-center relative h-80 w-full">
            <img src="{{ asset('images/tfp-person.png') }}" alt="System Guide" class="h-80 absolute bottom-0 left-1/2 -translate-x-1/2 transition-all duration-300 ease-out" id="tfp-person" style="filter: drop-shadow(0px 0px 0px rgba(0,0,0,0));">
        </div>

        <script>
            const tfpPerson = document.getElementById('tfp-person');
            const steps = document.querySelectorAll('.step-item');
            const section = document.getElementById('how-it-works');

            steps.forEach(step => {
                step.addEventListener('mouseenter', () => {
                    const stepRect = step.getBoundingClientRect();
                    const sectionRect = section.getBoundingClientRect();
                    
                    const relativeCenter = (stepRect.left + stepRect.width / 2) - sectionRect.left;
                    
                    tfpPerson.style.left = `${relativeCenter}px`;
                    tfpPerson.style.transform = 'translateX(-50%) scale(1.2)';
                    tfpPerson.style.filter = 'drop-shadow(15px 15px 0px rgba(0,0,0,1))';
                });

                step.addEventListener('mouseleave', () => {
                    tfpPerson.style.left = '50%';
                    tfpPerson.style.transform = 'translateX(-50%) scale(1)';
                    tfpPerson.style.filter = 'drop-shadow(0px 0px 0px rgba(0,0,0,0))';
                });
            });
        </script>
    </section>

    <section class="bg-black text-white p-16 border-t-4 border-black">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-16">
            <div class="lo-fi-border border-white p-8">
                <h4 class="text-2xl font-black mb-6 text-[#FFFE65] uppercase underline decoration-4">On-Hold Reasons:</h4>
                <ul class="space-y-4 font-bold text-md uppercase">
                    <li class="flex items-center gap-2"><span class="text-[#FFFE65]">■</span> Missing or unclear receipt</li>
                    <li class="flex items-center gap-2"><span class="text-[#FFFE65]">■</span> Incomplete requirements</li>
                    <li class="flex items-center gap-2"><span class="text-[#FFFE65]">■</span> Waiting for registrar confirmation</li>
                </ul>
            </div>
            <div class="lo-fi-border border-white p-8">
                <h4 class="text-2xl font-black mb-6 text-[#4FC3F7] uppercase underline decoration-4">Escalation Triggers:</h4>
                <ul class="space-y-4 font-bold text-md uppercase">
                    <li class="flex items-center gap-2"><span class="text-[#4FC3F7]">■</span> Processing delay</li>
                    <li class="flex items-center gap-2"><span class="text-[#4FC3F7]">■</span> Agent cannot proceed</li>
                    <li class="flex items-center gap-2"><span class="text-[#4FC3F7]">■</span> Policy clarification needed</li>
                </ul>
            </div>
        </div>
    </section>

</body>
</html>
