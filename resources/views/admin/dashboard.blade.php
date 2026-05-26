@extends('layouts.admin')

@section('content')
<style>
    * { box-sizing: border-box; }

    .dash-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
    .dash-grid-3 { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; }
    .dash-grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
    .dash-col-span { grid-column: span 1; }

    .quick-actions-wrap { display: flex; flex-direction: column; gap: 12px; }

    @media (max-width: 1024px) {
        .dash-grid-3 { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .dash-grid-4 { grid-template-columns: repeat(2, 1fr); }
        .dash-grid-2 { grid-template-columns: 1fr; }
        .dash-header { flex-direction: column; align-items: flex-start !important; gap: 12px; }
        .dash-stat-val { font-size: 1.6rem !important; }
        .dash-section-title { font-size: 1.5rem !important; }
        .dash-table { font-size: 0.78rem !important; }
        .dash-table th, .dash-table td { padding: 10px 10px !important; }
        .dash-hide-mobile { display: none !important; }
    }
    @media (max-width: 480px) {
        .dash-grid-4 { grid-template-columns: repeat(2, 1fr); gap: 10px; }
        .dash-stat-card { padding: 14px !important; }
        .dash-stat-icon { width: 36px !important; height: 36px !important; font-size: 1rem !important; margin-bottom: 10px !important; }
        .dash-card-pad { padding: 16px !important; }
        .dash-section-title { font-size: 1.3rem !important; }
    }
</style>

<div class="p-6 space-y-6" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div class="dash-header flex items-center justify-between">
        <div>
            <h1 class="dash-section-title" style="font-size:2rem; font-weight:800; color:#1a2e4a; letter-spacing:-0.5px;">Контролен Центар</h1>
            <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">КПУ Идризово — Административен преглед</p>
        </div>
        <div style="display:flex; align-items:center; gap:10px; background:#fff; border:1px solid #d1dff0; border-radius:50px; padding:8px 18px; white-space:nowrap;">
            <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#22c55e; box-shadow:0 0 0 3px #dcfce7; flex-shrink:0;"></span>
            <span style="font-size:0.75rem; font-weight:700; color:#1a2e4a; text-transform:uppercase; letter-spacing:0.08em;">Систем активен</span>
        </div>
    </div>

    {{-- Dashboard Tabs --}}
    <div style="display:flex; flex-wrap:wrap; gap:12px; margin-top:24px;">
        <a href="{{ route('admin.handmade.index') }}" style="background:#fff; border:1px solid #d1dff0; color:#1a2e4a; text-decoration:none; font-weight:700; padding:14px 20px; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,0.03);">Рачни изработки</a>
        <a href="{{ route('admin.activities') }}" style="background:#fff; border:1px solid #d1dff0; color:#1a2e4a; text-decoration:none; font-weight:700; padding:14px 20px; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,0.03);">Активности</a>
        <a href="{{ route('admin.article') }}" style="background:#fff; border:1px solid #d1dff0; color:#1a2e4a; text-decoration:none; font-weight:700; padding:14px 20px; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,0.03);">Статии</a>
    </div>

    {{-- Stats Grid --}}
    <div class="dash-grid-4">
        @php
            $stats = [
                ['icon'=>'👥','label'=>'Вкупно затвореници','val'=>'247','sub'=>'Тековно сместени','color'=>'#1d6fa5','bg'=>'#e6f1fb'],
                ['icon'=>'📅','label'=>'Барања за посета','val'=>'12','sub'=>'Чекаат одобрување','color'=>'#b45309','bg'=>'#fef3c7'],
                ['icon'=>'✉️','label'=>'Нови пораки','val'=>'8','sub'=>'Непрочитани','color'=>'#7c3aed','bg'=>'#ede9fe'],
                ['icon'=>'🛡️','label'=>'Безбедносни инциденти','val'=>'0','sub'=>'Денес','color'=>'#065f46','bg'=>'#d1fae5'],
            ];
        @endphp
        @foreach($stats as $s)
        <div class="dash-stat-card" style="background:#fff; border:1px solid #d1dff0; border-radius:16px; padding:20px;">
            <div class="dash-stat-icon" style="background:{{ $s['bg'] }}; color:{{ $s['color'] }}; width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.25rem; margin-bottom:14px;">{{ $s['icon'] }}</div>
            <p style="font-size:0.7rem; font-weight:700; color:#5a7299; text-transform:uppercase; letter-spacing:0.08em;">{{ $s['label'] }}</p>
            <p class="dash-stat-val" style="font-size:2rem; font-weight:800; color:#1a2e4a; line-height:1; margin-top:4px;">{{ $s['val'] }}</p>
            <p style="font-size:0.75rem; color:#5a7299; margin-top:4px;">{{ $s['sub'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Middle Row --}}
    <div class="dash-grid-3">

        {{-- Visit Requests --}}
        <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
            <div class="dash-card-pad" style="padding:20px 24px; border-bottom:1px solid #e8f0fb; display:flex; justify-content:space-between; align-items:center;">
                <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">📅 Барања за посета</h2>
                <a href="#" style="font-size:0.8rem; color:#1d6fa5; font-weight:600; text-decoration:none; white-space:nowrap;">Сите →</a>
            </div>
            <div style="overflow-x:auto;">
                <table class="dash-table" style="width:100%; border-collapse:collapse; font-size:0.85rem; min-width:400px;">
                    <thead>
                        <tr style="background:#f5f8ff;">
                            <th style="padding:10px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Посетител</th>
                            <th style="padding:10px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Затвореник</th>
                            <th class="dash-hide-mobile" style="padding:10px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Датум</th>
                            <th style="padding:10px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($visitRequests ?? [] as $visit)
                        <tr style="border-top:1px solid #f0f4fa;">
                            <td style="padding:12px 16px; color:#1a2e4a; font-weight:600;">{{ $visit->visitor_name }}</td>
                            <td style="padding:12px 16px; color:#1a2e4a;">{{ $visit->prisoner_name }}</td>
                            <td class="dash-hide-mobile" style="padding:12px 16px; color:#5a7299;">{{ \Carbon\Carbon::parse($visit->requested_date)->format('d.m.Y') }}</td>
                            <td style="padding:12px 16px;">
                                <span style="font-size:0.7rem; font-weight:700; padding:3px 10px; border-radius:20px;
                                    background:{{ $visit->status=='approved' ? '#d1fae5' : ($visit->status=='rejected' ? '#fee2e2' : '#fef3c7') }};
                                    color:{{ $visit->status=='approved' ? '#065f46' : ($visit->status=='rejected' ? '#991b1b' : '#92400e') }};">
                                    {{ $visit->status=='approved' ? 'Одобрено' : ($visit->status=='rejected' ? 'Одбиено' : 'На чекање') }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="padding:40px; text-align:center; color:#5a7299; font-style:italic;">Нема тековни барања за посета.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Quick Actions + System Health --}}
        <div class="quick-actions-wrap">
            <div class="dash-card-pad" style="background:#1d6fa5; border-radius:20px; padding:20px;">
                <h2 style="font-size:1rem; font-weight:700; color:#fff; margin-bottom:16px;">⚡ Брзи акции</h2>
                <div style="display:flex; flex-direction:column; gap:8px;">
                    <a href="{{ route('admin.visits') }}" style="display:flex; align-items:center; gap:10px; background:rgba(255,255,255,0.15); border-radius:12px; padding:12px 14px; color:#fff; text-decoration:none; font-size:0.875rem; font-weight:600;"
                       onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                        <span>📋</span> Управувај со посети
                    </a>
                    <a href="{{ route('admin.messages') }}" style="display:flex; align-items:center; gap:10px; background:rgba(255,255,255,0.15); border-radius:12px; padding:12px 14px; color:#fff; text-decoration:none; font-size:0.875rem; font-weight:600;"
                       onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                        <span>✉️</span> Провери пораки
                    </a>
                    <a href="{{ route('admin.security') }}" style="display:flex; align-items:center; gap:10px; background:rgba(255,255,255,0.15); border-radius:12px; padding:12px 14px; color:#fff; text-decoration:none; font-size:0.875rem; font-weight:600;"
                       onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                        <span>🛡️</span> Безбедносни логови
                    </a>
                    <a href="{{ route('admin.system') }}" style="display:flex; align-items:center; gap:10px; background:rgba(255,255,255,0.15); border-radius:12px; padding:12px 14px; color:#fff; text-decoration:none; font-size:0.875rem; font-weight:600;"
                       onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                        <span>⚙️</span> Системски логови
                    </a>
                </div>
            </div>

            {{-- System Health --}}
            <div class="dash-card-pad" style="background:#fff; border:1px solid #d1dff0; border-radius:20px; padding:20px;">
                <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a; margin-bottom:14px;">🖥️ Статус на систем</h2>
                @php
                    $checks = [
                        ['name'=>'База на податоци','ok'=>true],
                        ['name'=>'Веб сервер','ok'=>true],
                        ['name'=>'Е-пошта','ok'=>true],
                        ['name'=>'Резервна копија','ok'=>false],
                    ];
                @endphp
                @foreach($checks as $c)
                <div style="display:flex; justify-content:space-between; align-items:center; padding:6px 0; border-bottom:1px solid #f0f4fa;">
                    <span style="font-size:0.8rem; color:#1a2e4a;">{{ $c['name'] }}</span>
                    <span style="font-size:0.7rem; font-weight:700; padding:2px 8px; border-radius:20px;
                        background:{{ $c['ok'] ? '#d1fae5' : '#fee2e2' }};
                        color:{{ $c['ok'] ? '#065f46' : '#991b1b' }};">
                        {{ $c['ok'] ? '✓ OK' : '✗ Проблем' }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Bottom Row --}}
    <div class="dash-grid-2">

        {{-- Recent Messages --}}
        <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
            <div class="dash-card-pad" style="padding:20px 24px; border-bottom:1px solid #e8f0fb; display:flex; justify-content:space-between; align-items:center;">
                <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">✉️ Последни пораки</h2>
                <a href="{{ route('admin.messages') }}" style="font-size:0.8rem; color:#1d6fa5; font-weight:600; text-decoration:none;">Сите →</a>
            </div>
            <div style="padding:8px 0;">
                @forelse($recentMessages ?? [] as $msg)
                <div style="padding:12px 24px; border-bottom:1px solid #f5f8ff; display:flex; gap:12px; align-items:flex-start;">
                    <div style="width:36px; height:36px; border-radius:50%; background:#e6f1fb; display:flex; align-items:center; justify-content:center; font-weight:700; color:#1d6fa5; font-size:0.8rem; flex-shrink:0;">
                        {{ strtoupper(substr($msg->name ?? 'N', 0, 1)) }}
                    </div>
                    <div>
                        <p style="font-size:0.875rem; font-weight:600; color:#1a2e4a;">{{ $msg->name }}</p>
                        <p style="font-size:0.8rem; color:#5a7299; margin-top:2px;">{{ Str::limit($msg->message, 60) }}</p>
                    </div>
                </div>
                @empty
                <p style="padding:32px; text-align:center; color:#5a7299; font-style:italic; font-size:0.875rem;">Нема нови пораки.</p>
                @endforelse
            </div>
        </div>

        {{-- Today's Visits --}}
        <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
            <div class="dash-card-pad" style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
                <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">📋 Денешни посети (одобрени)</h2>
            </div>
            <div style="padding:8px 0;">
                @forelse($todayVisits ?? [] as $v)
                <div style="padding:12px 24px; border-bottom:1px solid #f5f8ff; display:flex; justify-content:space-between; align-items:center; gap:8px;">
                    <div>
                        <p style="font-size:0.875rem; font-weight:600; color:#1a2e4a;">{{ $v->visitor_name }}</p>
                        <p style="font-size:0.8rem; color:#5a7299;">посетува: {{ $v->prisoner_name }}</p>
                    </div>
                    <span style="font-size:0.75rem; color:#1d6fa5; font-weight:700; white-space:nowrap;">{{ \Carbon\Carbon::parse($v->requested_date)->format('H:i') }}</span>
                </div>
                @empty
                <p style="padding:32px; text-align:center; color:#5a7299; font-style:italic; font-size:0.875rem;">Нема планирани посети за денес.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection