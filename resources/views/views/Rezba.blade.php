@extends('layouts.app')
@section('title', 'Резба од дрво')
@section('content')

{{-- Alpine.js за контрола --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{ open: false }" class="relative">
    
    <div class="bg-gradient-to-b from-blue-100 to-blue-300 min-h-screen p-6 md:p-10 flex flex-col items-center">

        {{-- HEADER СТРЕЛКА И НАСЛОВ --}}
        <div class="w-full max-w-5xl mb-14 flex items-center gap-5 mt-4">
            {{-- Темно сино заоблено копче за назад со сигурна inline боја --}}
            <a href="{{ url('/Handmade') }}"
               style="background-color: #163b67;"
               class="w-12 h-12 rounded-full text-white transition flex items-center justify-center shadow-lg shrink-0 transform hover:-translate-x-1 hover:opacity-90 duration-200">
                <i class="fa-solid fa-chevron-left text-base"></i>
            </a>
            
            <h1 class="text-2xl sm:text-3xl font-black text-[#163b67] uppercase tracking-wide"
                data-mk="Резба од дрво"
                data-sq="Gdhendje në dru"
                data-en="Wood Carving">Резба од дрво</h1>
        </div>

        @php
        $carvings = [
            [
                'image' => 'rezba1.jpg',
                'title' => 'Длабока резба во орех',
                'desc' => 'Прекрасен традиционален македонски мотив изработен во висококвалитетно орахово дрво.',
                'title_sq' => 'Gdhendje e thellë në arrë',
                'desc_sq' => 'Motiv i bukur tradicional maqedonas i punuar në dru arre me cilësi të lartë.',
                'title_en' => 'Deep Walnut Carving',
                'desc_en' => 'Beautiful traditional Macedonian motif crafted in high-quality walnut wood.'
            ],
            [
                'image' => 'rezba2.jpg',
                'title' => 'Гравирана дрвена кутија',
                'desc' => 'Рачно резбана уникатна кутија за накит или скапоцености со филигрански дезени.',
                'title_sq' => 'Kuti druri e gdhendur',
                'desc_sq' => 'Kuti unike e gdhendur me dorë për bizhuteri ose sende me vlerë me modele filigrani.',
                'title_en' => 'Carved Wooden Box',
                'desc_en' => 'Hand-carved unique box for jewelry or valuables with filigree patterns.'
            ],
            [
                'image' => 'rezba3.jpg',
                'title' => 'Резбана икона',
                'desc' => 'Прецизно изработена дрвена икона со впечатливи детали и автентичен дух.',
                'title_sq' => 'Ikonë e gdhendur',
                'desc_sq' => 'Ikonë druri e punuar me saktësi me detaje mbresëlënëse dhe shpirt autentik.',
                'title_en' => 'Carved Icon',
                'desc_en' => 'Precisely crafted wooden icon with striking details and authentic spirit.'
            ],
            [
                'image' => 'rezba4.jpg',
                'title' => 'Традиционална софра',
                'desc' => 'Ниска дрвена софра со рачно копаничарски орнаменти по рабовите.',
                'title_sq' => 'Sofër tradicionale',
                'desc_sq' => 'Sofër e ulët druri me ornamente të gdhendura me dorë përgjatë skajeve.',
                'title_en' => 'Traditional Sofra',
                'desc_en' => 'Low wooden table (sofra) with hand-carved ornaments along the edges.'
            ],
            [
                'image' => 'rezba5.jpg',
                'title' => 'Ѕиден дрвен орнамент',
                'desc' => 'Декоративна розета од дрво, совршена за збогатување на амбиентот во домот.',
                'title_sq' => 'Ornament druri për mur',
                'desc_sq' => 'Rozetë dekorative prej druri, e përsosur për pasurimin e ambientit të shtëpisë.',
                'title_en' => 'Wooden Wall Ornament',
                'desc_en' => 'Decorative wooden rosette, perfect for enriching the home ambiance.'
            ],
            [
                'image' => 'rezba6.jpg',
                'title' => 'Дрвен свеќник',
                'desc' => 'Елегантен свеќник со рачна резба кој носи топлина во секоја просторија.',
                'title_sq' => 'Mbajtëse qiriri prej druri',
                'desc_sq' => 'Mbajtëse elegante qiriri me gdhendje dore që sjell ngrohtësi në çdo dhomë.',
                'title_en' => 'Wooden Candle Holder',
                'desc_en' => 'Elegant candle holder with hand carving that brings warmth to any room.'
            ],
        ];
        @endphp

        {{-- GRID СО ЧИСТ GAP И ЦЕНТРИРАНИ ЕЛЕМЕНТИ --}}
        <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($carvings as $index => $item)
            
            {{-- КАРТИЧКА --}}
            <div class="w-full max-w-[320px] mx-auto bg-white rounded-[24px] border border-[#e2eefc] shadow-[0_8px_30px_rgb(22,59,103,0.06)] hover:shadow-[0_20px_40px_rgb(22,59,103,0.12)] hover:-translate-y-1.5 transition duration-300 flex flex-col h-full">
                
                {{-- ЦЕЛОСНО ОДВОЕНА И ЗАОБЛЕНА СЛИКА --}}
                <div class="p-4 shrink-0">
                    <div class="h-[200px] w-full overflow-hidden rounded-[20px] bg-gray-50 relative group shadow-sm">
                        <img src="{{ asset('images/' . $item['image']) }}" 
                             alt="{{ $item['title'] }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500 rounded-[20px]"
                             onerror="this.onerror=null; this.src='https://placehold.co/400x300/e2e8f0/475569?text=Rezba+{{ $index + 1 }}';">
                        <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition duration-300 rounded-[20px]"></div>
                    </div>
                </div>

                {{-- СОДРЖИНА --}}
                <div class="p-6 pt-2 flex flex-col flex-grow text-center justify-between">
                    <div>
                        <h2 class="text-[#163b67] text-lg font-bold mb-2.5 leading-snug min-h-[50px] flex items-center justify-center"
                            data-mk="{{ $item['title'] }}"
                            data-sq="{{ $item['title_sq'] }}"
                            data-en="{{ $item['title_en'] }}">
                            {{ $item['title'] }}
                        </h2>
                        
                        <p class="text-gray-500 text-sm leading-relaxed px-2 line-clamp-3"
                           data-mk="{{ $item['desc'] }}"
                           data-sq="{{ $item['desc_sq'] }}"
                           data-en="{{ $item['desc_en'] }}">
                            {{ $item['desc'] }}
                        </p>
                    </div>

                    {{-- ТЕМНО СИНО ИЗЕДНАЧЕНО КОПЧЕ СО СИГУРЕН СТИЛ --}}
                    <button @click="open = true" 
                            style="background-color: #163b67;"
                            class="mt-6 w-full text-white py-3 px-6 rounded-xl text-sm font-bold tracking-wide shadow-md hover:opacity-95 transition active:scale-[0.98] h-[48px] flex items-center justify-center shrink-0"
                            data-mk="Резервирај"
                            data-sq="Rezervo"
                            data-en="Reserve">
                        Резервирај
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- MODAL --}}
    <div x-show="open" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4" 
         style="background-color: rgba(0, 0, 0, 0.4); display: none;" 
         x-cloak>
        
        <div @click.away="open = false" 
             class="relative bg-white rounded-[28px] shadow-2xl p-8 w-full max-w-md text-center z-10 border border-blue-50 transform transition-all">
            
            <button @click="open = false" class="absolute top-4 right-5 text-gray-400 hover:text-gray-600 text-xl font-medium transition">&times;</button>

            <div class="w-16 h-16 bg-blue-50 text-[#163b67] rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                <i class="fa-solid fa-phone-volume"></i>
            </div>

            <h3 class="text-xl font-black text-[#163b67] mb-3">Резервација</h3>

            <div class="text-gray-600 text-base leading-relaxed mb-6">
                <p data-mk="На бројот 07X XXX XXX јавете се за да ја резервирате вашата нарачка."
                   data-sq="Në numrin 07X XXX XXX telefononi për të rezervuar porosinë tuaj."
                   data-en="Call 07X XXX XXX to reserve your order.">
                    Јавете се на бројот <span class="block text-xl font-bold text-[#163b67] mt-2 underline tracking-wider">07X XXX XXX</span> за да ја комплетирате вашата нарачка.
                </p>
            </div>
            
            <p class="text-[#163b67] font-bold text-lg border-t border-gray-100 pt-4"
               data-mk="Ви Благодариме."
               data-sq="Ju Faleminderit."
               data-en="Thank You.">Ви Благодариме.</p>
        </div>
    </div>

</div>

<style>
    [x-cloak] { display: none !important; }
</style>

@endsection