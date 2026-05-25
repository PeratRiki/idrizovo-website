@extends('layouts.app')
@section('title', 'Резба од дрво')
@section('content')

{{-- Alpine.js за контрола --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ open: false }" class="relative">
    
    <div class="bg-gradient-to-b from-blue-100 to-blue-300 min-h-screen p-6 md:p-10 flex flex-col items-center">

        <div class="w-full max-w-2xl mb-8 flex items-center gap-4 mt-4">
            <a href="{{ url('/Handmade') }}">
                <i class="fa-solid fa-chevron-left text-2xl text-gray-700 hover:text-black transition"></i>
            </a>
            <h1 class="text-3xl font-bold text-slate-800 uppercase tracking-tight"
                data-mk="Резба од дрво"
                data-sq="Gdhendje në dru"
                data-en="Wood Carving">Резба од дрво</h1>
        </div>

        <div class="w-full max-w-2xl grid grid-cols-2 gap-4 md:gap-6">
            @for ($i = 1; $i <= 6; $i++)
            <div class="bg-white/40 backdrop-blur-sm rounded-[1.5rem] overflow-hidden shadow-sm border border-white/20 flex flex-col">
                <div class="h-40 overflow-hidden bg-gray-200">
                    <img src="{{ asset('images/rezba' . $i . '.jpg') }}" 
                         class="w-full h-full object-cover"
                         onerror="this.onerror=null; this.src='https://placehold.co/400x300/e2e8f0/475569?text=Rezba+{{ $i }}';">
                </div>
                <div class="p-4 space-y-2 flex-grow flex flex-col text-center">
                    <h2 class="text-slate-800 font-bold text-sm"
                        data-mk="Lorem Ipsum"
                        data-sq="Lorem Ipsum"
                        data-en="Lorem Ipsum">Lorem Ipsum</h2>
                    <p class="text-slate-600 text-[10px] leading-tight line-clamp-3"
                       data-mk="Lorem Ipsum is simply dummy text of the printing and typesetting industry."
                       data-sq="Lorem Ipsum është thjesht tekst fiktiv i industrisë së printimit dhe tipografisë."
                       data-en="Lorem Ipsum is simply dummy text of the printing and typesetting industry.">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                    <div class="flex-grow"></div>
                    <button @click="open = true" 
                            class="mt-2 bg-[#1a2b3c] text-white text-[10px] px-4 py-1.5 rounded-md hover:bg-black transition-colors w-fit mx-auto"
                            data-mk="Резервирај"
                            data-sq="Rezervo"
                            data-en="Reserve">
                        Резервирај
                    </button>
                </div>
            </div>
            @endfor
        </div>
    </div>

    <div x-show="open" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4" 
         style="background-color: rgba(0, 0, 0, 0.4); display: none;" 
         x-cloak>
        
        <div @click.away="open = false" 
             class="relative flex flex-col items-center justify-center text-center shadow-2xl border-2 border-white overflow-hidden"
             style="background-color: #89cff0 !important; width: 100%; max-width: 450px; min-height: 140px; border-radius: 1.5rem; opacity: 1 !important; padding: 2rem;">
            
            <button @click="open = false" class="absolute top-2 right-4 text-white text-2xl font-bold hover:opacity-75">&times;</button>

            <div class="text-white">
                <p class="text-[15px] md:text-[16px] leading-relaxed font-bold"
                   data-mk="На бројот 07X XXX XXX јавете се за да ја резервирате вашата нарачка."
                   data-sq="Në numrin 07X XXX XXX telefononi për të rezervuar porosinë tuaj."
                   data-en="Call 07X XXX XXX to reserve your order.">
                    На бројот <span class="underline decoration-2">07X XXX XXX</span> јавете се за да ја резервирате вашата нарачка.
                </p>
                <p class="text-[17px] font-black italic mt-3 tracking-wide"
                   data-mk="Ви Благодариме."
                   data-sq="Ju Faleminderit."
                   data-en="Thank You.">Ви Благодариме.</p>
            </div>
        </div>
    </div>

</div>

<style>
    [x-cloak] { display: none !important; }
</style>

@endsection