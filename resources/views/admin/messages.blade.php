@extends('layouts.admin')

@section('content')
<div class="p-8 space-y-8">
    <div>
        <h1 class="text-4xl font-black text-white tracking-tight">Пораки</h1>
        <p class="text-slate-500 mt-2 font-medium">Комуникација со посетителите и повратни информации.</p>
    </div>
    <div class="overflow-hidden bg-[#111113] border border-white/5 rounded-[2.5rem]">
        <table class="w-full text-left border-collapse">
            <thead class="bg-white/5 text-slate-400 text-xs uppercase font-bold">
                <tr>
                    <th class="p-6">Од</th>
                    <th class="p-6">Порака</th>
                    <th class="p-6">Статус</th>
                </tr>
            </thead>
            <tbody class="text-slate-300">
                <tr><td colspan="3" class="p-12 text-center italic opacity-50">Нема нови пораки во сандачето.</td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection