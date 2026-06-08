@extends('layouts.admin')

@section('content')
<style>
    * { box-sizing: border-box; }

    @media (max-width: 768px) {
        .sec-title { font-size: 1.5rem !important; }
        .sec-table th, .sec-table td { padding: 10px 12px !important; font-size: 0.78rem !important; }
        .sec-hide-mobile { display: none !important; }
    }
    @media (max-width: 480px) {
        .sec-title { font-size: 1.3rem !important; }
        .sec-card-pad { padding: 16px !important; }
    }
</style>

<div class="p-6 space-y-6" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div>
        <h1 class="sec-title" style="font-size:2rem; font-weight:800; color:#1a2e4a; letter-spacing:-0.5px;">🛡️ Безбедносни Логови</h1>
        <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">Преглед на најави и критични безбедносни настани.</p>
    </div>

    {{-- Status Banner --}}
    <div class="sec-card-pad" style="background:#fff; border:1px solid #d1dff0; border-radius:20px; padding:24px;">
        <div style="display:flex; align-items:center; gap:14px; background:#d1fae5; border:1px solid #6ee7b7; border-radius:14px; padding:16px 20px; flex-wrap:wrap;">
            <svg style="width:24px; height:24px; color:#065f46; flex-shrink:0;" fill="none" stroke="#065f46" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            <span style="font-weight:700; color:#065f46; font-size:0.95rem;">Системот е безбеден. Не се регистрирани сомнителни обиди.</span>
        </div>
    </div>

    {{-- Stats Row --}}
    <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:16px;">
        @php
            $secStats = [
                ['icon'=>'🔐','label'=>'Успешни најави денес','val'=>$successLogins ?? '4','color'=>'#065f46','bg'=>'#d1fae5'],
                ['icon'=>'⚠️','label'=>'Неуспешни обиди','val'=>$failedLogins ?? '0','color'=>'#92400e','bg'=>'#fef3c7'],
                ['icon'=>'🚫','label'=>'Блокирани IP','val'=>$blockedIps ?? '0','color'=>'#991b1b','bg'=>'#fee2e2'],
            ];
        @endphp
        @foreach($secStats as $s)
        <div style="background:#fff; border:1px solid #d1dff0; border-radius:16px; padding:20px; text-align:center;">
            <div style="background:{{ $s['bg'] }}; color:{{ $s['color'] }}; width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.25rem; margin:0 auto 12px;">{{ $s['icon'] }}</div>
            <p style="font-size:0.65rem; font-weight:700; color:#5a7299; text-transform:uppercase; letter-spacing:0.06em;">{{ $s['label'] }}</p>
            <p style="font-size:1.8rem; font-weight:800; color:#1a2e4a; line-height:1; margin-top:4px;">{{ $s['val'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Log Table --}}
    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
        <div class="sec-card-pad" style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">📋 Евиденција на најави</h2>
        </div>
        <div style="overflow-x:auto;">
            <table class="sec-table" style="width:100%; border-collapse:collapse; font-size:0.85rem; min-width:320px;">
                <thead>
                    <tr style="background:#f5f8ff;">
                        <th style="padding:12px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Корисник</th>
                        <th class="sec-hide-mobile" style="padding:12px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">IP Адреса</th>
                        <th style="padding:12px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Датум и час</th>
                        <th style="padding:12px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($securityLogs ?? [] as $log)
                    <tr style="border-top:1px solid #f0f4fa;">
                        <td style="padding:14px 20px; color:#1a2e4a; font-weight:600;">{{ $log->username }}</td>
                        <td class="sec-hide-mobile" style="padding:14px 20px; color:#5a7299; font-family:monospace; font-size:0.8rem;">{{ $log->ip_address }}</td>
                        <td style="padding:14px 20px; color:#5a7299;">{{ \Carbon\Carbon::parse($log->created_at)->format('d.m.Y H:i') }}</td>
                        <td style="padding:14px 20px;">
                            <span style="font-size:0.7rem; font-weight:700; padding:3px 10px; border-radius:20px;
                                background:{{ $log->status=='success' ? '#d1fae5' : '#fee2e2' }};
                                color:{{ $log->status=='success' ? '#065f46' : '#991b1b' }};">
                                {{ $log->status=='success' ? '✓ Успешно' : '✗ Неуспешно' }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="padding:40px; text-align:center; color:#5a7299; font-style:italic;">
                            Нема евидентирани настани.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
