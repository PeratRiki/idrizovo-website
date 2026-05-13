@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    {{-- Welcome Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Управна Плоча</h1>
            <p class="text-slate-400 mt-1">Добредојдовте назад во административниот панел.</p>
        </div>
        <div class="hidden sm:block">
            <span class="text-xs font-medium uppercase tracking-widest text-[#c9b07d] border border-[#c9b07d]/30 px-3 py-1 rounded-full">Системски Статус: Активен</span>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
            $stats = [
                ['label' => 'Статии', 'count' => '0', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z'],
                ['label' => 'Бои', 'count' => '0', 'icon' => 'M7 21a4 4 0 01-4-4V5h4l3 3 3-3h4v12a4 4 0 01-4 4H7z'],
                ['label' => 'Пораки', 'count' => '0', 'icon' => 'M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8'],
                ['label' => 'Активности', 'count' => '0', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="group relative overflow-hidden rounded-3xl border border-slate-800 bg-slate-900/50 p-6 transition-all hover:border-[#c9b07d]/50">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-400">{{ $stat['label'] }}</p>
                    <h3 class="mt-2 text-3xl font-bold text-white">{{ $stat['count'] }}</h3>
                </div>
                <div class="rounded-2xl bg-[#c9b07d]/10 p-3 text-[#c9b07d] transition-colors group-hover:bg-[#c9b07d] group-hover:text-slate-950">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                    </svg>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Quick Actions --}}
    <div class="rounded-3xl border border-slate-800 bg-slate-900/30 p-8">
        <h3 class="text-xl font-semibold text-white mb-6">Брзи Акции</h3>
        <div class="flex flex-wrap gap-4">
            <a href="#" class="inline-flex items-center gap-2 rounded-2xl bg-[#c9b07d] px-6 py-3 text-sm font-bold text-slate-950 transition hover:bg-[#e8d6c2]">
                + Нова Статија
            </a>
            <a href="#" class="inline-flex items-center gap-2 rounded-2xl bg-white/5 px-6 py-3 text-sm font-bold text-white transition hover:bg-white/10 border border-white/10">
                Прегледај Пораки
            </a>
        </div>
    </div>
</div>
@endsection