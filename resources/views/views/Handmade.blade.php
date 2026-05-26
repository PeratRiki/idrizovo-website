@extends('layouts.app')
@section('title', 'Рачни изработки во КПУ Идризово')
@section('content')

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
    @if($quotes->count())
    <div class="mt-10 flex flex-col md:flex-row gap-5 px-5 justify-baseline items-baseline md:ml-48">
        @foreach($quotes as $quote)
        <div class="w-full md:w-1/5 border-2 px-5 py-5 rounded-2xl border-blue-500">
            „{{ $quote->quote }}"
        </div>
        @endforeach
    </div>
    @endif

    <!-- СЕКЦИИ (динамични) -->
    @foreach($items as $index => $item)

    @if($index % 2 == 0)
    {{-- Лево: слики | Десно: текст --}}
    <div class="flex flex-col md:flex-row justify-between items-center my-16 md:m-28 px-5 gap-10">

        {{-- Слики --}}
        <div class="flex flex-row gap-2 w-full md:w-1/2 h-[300px] md:h-[450px]">
            @if($item->image_main)
            <div class="flex-[3] overflow-hidden rounded-2xl">
                <img src="{{ Storage::url($item->image_main) }}" class="w-full h-full object-cover" alt="{{ $item->title }}">
            </div>
            @endif
            @foreach(($item->images_extra ?? []) as $extra)
            <div class="flex-1 overflow-hidden rounded-2xl">
                <img src="{{ Storage::url($extra) }}" class="w-full h-full object-cover" alt="{{ $item->title }}">
            </div>
            @endforeach
        </div>

        {{-- Текст --}}
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
    <div class="flex flex-col-reverse md:flex-row justify-between items-center my-16 md:m-28 px-5 gap-10 bg-gray-50 py-10 md:bg-transparent">

        {{-- Текст --}}
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

        {{-- Слики --}}
        <div class="w-full md:w-1/2 flex flex-row gap-2 h-[300px] md:h-[400px]">
            @foreach(($item->images_extra ?? []) as $extra)
            <div class="flex-1 overflow-hidden rounded-lg">
                <img src="{{ Storage::url($extra) }}" class="w-full h-full object-cover" alt="{{ $item->title }}">
            </div>
            @endforeach
            @if($item->image_main)
            <div class="flex-[3] overflow-hidden rounded-2xl">
                <img src="{{ Storage::url($item->image_main) }}" class="w-full h-full object-cover" alt="{{ $item->title }}">
            </div>
            @endif
        </div>

    </div>
    @endif

    @endforeach

@endsection