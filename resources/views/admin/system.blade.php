@extends('layouts.admin')

@section('content')
<style>
    * { box-sizing: border-box; }

    .sys-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }

    @media (max-width: 768px) {
        .sys-title { font-size: 1.5rem !important; }
        .sys-grid-3 { grid-template-columns: repeat(2, 1fr); }
        .sys-log-text { font-size: 0.75rem !important; }
    }
    @media (max-width: 480px) {
        .sys-title { font-size: 1.3rem !important; }
        .sys-grid-3 { grid-template-columns: 1fr; }
        .sys-card-pad { padding: 16px !important; }
        .sys-log-wrap { padding: 16px !important; }
    }
</style>

<div class="p-6 space-y-6" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div>
        <h1 class="sys-title" style="font-size:2rem; font-weight:800; color:#1a2e4a; letter-spacing:-0.5px;">⚙️ Системски Логови</h1>
        <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">Технички записи за активноста на серверот и апликацијата.</p>
    </div>

    {{-- System Info Cards --}}
    <div class="sys-grid-3">
        @php
            $sysInfo = [
                ['icon'=>'🌐','label'=>'Околина','val'=>app()->environment(),'color'=>'#1d6fa5','bg'=>'#e6f1fb'],
                ['icon'=>'💾','label'=>'База на податоци','val'=>'Поврзана','color'=>'#065f46','bg'=>'#d1fae5'],
                ['icon'=>'🕐','label'=>'Серверско време','val'=>now()->format('H:i'),'color'=>'#7c3aed','bg'=>'#ede9fe'],
            ];
        @endphp
        @foreach($sysInfo as $s)
        <div class="sys-card-pad" style="background:#fff; border:1px solid #d1dff0; border-radius:16px; padding:20px;">
            <div style="background:{{ $s['bg'] }}; color:{{ $s['color'] }}; width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.25rem; margin-bottom:12px;">{{ $s['icon'] }}</div>
            <p style="font-size:0.7rem; font-weight:700; color:#5a7299; text-transform:uppercase; letter-spacing:0.06em;">{{ $s['label'] }}</p>
            <p style="font-size:1.2rem; font-weight:800; color:#1a2e4a; margin-top:4px;">{{ $s['val'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Log Output --}}
    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
        <div class="sys-card-pad" style="padding:20px 24px; border-bottom:1px solid #e8f0fb; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">📄 Записи на серверот</h2>
            <span style="font-size:0.75rem; color:#5a7299; font-family:monospace;">{{ now()->format('d.m.Y H:i:s') }}</span>
        </div>
        <div class="sys-log-wrap" style="background:#1a2e4a; padding:24px; overflow-x:auto;">
            <div style="font-family:monospace; font-size:0.85rem; display:flex; flex-direction:column; gap:8px; min-width:280px;">
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <span style="color:#5a7299; white-space:nowrap;">[{{ now() }}]</span>
                    <span style="color:#60a5fa;">System.INFO:</span>
                    <span class="sys-log-text" style="color:#e2e8f0;">Application environment: {{ app()->environment() }}</span>
                </div>
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <span style="color:#5a7299; white-space:nowrap;">[{{ now() }}]</span>
                    <span style="color:#60a5fa;">System.INFO:</span>
                    <span class="sys-log-text" style="color:#e2e8f0;">Database connection established</span>
                </div>
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <span style="color:#5a7299; white-space:nowrap;">[{{ now() }}]</span>
                    <span style="color:#34d399;">System.OK:</span>
                    <span class="sys-log-text" style="color:#e2e8f0;">Cache driver: file — operational</span>
                </div>
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <span style="color:#5a7299; white-space:nowrap;">[{{ now() }}]</span>
                    <span style="color:#34d399;">System.OK:</span>
                    <span class="sys-log-text" style="color:#e2e8f0;">Queue driver: sync — operational</span>
                </div>

                @forelse($systemLogs ?? [] as $log)
                <div style="display:flex; gap:12px; flex-wrap:wrap;">
                    <span style="color:#5a7299; white-space:nowrap;">[{{ \Carbon\Carbon::parse($log->created_at)->format('Y-m-d H:i:s') }}]</span>
                    <span style="color:{{ $log->level == 'error' ? '#f87171' : ($log->level == 'warning' ? '#fbbf24' : '#60a5fa') }};">
                        System.{{ strtoupper($log->level) }}:
                    </span>
                    <span class="sys-log-text" style="color:#e2e8f0;">{{ $log->message }}</span>
                </div>
                @empty
                @endforelse

                <p style="color:#475569; font-style:italic; margin-top:8px; font-size:0.8rem;">— Крај на листата —</p>
            </div>
        </div>
    </div>

</div>
@endsection