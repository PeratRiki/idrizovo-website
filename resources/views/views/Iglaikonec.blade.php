@extends('layouts.app')
@section('title', 'Игла и конец')
@section('content')

<div class="bg-gradient-to-b from-blue-100 to-blue-300 min-h-screen p-6 md:p-10 flex flex-col items-center">

    {{-- HEADER СТРЕЛКА И НАСЛОВ (Иста структура како резба) --}}
    <div class="w-full max-w-5xl mb-14 flex items-center gap-5 mt-4">
        {{-- Темно сино заоблено копче за назад --}}
        <a href="{{ url('/Handmade') }}"
           style="background-color: #163b67;"
           class="w-12 h-12 rounded-full text-white transition flex items-center justify-center shadow-lg shrink-0 transform hover:-translate-x-1 hover:opacity-90 duration-200">
            <i class="fa-solid fa-chevron-left text-base"></i>
        </a>

        <div>
            <p class="uppercase tracking-[3px] text-[#2d67a9] text-xs font-bold mb-1">
                КПУ Идризово
            </p>
            <h1 class="text-2xl sm:text-3xl font-black text-[#163b67] uppercase tracking-wide">
                Уметност со игла и конец
            </h1>
        </div>
    </div>

    @php
    $products = [
        [
            'image' => 'torba1.jpg',
            'title' => 'Рачно изработена торба',
            'desc' => 'Прецизно изработена текстилна торба создадена во работилницата.'
        ],
        [
            'image' => 'torba2.jpg',
            'title' => 'Декоративна торба',
            'desc' => 'Уникатна рачна изработка со внимание кон деталите.'
        ],
        [
            'image' => 'kosula.jpg',
            'title' => 'Рачно изработена кошула',
            'desc' => 'Квалитетно изработен текстилен производ.'
        ],
        [
            'image' => 'mala.jpg',
            'title' => 'Декоративна ташна',
            'desc' => 'Рачна изработка со модерен и практичен изглед.'
        ],
        [
            'image' => 'srce1.jpg',
            'title' => 'Декоративен украс',
            'desc' => 'Креативен производ изработен во работилницата.'
        ],
    ];
    @endphp

    {{-- GRID (Совршено одвоени со ист gap како кај резба) --}}
    <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($products as $product)

        {{-- КАРТИЧКА --}}
        <div class="w-full max-w-[320px] mx-auto bg-white rounded-[24px] border border-[#e2eefc] shadow-[0_8px_30px_rgb(22,59,103,0.06)] hover:shadow-[0_20px_40px_rgb(22,59,103,0.12)] hover:-translate-y-1.5 transition duration-300 flex flex-col h-full">

            {{-- ЦЕЛОСНО ОДВОЕНА И ЗАОБЛЕНА СЛИКА --}}
            <div class="p-4 shrink-0">
                <div class="h-[200px] w-full overflow-hidden rounded-[20px] bg-gray-50 relative group shadow-sm">
                    <img
                        src="{{ asset('images/' . $product['image']) }}"
                        alt="{{ $product['title'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500 rounded-[20px]">
                    <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition duration-300 rounded-[20px]"></div>
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="p-6 pt-2 flex flex-col flex-grow text-center justify-between">

                <div>
                    <h2 class="text-[#163b67] text-lg font-bold mb-2.5 leading-snug min-h-[50px] flex items-center justify-center">
                        {{ $product['title'] }}
                    </h2>

                    <p class="text-gray-500 text-sm leading-relaxed px-2 line-clamp-3">
                        {{ $product['desc'] }}
                    </p>
                </div>

                {{-- ТЕМНО СИНО ЗАОБЛЕНО КОПЧЕ СО INLINE СТИЛ --}}
                <button
                    onclick="openModal()"
                    style="background-color: #163b67;"
                    class="mt-6 w-full text-white py-3 px-6 rounded-xl text-sm font-bold tracking-wide shadow-md hover:opacity-95 transition active:scale-[0.98] h-[48px] flex items-center justify-center shrink-0">
                    Резервирај
                </button>

            </div>
        </div>

        @endforeach

    </div>

</div>

{{-- MODAL --}}
<div id="modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">

    <div onclick="closeModal()"
         class="absolute inset-0 bg-slate-900/40 backdrop-blur-md transition-opacity"></div>

    <div class="relative bg-white rounded-[28px] shadow-2xl p-8 w-full max-w-md text-center z-10 border border-blue-50 transform transition-all">

        <button onclick="closeModal()"
                class="absolute top-4 right-5 text-gray-400 hover:text-gray-600 text-xl font-medium transition">
            ✕
        </button>

        <div class="w-16 h-16 bg-blue-50 text-[#163b67] rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
            <i class="fa-solid fa-phone-volume"></i>
        </div>

        <h3 class="text-xl font-black text-[#163b67] mb-3">Резервација</h3>

        <p class="text-gray-600 text-base leading-relaxed mb-6">
            Јавете се на бројот <span class="block text-xl font-bold text-[#163b67] mt-2 underline tracking-wider">07X XXX XXX</span> за да ја комплетирате вашата нарачка.
        </p>

        <p class="text-[#163b67] font-bold text-lg border-t border-gray-100 pt-4">
            Ви благодариме!
        </p>

    </div>
</div>

<script>
    function openModal() {
        const modal = document.getElementById('modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
</script>

@endsection