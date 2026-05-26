@extends('layouts.admin')

@section('content')
<style>
    * { box-sizing: border-box; }

    @media (max-width: 768px) {
        .vr-header { flex-direction: column; align-items: flex-start !important; gap: 10px; }
        .vr-title { font-size: 1.5rem !important; }
        .vr-table th, .vr-table td { padding: 10px 10px !important; font-size: 0.78rem !important; }
        .vr-hide-mobile { display: none !important; }
        .vr-btn { padding: 5px 8px !important; font-size: 0.65rem !important; }
    }
    @media (max-width: 480px) {
        .vr-title { font-size: 1.3rem !important; }
        .vr-card-pad { padding: 14px 16px !important; }
        .vr-badge { padding: 6px 12px !important; font-size: 0.7rem !important; }
    }

    /* Modal */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 100;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }
    .modal-overlay.open {
        display: flex;
    }
    .modal-box {
        background: #fff;
        border-radius: 20px;
        padding: 32px;
        width: 100%;
        max-width: 460px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }
</style>

<div class="p-6 space-y-6" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div class="vr-header flex items-center justify-between">
        <div>
            <h1 class="vr-title" style="font-size:2rem; font-weight:800; color:#1a2e4a; letter-spacing:-0.5px;">
                📅 Барања за посета
            </h1>
            <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">
                Преглед и управување со сите барања за посета.
            </p>
        </div>
        <div class="vr-badge" style="background:#fff; border:1px solid #d1dff0; border-radius:50px; padding:8px 18px; white-space:nowrap; flex-shrink:0;">
            <span style="font-size:0.75rem; font-weight:700; color:#1a2e4a;">
                Вкупно: {{ isset($visitRequests) ? $visitRequests->count() : 0 }}
            </span>
        </div>
    </div>

    {{-- Stats --}}
    <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:14px;">
        @php
            $pending_count  = isset($visitRequests) ? $visitRequests->where('status','pending')->count() : 0;
            $approved_count = isset($visitRequests) ? $visitRequests->where('status','approved')->count() : 0;
            $rejected_count = isset($visitRequests) ? $visitRequests->where('status','rejected')->count() : 0;
        @endphp
        <div style="background:#fff; border:1px solid #d1dff0; border-radius:14px; padding:16px; text-align:center;">
            <p style="font-size:0.65rem; font-weight:700; color:#5a7299; text-transform:uppercase;">На чекање</p>
            <p style="font-size:1.8rem; font-weight:800; color:#b45309; margin-top:4px;">{{ $pending_count }}</p>
        </div>
        <div style="background:#fff; border:1px solid #d1dff0; border-radius:14px; padding:16px; text-align:center;">
            <p style="font-size:0.65rem; font-weight:700; color:#5a7299; text-transform:uppercase;">Одобрени</p>
            <p style="font-size:1.8rem; font-weight:800; color:#065f46; margin-top:4px;">{{ $approved_count }}</p>
        </div>
        <div style="background:#fff; border:1px solid #d1dff0; border-radius:14px; padding:16px; text-align:center;">
            <p style="font-size:0.65rem; font-weight:700; color:#5a7299; text-transform:uppercase;">Одбиени</p>
            <p style="font-size:1.8rem; font-weight:800; color:#991b1b; margin-top:4px;">{{ $rejected_count }}</p>
        </div>
    </div>

    {{-- Table --}}
    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">

        <div class="vr-card-pad" style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">📥 Листа на барања</h2>
        </div>

        <div style="overflow-x:auto;">
            <table class="vr-table" style="width:100%; border-collapse:collapse; font-size:0.85rem; min-width:360px;">
                <thead>
                    <tr style="background:#f5f8ff;">
                        <th style="padding:14px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Посетител</th>
                        <th style="padding:14px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Затвореник</th>
                        <th class="vr-hide-mobile" style="padding:14px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Датум</th>
                        <th style="padding:14px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Статус</th>
                        <th style="padding:14px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Акција</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($visitRequests as $visit)
                    <tr style="border-top:1px solid #f0f4fa;">
                        <td style="padding:14px 18px; color:#1a2e4a; font-weight:600;">
                            {{ $visit->visitor_name ?? 'Непознат' }}
                            @if($visit->visitor_email)
                                <br><span style="font-size:0.72rem; color:#5a7299; font-weight:400;">{{ $visit->visitor_email }}</span>
                            @endif
                        </td>
                        <td style="padding:14px 18px; color:#1a2e4a;">
                            {{ $visit->prisoner_name ?? 'Непознат' }}
                        </td>
                        <td class="vr-hide-mobile" style="padding:14px 18px; color:#5a7299;">
                            {{ \Carbon\Carbon::parse($visit->requested_date)->format('d.m.Y') }}
                        </td>
                        <td style="padding:14px 18px;">
                            <div>
                                <span style="font-size:0.7rem; font-weight:700; padding:4px 12px; border-radius:20px; white-space:nowrap;
                                    background:{{ $visit->status == 'approved' ? '#d1fae5' : ($visit->status == 'rejected' ? '#fee2e2' : '#fef3c7') }};
                                    color:{{ $visit->status == 'approved' ? '#065f46' : ($visit->status == 'rejected' ? '#991b1b' : '#92400e') }};">
                                    {{ $visit->status == 'approved' ? 'Одобрено' : ($visit->status == 'rejected' ? 'Одбиено' : 'На чекање') }}
                                </span>
                                @if($visit->reason)
                                    <p style="font-size:0.72rem; color:#5a7299; margin-top:4px; font-style:italic;">{{ $visit->reason }}</p>
                                @endif
                            </div>
                        </td>
                        <td style="padding:14px 18px;">
                            <button onclick="openModal({{ $visit->id }}, '{{ addslashes($visit->visitor_name) }}', '{{ addslashes($visit->prisoner_name) }}', '{{ $visit->status }}')"
                                style="background:#315b96; color:#fff; border:none; border-radius:8px; padding:6px 14px; font-size:0.75rem; font-weight:700; cursor:pointer;"
                                onmouseover="this.style.background='#1a2e4a'" onmouseout="this.style.background='#315b96'">
                                ✎ Промени
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="padding:40px; text-align:center; color:#5a7299; font-style:italic;">
                            Нема барања за посета.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal-overlay" id="statusModal">
    <div class="modal-box">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h2 style="font-size:1.1rem; font-weight:800; color:#1a2e4a; margin:0;">Промени статус</h2>
            <button onclick="closeModal()" style="background:none; border:none; cursor:pointer; font-size:1.3rem; color:#5a7299; line-height:1;">✕</button>
        </div>

        <div style="background:#f5f8ff; border-radius:12px; padding:12px 16px; margin-bottom:20px;">
            <p style="font-size:0.8rem; color:#5a7299; margin:0 0 4px;">Барање за посета</p>
            <p style="font-size:0.9rem; font-weight:700; color:#1a2e4a; margin:0;" id="modalInfo"></p>
        </div>

        <form id="statusForm" method="POST">
            @csrf
            @method('PATCH')

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:10px;">Нов статус</label>
                <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    <label style="flex:1; min-width:100px;">
                        <input type="radio" name="status" value="approved" style="display:none;" onchange="selectStatus(this)">
                        <div class="status-option" data-val="approved" style="background:#f0fdf4; border:2px solid #bbf7d0; border-radius:10px; padding:10px 12px; text-align:center; cursor:pointer; transition:all 0.15s;">
                            <p style="font-size:1rem; margin:0;">✓</p>
                            <p style="font-size:0.75rem; font-weight:700; color:#065f46; margin:4px 0 0;">Одобри</p>
                        </div>
                    </label>
                    <label style="flex:1; min-width:100px;">
                        <input type="radio" name="status" value="pending" style="display:none;" onchange="selectStatus(this)">
                        <div class="status-option" data-val="pending" style="background:#fffbeb; border:2px solid #fde68a; border-radius:10px; padding:10px 12px; text-align:center; cursor:pointer; transition:all 0.15s;">
                            <p style="font-size:1rem; margin:0;">⏳</p>
                            <p style="font-size:0.75rem; font-weight:700; color:#92400e; margin:4px 0 0;">На чекање</p>
                        </div>
                    </label>
                    <label style="flex:1; min-width:100px;">
                        <input type="radio" name="status" value="rejected" style="display:none;" onchange="selectStatus(this)">
                        <div class="status-option" data-val="rejected" style="background:#fef2f2; border:2px solid #fecaca; border-radius:10px; padding:10px 12px; text-align:center; cursor:pointer; transition:all 0.15s;">
                            <p style="font-size:1rem; margin:0;">✕</p>
                            <p style="font-size:0.75rem; font-weight:700; color:#991b1b; margin:4px 0 0;">Одбиј</p>
                        </div>
                    </label>
                </div>
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:8px;">Причина (опционално)</label>
                <textarea name="reason" rows="3" placeholder="Напишете причина за одлуката..."
                    style="width:100%; background:#f5f8ff; border:1.5px solid #d1dff0; border-radius:12px; padding:12px 14px; font-size:0.875rem; color:#1a2e4a; outline:none; resize:vertical; font-family:inherit;"
                    onfocus="this.style.borderColor='#315b96'" onblur="this.style.borderColor='#d1dff0'"></textarea>
            </div>

            <div style="display:flex; gap:10px;">
                <button type="button" onclick="closeModal()"
                    style="flex:1; background:#f5f8ff; color:#5a7299; border:1px solid #d1dff0; border-radius:10px; padding:12px; font-size:0.875rem; font-weight:600; cursor:pointer;">
                    Откажи
                </button>
                <button type="submit"
                    style="flex:2; background:#315b96; color:#fff; border:none; border-radius:10px; padding:12px; font-size:0.875rem; font-weight:700; cursor:pointer;"
                    onmouseover="this.style.background='#1a2e4a'" onmouseout="this.style.background='#315b96'">
                    Зачувај промена
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id, visitorName, prisonerName, currentStatus) {
        document.getElementById('modalInfo').textContent = visitorName + ' → ' + prisonerName;
        document.getElementById('statusForm').action = '/admin/visits/' + id + '/status';

        // Означи го тековниот статус
        document.querySelectorAll('.status-option').forEach(el => {
            el.style.outline = 'none';
            el.style.transform = 'scale(1)';
        });
        const current = document.querySelector('.status-option[data-val="' + currentStatus + '"]');
        if (current) {
            current.style.outline = '2px solid #315b96';
            current.style.transform = 'scale(1.03)';
        }

        document.getElementById('statusModal').classList.add('open');
    }

    function closeModal() {
        document.getElementById('statusModal').classList.remove('open');
    }

    function selectStatus(input) {
        document.querySelectorAll('.status-option').forEach(el => {
            el.style.outline = 'none';
            el.style.transform = 'scale(1)';
        });
        const opt = document.querySelector('.status-option[data-val="' + input.value + '"]');
        if (opt) {
            opt.style.outline = '2px solid #315b96';
            opt.style.transform = 'scale(1.03)';
        }
    }

    // Затвори со клик надвор
    document.getElementById('statusModal').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });
</script>

@endsection