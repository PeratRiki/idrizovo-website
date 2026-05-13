@extends('layouts.admin')

@section('content')
<div class="p-8 space-y-8">
    {{-- Header --}}
    <div class="flex items-end justify-between">
        <div>
            <h1 class="text-4xl font-black text-white tracking-tight">Overview</h1>
            <p class="text-slate-500 mt-2 font-medium">Welcome back to the Idrizovo Command Center.</p>
        </div>
        <div class="flex items-center gap-3 bg-white/5 border border-white/10 px-4 py-2 rounded-2xl">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            <span class="text-xs font-bold text-slate-300 uppercase tracking-widest">System Live</span>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
            $cards = [
                ['title' => 'Total Articles', 'val' => '24', 'trend' => '+12%', 'color' => '#c9b07d'],
                ['title' => 'Monthly Traffic', 'val' => '1.2k', 'trend' => '+5.4%', 'color' => '#60a5fa'],
                ['title' => 'Support Tickets', 'val' => '3', 'trend' => 'Active', 'color' => '#fb7185'],
                ['title' => 'System Health', 'val' => '99%', 'trend' => 'Optimal', 'color' => '#34d399'],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="bg-[#111113] border border-white/5 p-6 rounded-[2rem] hover:border-white/10 transition-all group">
            <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">{{ $card['title'] }}</p>
            <div class="flex items-baseline gap-3 mt-4">
                <h3 class="text-3xl font-bold text-white">{{ $card['val'] }}</h3>
                <span class="text-[10px] font-bold px-2 py-0.5 rounded-lg bg-white/5 text-slate-400">{{ $card['trend'] }}</span>
            </div>
            <div class="mt-6 h-1 w-full bg-white/5 rounded-full overflow-hidden">
                <div class="h-full w-2/3 opacity-50 group-hover:opacity-100 transition-opacity" style="background-color: {{ $card['color'] }}"></div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Bottom Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-[#111113] border border-white/5 rounded-[2.5rem] p-8">
            <h4 class="text-xl font-bold text-white mb-6">Recent Activity</h4>
            <div class="space-y-6 text-slate-400">
                <p class="text-sm italic opacity-50">No recent logs found. System is running stable.</p>
            </div>
        </div>
        <div class="bg-gradient-to-br from-[#c9b07d] to-[#e8d6c2] rounded-[2.5rem] p-8 text-slate-950">
            <h4 class="text-2xl font-extrabold tracking-tight">System Audit</h4>
            <p class="mt-2 text-sm font-medium opacity-80">Last security scan performed 2 hours ago.</p>
            <button class="mt-8 w-full bg-slate-950 text-white font-bold py-4 rounded-2xl hover:scale-[1.02] transition-transform">Run Security Check</button>
        </div>
    </div>
</div>
@endsection