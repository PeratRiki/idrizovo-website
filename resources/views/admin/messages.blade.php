@extends('layouts.admin')

@section('content')
<style>
    * { box-sizing: border-box; }
    @media (max-width: 768px) {
        .msg-header { flex-direction: column; align-items: flex-start !important; gap: 12px; }
        .msg-table { font-size: 0.78rem !important; }
        .msg-table th, .msg-table td { padding: 10px 10px !important; }
        .msg-hide-mobile { display: none !important; }
    }
</style>

<div class="p-6 space-y-6" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div class="msg-header flex items-center justify-between">
        <div>
            <h1 style="font-size:2rem; font-weight:800; color:#1a2e4a; letter-spacing:-0.5px;">✉️ Пораки</h1>
            <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">Контактни пораки од посетители</p>
        </div>
        <div style="background:#fff; border:1px solid #d1dff0; border-radius:50px; padding:8px 18px;">
            <span style="font-size:0.75rem; font-weight:700; color:#1a2e4a;">
                Вкупно: {{ $messages->count() }} | Непрочитани: {{ $messages->where('is_read', false)->count() }}
            </span>
        </div>
    </div>

    {{-- Messages Table --}}
    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
        <div style="overflow-x:auto;">
            <table class="msg-table" style="width:100%; border-collapse:collapse; font-size:0.85rem;">
                <thead>
                    <tr style="background:#f5f8ff;">
                        <th style="padding:12px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Испраќач</th>
                        <th style="padding:12px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Е-пошта</th>
                        <th style="padding:12px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Порака</th>
                        <th class="msg-hide-mobile" style="padding:12px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Датум</th>
                        <th style="padding:12px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Статус</th>
                        <th style="padding:12px 16px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Акции</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                    <tr style="border-top:1px solid #f0f4fa; background:{{ $msg->is_read ? '#fff' : '#f5f8ff' }};">
                        <td style="padding:14px 16px; font-weight:600; color:#1a2e4a;">
                            <div style="display:flex; align-items:center; gap:10px;">
                                <div style="width:34px; height:34px; border-radius:50%; background:#e6f1fb; display:flex; align-items:center; justify-content:center; font-weight:700; color:#1d6fa5; font-size:0.8rem; flex-shrink:0;">
                                    {{ strtoupper(substr($msg->name, 0, 1)) }}
                                </div>
                                {{ $msg->name }}
                            </div>
                        </td>
                        <td style="padding:14px 16px; color:#5a7299;">{{ $msg->email }}</td>
                        <td style="padding:14px 16px; color:#1a2e4a;">{{ Str::limit($msg->message, 80) }}</td>
                        <td class="msg-hide-mobile" style="padding:14px 16px; color:#5a7299;">{{ $msg->created_at->format('d.m.Y') }}</td>
                        <td style="padding:14px 16px;">
                            <span style="font-size:0.7rem; font-weight:700; padding:3px 10px; border-radius:20px;
                                background:{{ $msg->is_read ? '#d1fae5' : '#fef3c7' }};
                                color:{{ $msg->is_read ? '#065f46' : '#92400e' }};">
                                {{ $msg->is_read ? '✓ Прочитана' : '● Непрочитана' }}
                            </span>
                        </td>
                        <td style="padding:14px 16px;">
                            @if(!$msg->is_read)
                            <form method="POST" action="{{ route('admin.messages.read', $msg->id) }}" style="display:inline;">
                                @csrf @method('PATCH')
                                <button type="submit" style="background:#1d6fa5; color:#fff; border:none; border-radius:8px; padding:6px 12px; font-size:0.75rem; font-weight:600; cursor:pointer;">
                                    Означи прочитана
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="padding:40px; text-align:center; color:#5a7299; font-style:italic;">Нема пораки.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection