@extends('layouts.admin')

@section('content')
<div class="p-8 space-y-8">
    <div>
        <h1 class="text-4xl font-black text-white tracking-tight">Безбедносни Логови</h1>
        <p class="text-slate-500 mt-2 font-medium">Преглед на најави и критични безбедносни настани.</p>
    </div>
    <div class="bg-[#111113] border border-white/5 rounded-[2.5rem] p-8">
        <div class="flex items-center gap-4 text-emerald-500 bg-emerald-500/10 p-4 rounded-2xl border border-emerald-500/20">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
            <span class="font-bold">Системот е безбеден. Не се регистрирани сомнителни обиди.</span>
        </div>
    </div>
</div>
@endsection