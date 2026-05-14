@extends('layouts.admin')

@section('content')
<style>
    * { box-sizing: border-box; }

    .an-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
    .an-grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
    .an-grid-3 { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; }

    @media (max-width: 1024px) {
        .an-grid-3 { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .an-grid-4 { grid-template-columns: repeat(2, 1fr); }
        .an-grid-2 { grid-template-columns: 1fr; }
        .an-hide-mobile { display: none !important; }
        .an-title { font-size: 1.5rem !important; }
        .an-stat-val { font-size: 1.6rem !important; }
        .an-table th, .an-table td { padding: 10px 12px !important; font-size: 0.78rem !important; }
    }
    @media (max-width: 480px) {
        .an-grid-4 { grid-template-columns: repeat(2, 1fr); gap: 10px; }
        .an-stat-card { padding: 14px !important; }
        .an-stat-icon { width: 36px !important; height: 36px !important; font-size: 1rem !important; margin-bottom: 10px !important; }
        .an-card-pad { padding: 16px !important; }
        .an-title { font-size: 1.3rem !important; }
        .an-chart { height: 120px !important; }
    }
</style>

<div class="p-6 space-y-6" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div>
        <h1 class="an-title" style="font-size:2rem; font-weight:800; color:#1a2e4a; letter-spacing:-0.5px;">Аналитика</h1>
        <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">Статистика и преглед на активностите во КПУ Идризово.</p>
    </div>

    {{-- Top Stats --}}
    <div class="an-grid-4">
        @php
            $stats = [
                ['icon'=>'👥','label'=>'Вкупно затвореници','val'=>$totalPrisoners ?? '247','color'=>'#1d6fa5','bg'=>'#e6f1fb'],
                ['icon'=>'📅','label'=>'Посети овој месец','val'=>$visitsThisMonth ?? '38','color'=>'#b45309','bg'=>'#fef3c7'],
                ['icon'=>'✅','label'=>'Одобрени посети','val'=>$approvedVisits ?? '31','color'=>'#065f46','bg'=>'#d1fae5'],
                ['icon'=>'❌','label'=>'Одбиени посети','val'=>$rejectedVisits ?? '7','color'=>'#991b1b','bg'=>'#fee2e2'],
            ];
        @endphp
        @foreach($stats as $s)
        <div class="an-stat-card" style="background:#fff; border:1px solid #d1dff0; border-radius:16px; padding:20px;">
            <div class="an-stat-icon" style="background:{{ $s['bg'] }}; color:{{ $s['color'] }}; width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.25rem; margin-bottom:14px;">{{ $s['icon'] }}</div>
            <p style="font-size:0.7rem; font-weight:700; color:#5a7299; text-transform:uppercase; letter-spacing:0.08em;">{{ $s['label'] }}</p>
            <p class="an-stat-val" style="font-size:2rem; font-weight:800; color:#1a2e4a; line-height:1; margin-top:4px;">{{ $s['val'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Charts Row --}}
    <div class="an-grid-2">

        {{-- Bar Chart --}}
        <div class="an-card-pad" style="background:#fff; border:1px solid #d1dff0; border-radius:20px; padding:24px;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a; margin-bottom:20px;">📊 Посети по месец</h2>
            @php
                $months = ['Јан','Фев','Мар','Апр','Мај','Јун','Јул','Авг','Сеп','Окт','Ное','Дек'];
                $visitsData = $monthlyVisits ?? [12, 18, 14, 22, 30, 28, 35, 31, 27, 38, 24, 20];
                $maxVal = max($visitsData);
            @endphp
            <div class="an-chart" style="display:flex; align-items:flex-end; gap:4px; height:160px; overflow:hidden;">
                @foreach($visitsData as $i => $val)
                <div style="flex:1; display:flex; flex-direction:column; align-items:center; gap:4px; height:100%; min-width:0;">
                    <div style="flex:1; display:flex; align-items:flex-end; width:100%;">
                        <div style="width:100%; background:#1d6fa5; border-radius:4px 4px 0 0; height:{{ round(($val / $maxVal) * 100) }}%; min-height:4px; opacity:{{ $i == count($visitsData)-1 ? '1' : '0.5' }};"></div>
                    </div>
                    <span style="font-size:0.55rem; color:#5a7299; white-space:nowrap;">{{ $months[$i] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Status Breakdown --}}
        <div class="an-card-pad" style="background:#fff; border:1px solid #d1dff0; border-radius:20px; padding:24px;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a; margin-bottom:20px;">📋 Статус на барањата</h2>
            @php
                $approved = $approvedVisits ?? 31;
                $rejected = $rejectedVisits ?? 7;
                $pending  = $pendingVisits ?? 12;
                $total    = $approved + $rejected + $pending;
                $rows = [
                    ['label'=>'Одобрени','val'=>$approved,'color'=>'#22c55e','bg'=>'#d1fae5','tc'=>'#065f46'],
                    ['label'=>'На чекање','val'=>$pending,'color'=>'#f59e0b','bg'=>'#fef3c7','tc'=>'#92400e'],
                    ['label'=>'Одбиени','val'=>$rejected,'color'=>'#ef4444','bg'=>'#fee2e2','tc'=>'#991b1b'],
                ];
            @endphp
            <div style="display:flex; flex-direction:column; gap:14px;">
                @foreach($rows as $r)
                @php $pct = $total > 0 ? round($r['val'] / $total * 100) : 0; @endphp
                <div>
                    <div style="display:flex; justify-content:space-between; margin-bottom:6px; gap:8px;">
                        <span style="font-size:0.85rem; font-weight:600; color:#1a2e4a;">{{ $r['label'] }}</span>
                        <span style="font-size:0.75rem; font-weight:700; padding:2px 10px; border-radius:20px; background:{{ $r['bg'] }}; color:{{ $r['tc'] }}; white-space:nowrap;">{{ $r['val'] }} ({{ $pct }}%)</span>
                    </div>
                    <div style="background:#f0f4fa; border-radius:99px; height:8px; overflow:hidden;">
                        <div style="height:100%; width:{{ $pct }}%; background:{{ $r['color'] }}; border-radius:99px;"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <div style="margin-top:20px; padding-top:16px; border-top:1px solid #e8f0fb; display:flex; justify-content:space-between;">
                <span style="font-size:0.8rem; color:#5a7299;">Вкупно барања</span>
                <span style="font-size:0.8rem; font-weight:700; color:#1a2e4a;">{{ $total }}</span>
            </div>
        </div>

    </div>

    {{-- Bottom Row --}}
    <div class="an-grid-3">

        {{-- Top Visited --}}
        <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
            <div class="an-card-pad" style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
                <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">👤 Најпосетувани затвореници</h2>
            </div>
            <div style="overflow-x:auto;">
                <table class="an-table" style="width:100%; border-collapse:collapse; font-size:0.85rem; min-width:320px;">
                    <thead>
                        <tr style="background:#f5f8ff;">
                            <th style="padding:10px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">#</th>
                            <th style="padding:10px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Затвореник</th>
                            <th style="padding:10px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Посети</th>
                            <th class="an-hide-mobile" style="padding:10px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Последна посета</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topVisited ?? [] as $i => $p)
                        <tr style="border-top:1px solid #f0f4fa;">
                            <td style="padding:12px 20px; color:#5a7299; font-weight:700;">{{ $i + 1 }}</td>
                            <td style="padding:12px 20px; color:#1a2e4a; font-weight:600;">{{ $p->name }}</td>
                            <td style="padding:12px 20px;">
                                <span style="background:#e6f1fb; color:#1d6fa5; font-weight:700; font-size:0.75rem; padding:3px 10px; border-radius:20px;">{{ $p->visits_count }}</span>
                            </td>
                            <td class="an-hide-mobile" style="padding:12px 20px; color:#5a7299;">{{ \Carbon\Carbon::parse($p->last_visit)->format('d.m.Y') }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="padding:32px; text-align:center; color:#5a7299; font-style:italic;">Нема доволно податоци за приказ.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Summary Card --}}
        <div class="an-card-pad" style="background:#1d6fa5; border-radius:20px; padding:24px; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
                <h2 style="font-size:1rem; font-weight:700; color:#fff; margin-bottom:6px;">📈 Месечно резиме</h2>
                <p style="font-size:0.8rem; color:rgba(255,255,255,0.65);">{{ now()->translatedFormat('F Y') }}</p>
            </div>
            <div style="margin-top:24px; display:flex; flex-direction:column; gap:12px;">
                @php
                    $summary = [
                        ['label'=>'Просечно посети/ден','val'=> $avgPerDay ?? '1.3'],
                        ['label'=>'Посетители оваа недела','val'=> $weeklyVisitors ?? '9'],
                        ['label'=>'Нови барања денес','val'=> $todayRequests ?? '3'],
                        ['label'=>'% одобрување','val'=> ($total > 0 ? round($approved/$total*100) : 0).'%'],
                    ];
                @endphp
                @foreach($summary as $s)
                <div style="display:flex; justify-content:space-between; align-items:center; background:rgba(255,255,255,0.12); border-radius:12px; padding:12px 16px; gap:8px;">
                    <span style="font-size:0.78rem; color:rgba(255,255,255,0.8);">{{ $s['label'] }}</span>
                    <span style="font-size:1rem; font-weight:800; color:#fff; white-space:nowrap;">{{ $s['val'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection