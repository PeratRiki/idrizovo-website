@extends('layouts.app')
@section('title', 'Боја и перспектива')
@section('content')

<div class="bg-gradient-to-b from-blue-100 to-blue-300 min-h-screen p-4 flex flex-col items-center">

    {{-- HEADER СТРЕЛКА И НАСЛОВ --}}
    <div class="w-full max-w-2xl mb-6 flex items-center gap-3 mt-4">
        <a href="{{ url('/Handmade') }}"><i class="fa-solid fa-chevron-left text-3xl text-gray-700 hover:text-black"></i></a>
        <h1 class="text-3xl font-bold text-slate-800 uppercase tracking-tight"
            data-mk="Боја и перспектива"
            data-sq="Ngjyra dhe perspektiva"
            data-en="Color and Perspective">
            Боја и перспектива
        </h1>
    </div>

    @php
    $artProducts = [
        [
            'image' => 'boja1.jpg',
            'title' => 'Акрилни бои на платно',
            'desc' => 'Прекрасно уметничко дело изработено со квалитетни акрилни бои и експресивни техники.',
            'title_sq' => 'Ngjyra akrilike në kanavacë',
            'desc_sq' => 'Vepër arti e mrekullueshme e realizuar me ngjyra akrilike cilësore dhe teknika ekspresive.',
            'title_en' => 'Acrylic on Canvas',
            'desc_en' => 'Beautiful artwork created with high-quality acrylic paints and expressive techniques.'
        ],
        [
            'image' => 'boja2.jpg',
            'title' => 'Акварел пејзаж',
            'desc' => 'Рачно насликан пејзаж со водени бои кој зрачи со смиреност и нежни нијанси.',
            'title_sq' => 'Pikturë me akuarel',
            'desc_sq' => 'Peizazh i pikturuar me dorë me akuarel që rrezaton qetësi dhe nuanca delikate.',
            'title_en' => 'Watercolor Landscape',
            'desc_en' => 'Hand-painted watercolor landscape radiating calmness and delicate tones.'
        ],
        [
            'image' => 'boja3.jpg',
            'title' => 'Сет професионални четки',
            'desc' => 'Врвен комплет четки за сликање со различни големини, идеални за прецизни детали.',
            'title_sq' => 'Set furçash profesionale',
            'desc_sq' => 'Set furçash premium për pikturë në madhësi të ndryshme, ideale për detaje precize.',
            'title_en' => 'Professional Brush Set',
            'desc_en' => 'Premium set of painting brushes in various sizes, ideal for precise details.'
        ],
        [
            'image' => 'boja4.jpg',
            'title' => 'Маслени бои во туба',
            'desc' => 'Богати и долготрајни пигменти за класично сликарство на платно и дрво.',
            'title_sq' => 'Ngjyra vaji në tub',
            'desc_sq' => 'Pigmente të pasura dhe afatgjata për pikturë klasike në kanavacë dhe dru.',
            'title_en' => 'Oil Paint Tubes',
            'desc_en' => 'Rich and long-lasting pigments for classic painting on canvas and wood.'
        ],
        [
            'image' => 'boja2.jpg',
            'title' => 'Скицир книга (Блок)',
            'desc' => 'Квалитетна хартија со висока грамажа, совршена за скицирање, јаглен и молив.',
            'title_sq' => 'Bllok skicimi',
            'desc_sq' => 'Letër cilësore me peshë të lartë, e përsosur për skicim, thëngjill dhe laps.',
            'title_en' => 'Sketchbook',
            'desc_en' => 'High-quality heavy paper, perfect for sketching, charcoal, and pencil art.'
        ],
        [
            'image' => 'boja1.jpg',
            'title' => 'Уметнички штафелај',
            'desc' => 'Стабилен дрвен штафелај со прилагодување на висината за вашето студио.',
            'title_sq' => 'Kavaletë artistike',
            'desc_sq' => 'Kavaletë druri e qëndrueshme me rregullim lartësie për studion tuaj.',
            'title_en' => 'Art Easel',
            'desc_en' => 'Stable wooden art easel with adjustable height settings for your studio.'
        ],
    ];
    @endphp

    {{-- GRID СИСТЕМ --}}
    <div class="w-full max-w-2xl grid grid-cols-2 gap-4 md:gap-6">

        @foreach($artProducts as $product)
        <div class="bg-white/50 backdrop-blur-sm rounded-[1.5rem] overflow-hidden shadow-sm border border-white/30 flex flex-col">
            <div class="h-40 overflow-hidden">
                <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-full object-cover">
            </div>
            <div class="p-4 space-y-2 flex-grow flex flex-col justify-between">
                <div>
                    <h2 class="text-slate-800 font-bold text-sm min-h-[40px] flex items-center"
                        data-mk="{{ $product['title'] }}"
                        data-sq="{{ $product['title_sq'] }}"
                        data-en="{{ $product['title_en'] }}">
                        {{ $product['title'] }}
                    </h2>
                    <p class="text-slate-600 text-[11px] leading-tight line-clamp-3"
                        data-mk="{{ $product['desc'] }}"
                        data-sq="{{ $product['desc_sq'] }}"
                        data-en="{{ $product['desc_en'] }}">
                        {{ $product['desc'] }}
                    </p>
                </div>
                
                {{-- Копчето сега е со фиксна темно сина боја #163b67 --}}
                <button
                    onclick="openModal()"
                    style="background-color: #163b67;"
                    class="mt-3 text-white text-[11px] font-bold px-4 py-2 rounded-lg hover:opacity-90 active:scale-[0.97] transition-all w-full tracking-wide shadow-sm"
                    data-mk="Резервирај"
                    data-sq="Rezervo"
                    data-en="Reserve">
                    Резервирај
                </button>
            </div>
        </div>
        @endforeach

    </div>

    {{-- MODAL --}}
    <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm" onclick="closeModal()"></div>

        <div class="relative bg-white rounded-2xl shadow-xl p-8 mx-4 max-w-sm w-full text-center border border-blue-50">
            <button onclick="closeModal()" class="absolute top-3 right-4 text-gray-400 text-xl font-bold hover:text-gray-600 transition">✕</button>

            <div class="w-14 h-14 bg-blue-50 text-[#163b67] rounded-full flex items-center justify-center mx-auto mb-4 text-xl">
                <i class="fa-solid fa-phone-volume"></i>
            </div>

            <p class="text-gray-700 font-medium text-base leading-snug"
                data-mk="На бројот 07X XXX XXX јавете се за да ја резервирате вашата нарачка."
                data-sq="Në numrin 07X XXX XXX telefononi për të rezervuar porosinë tuaj."
                data-en="Call 07X XXX XXX to reserve your order.">
                Јавете се на бројот <span class="block text-lg font-bold text-[#163b67] my-1 underline">07X XXX XXX</span> за да ја резервирате вашата нарачка.
            </p>
            <p class="text-[#163b67] font-bold text-base mt-4 border-t border-gray-100 pt-3"
                data-mk="Ви Благодариме."
                data-sq="Ju Faleminderit."
                data-en="Thank you.">
                Ви Благодариме.
            </p>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>

</div>

@endsection
