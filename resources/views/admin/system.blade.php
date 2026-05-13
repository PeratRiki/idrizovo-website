@extends('layouts.admin')

@section('content')
<div class="ml-64 p-8 space-y-8 animate-in fade-in duration-700">
    <div>
        <h1 class="text-4xl font-black text-white tracking-tight">Системски Логови</h1>
        <p class="text-slate-500 mt-2 font-medium">Технички записи за активноста на серверот и апликацијата.</p>
    </div>
    <div class="bg-black rounded-3xl p-6 border border-white/10 font-mono text-sm text-blue-400">
        <p>[{{ now() }}] System.INFO: Application environment: production</p>
        <p>[{{ now() }}] System.INFO: Database connection established</p>
        <p class="text-slate-500 mt-4 italic">Крај на листата.</p>
    </div>
</div>
@endsection