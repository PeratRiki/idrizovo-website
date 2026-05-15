@extends('layouts.app')
@section('title', 'Рачни изработки во КПУ Идризово')
@section('content')

@php
// Fallback слики по категорија ако нема прикачено во базата
$fallbackMain = [
    'iglaikonec' => 'images/torba2.jpg',
    'rezba'      => 'images/rezba1.jpg',
    'boja'       => 'images/boja1.jpg',
    'grncarstvo' => 'images/grnicarstvo4.jpg',
];
$fallbackExtras = [
    'iglaikonec' => ['images/mala.jpg', 'images/kosula.jpg', 'images/srce1.jpg'],
    'rezba'      => ['images/rezba4.jpg', 'images/rezba3.jpg', 'images/rezba2.jpg'],
    'boja'       => ['images/boja2.jpg', 'images/boja3.jpg', 'images/boja4.jpg'],
    'grncarstvo' => ['images/grnicarstvo1.jpg', 'images/grnicarstvo2.jpg', 'images/grnicarstvo3.jpg'],
];
@endphp

<body id="racni-izrabotki" class="overflow-x-hidden bg-gray-50 text-gray-900">

    <!-- HERO -->
    <div class="bg-cover bg-center relative h-screen" style="background-image: url('{{ asset('images/home.jpg') }}')">
        <div class="absolute inset-0 bg-black/30"></div>
        <h1 class="absolute top-1/4 left-10 md:top-40 md:left-40 text-5xl md:text-6xl font-bold text-white">Рачни</h1>
        <h1 class="absolute top-[35%] left-10 md:top-56 md:left-40 text-5xl md:text-6xl font-bold text-white">Изработки</h1>
    </div>

    <!-- INTRO -->
    <div class="border-2 rounded-2xl m-5 md:m-10 py-10 px-5 md:px-8 bg-white border-black/50">
        <h1 class="text-xl md:text-2xl font-bold">Рачни изработки во КПУ Идризово</h1>
        <p class="font-semibold mt-5 text-sm md:text-base leading-relaxed">
            Во затворската работилница, конецот и иглата не се само обични алатки – тие се мост кон
            внатрешна слобода. Со секој бод и секои трпеливи движења плетат ташни и кошули, вежбајќи истовремено
            дисциплина и самоконтрола.
        </p>
    </div>

    <h2 class="text-2xl md:text-3xl font-bold px-5 md:ml-44 text-center md:text-left">
        "Секој производ носи своја приказна и допринесува за ресоцијализација."
    </h2>

    <!-- ЦИТАТИ (динамични) -->
    @if(isset($quotes) && $quotes->count())
    <div class="mt-10 flex flex-col md:flex-row gap-5 px-5 justify-baseline items-baseline md:ml-48">
        @foreach($quotes as $quote)
        <div class="w-full md:w-1/5 border-2 px-5 py-5 rounded-2xl border-blue-500">
            „{{ $quote->quote }}"
        </div>
        @endforeach
    </div>
    @else
    {{-- Fallback цитати ако базата е празна --}}
    <div class="mt-10 flex flex-col md:flex-row gap-5 px-5 justify-baseline items-baseline md:ml-48">
        <div class="w-full md:w-1/5 border-2 px-5 py-5 rounded-2xl border-blue-500">„Во секој бод и секој засек има дел од мојата тишина. Работилницата ми е како терапија."</div>
        <div class="w-full md:w-1/5 border-2 px-5 py-5 rounded-2xl border-blue-500">„Сликите што ги цртам не се само пејзажи — тие се мојот прозорец кон светот."</div>
        <div class="w-full md:w-1/5 border-2 px-5 py-5 rounded-2xl border-blue-500">„Работилницата ми дава мир и сила да верувам дека можам да бидам подобар човек."</div>
        <div class="w-full md:w-1/5 border-2 px-5 py-5 rounded-2xl border-blue-500">„Кога плетам, чувствувам дека моите раце зборуваат наместо мене. Во секој бод има дел од мојата борба."</div>
    </div>
    @endif

    <!-- СЕКЦИИ (динамични) -->
    @if(isset($items) && $items->count())

        @foreach($items as $index => $item)
        @php
            // Главна слика — база или fallback
            $mainImg = $item->image_main
                ? Storage::url($item->image_main)
                : asset($fallbackMain[$item->category] ?? 'images/home.jpg');

            // Дополнителни слики — база или fallback
            $extras = ($item->images_extra && count($item->images_extra))
                ? array_map(fn($e) => Storage::url($e), $item->images_extra)
                : array_map(fn($e) => asset($e), $fallbackExtras[$item->category] ?? []);
        @endphp

        @if($index % 2 == 0)
        {{-- Лево: слики | Десно: текст --}}
        <div class="flex flex-col md:flex-row justify-between items-center my-16 md:m-28 px-5 gap-10">
            <div class="flex flex-row gap-2 w-full md:w-1/2 h-[300px] md:h-[450px]">
                <div class="flex-[3] overflow-hidden rounded-2xl">
                    <img src="{{ $mainImg }}" class="w-full h-full object-cover" alt="{{ $item->title }}">
                </div>
                @foreach($extras as $extra)
                <div class="flex-1 overflow-hidden rounded-2xl">
                    <img src="{{ $extra }}" class="w-full h-full object-cover" alt="{{ $item->title }}">
                </div>
                @endforeach
            </div>
            <div class="w-full md:w-1/2 md:ml-16">
                <h2 class="text-3xl font-bold mb-4">{{ $item->title }}</h2>
                <p class="text-gray-700">{{ $item->description }}</p>
                @if($item->link_url)
                <div class="mt-6">
                    <a href="{{ url($item->link_url) }}" class="bg-black text-white rounded-lg px-4 py-2 hover:bg-gray-800 transition">
                        Види повеќе
                    </a>
                </div>
                @endif
            </div>
        </div>

        @else
        {{-- Лево: текст | Десно: слики --}}
        <div class="flex flex-col-reverse md:flex-row justify-between items-center my-16 md:m-28 px-5 gap-10">
            <div class="w-full md:w-1/2 md:mr-16">
                <h2 class="text-3xl font-bold mb-4">{{ $item->title }}</h2>
                <p class="text-gray-700">{{ $item->description }}</p>
                @if($item->link_url)
                <div class="mt-6">
                    <a href="{{ url($item->link_url) }}" class="bg-black text-white rounded-lg px-4 py-2 hover:bg-gray-800 transition">
                        Види повеќе
                    </a>
                </div>
                @endif
            </div>
            <div class="w-full md:w-1/2 flex flex-row gap-2 h-[300px] md:h-[400px]">
                @foreach($extras as $extra)
                <div class="flex-1 overflow-hidden rounded-lg">
                    <img src="{{ $extra }}" class="w-full h-full object-cover" alt="{{ $item->title }}">
                </div>
                @endforeach
                <div class="flex-[3] overflow-hidden rounded-2xl">
                    <img src="{{ $mainImg }}" class="w-full h-full object-cover" alt="{{ $item->title }}">
                </div>
            </div>
        </div>
        @endif

        @endforeach

    @else
    {{-- Fallback ако базата е целосно празна — стара статична верзија --}}

        <!-- ИГЛА И КОНЕЦ -->
        <div class="flex flex-col md:flex-row justify-between items-center my-16 md:m-28 px-5 gap-10">
            <div class="flex flex-row gap-2 w-full md:w-1/2 h-[300px] md:h-[450px]">
                <div class="flex-[3] overflow-hidden rounded-2xl"><img src="{{ asset('images/torba2.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-2xl"><img src="{{ asset('images/mala.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-2xl"><img src="{{ asset('images/kosula.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-2xl"><img src="{{ asset('images/srce1.jpg') }}" class="w-full h-full object-cover"></div>
            </div>
            <div class="w-full md:w-1/2 md:ml-16">
                <h2 class="text-3xl font-bold mb-4">Уметност со игла и конец</h2>
                <p class="text-gray-700">Во затворската работилница, конецот и иглата не се само обични алатки – тие се мост кон внатрешна слобода.</p>
                <div class="mt-6"><a href="{{ url('/Iglaikonec') }}" class="bg-black text-white rounded-lg px-4 py-2 hover:bg-gray-800 transition">Види повеќе</a></div>
            </div>
        </div>

        <!-- РЕЗБИ -->
        <div class="flex flex-col-reverse md:flex-row justify-between items-center my-16 md:m-28 px-5 gap-10">
            <div class="w-full md:w-1/2 md:mr-16">
                <h2 class="text-3xl font-bold mb-4">Резби од дрво</h2>
                <p class="text-gray-700">Вештината на обработка на дрво и создавање на уметнички дела преку резба е длабоко вкоренета во нашата култура.</p>
                <div class="mt-6"><a href="{{ url('/Rezba') }}" class="bg-black text-white rounded-lg px-4 py-2 hover:bg-gray-800 transition">Види повеќе</a></div>
            </div>
            <div class="w-full md:w-1/2 flex flex-row gap-2 h-[300px] md:h-[400px]">
                <div class="flex-1 overflow-hidden rounded-lg"><img src="{{ asset('images/rezba4.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-lg"><img src="{{ asset('images/rezba3.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-lg"><img src="{{ asset('images/rezba2.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-[3] overflow-hidden rounded-2xl"><img src="{{ asset('images/rezba1.jpg') }}" class="w-full h-full object-cover"></div>
            </div>
        </div>

        <!-- БОЈА -->
        <div class="flex flex-col md:flex-row justify-between items-center my-16 md:m-28 px-5 gap-10">
            <div class="flex flex-row gap-2 w-full md:w-1/2 h-[300px] md:h-[450px]">
                <div class="flex-[3] overflow-hidden rounded-2xl"><img src="{{ asset('images/boja1.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-2xl"><img src="{{ asset('images/boja2.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-2xl"><img src="{{ asset('images/boja3.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-2xl"><img src="{{ asset('images/boja4.jpg') }}" class="w-full h-full object-cover"></div>
            </div>
            <div class="w-full md:w-1/2 md:ml-16">
                <h2 class="text-3xl font-bold mb-4">Боја и перспектива: слика од работилницата</h2>
                <p class="text-gray-600 leading-relaxed text-justify">Во затворот, хартијата и боите стануваат прозорец кон слобода.</p>
                <div class="mt-6"><a href="{{ url('/Color') }}" class="bg-black text-white rounded-lg px-4 py-2 hover:bg-gray-800 transition">Види повеќе</a></div>
            </div>
        </div>

        <!-- ГРНЧАРСТВО -->
        <div class="flex flex-col-reverse md:flex-row justify-between items-center my-16 md:m-28 px-5 gap-10 mb-20">
            <div class="w-full md:w-1/2 md:mr-16">
                <h2 class="text-3xl font-bold mb-4">Грнчарство: Обликување на надежта</h2>
                <p class="text-gray-700">Во тишината на затворската работилница, каде времето тече поинаку, глината станува глас.</p>
                <div class="mt-6"><a href="{{ url('/Grncarstvo') }}" class="bg-black text-white rounded-lg px-4 py-2 hover:bg-gray-800 transition">Види повеќе</a></div>
            </div>
            <div class="w-full md:w-1/2 flex flex-row gap-2 h-[300px] md:h-[400px]">
                <div class="flex-1 overflow-hidden rounded-lg"><img src="{{ asset('images/grnicarstvo1.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-lg"><img src="{{ asset('images/grnicarstvo2.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-1 overflow-hidden rounded-lg"><img src="{{ asset('images/grnicarstvo3.jpg') }}" class="w-full h-full object-cover"></div>
                <div class="flex-[3] overflow-hidden rounded-2xl"><img src="{{ asset('images/grnicarstvo4.jpg') }}" class="w-full h-full object-cover"></div>
            </div>
        </div>

    @endif

@endsection