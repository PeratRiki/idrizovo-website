@extends('layouts.admin')

@section('content')
<style>
    * { box-sizing: border-box; }

    @media (max-width: 768px) {
        .msg-header { flex-direction: column; align-items: flex-start !important; gap: 10px; }
        .msg-title { font-size: 1.5rem !important; }
        .msg-table th, .msg-table td { padding: 10px 12px !important; font-size: 0.78rem !important; }
        .msg-hide-mobile { display: none !important; }
        .msg-avatar { width: 32px !important; height: 32px !important; font-size: 0.75rem !important; }
    }
    @media (max-width: 480px) {
        .msg-card-pad { padding: 14px 16px !important; }
        .msg-title { font-size: 1.3rem !important; }
        .msg-badge { padding: 6px 12px !important; font-size: 0.7rem !important; }
    }
</style>

<div class="p-6 space-y-6" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div class="msg-header flex items-center justify-between">
        <div>
            <h1 class="msg-title" style="font-size:2rem; font-weight:800; color:#1a2e4a; letter-spacing:-0.5px;">
                ✉️ Пораки
            </h1>
            <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">
                Комуникација со посетителите и повратни информации.
            </p>
        </div>
        <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
            <div class="msg-badge" style="background:#fff; border:1px solid #d1dff0; border-radius:50px; padding:8px 18px; white-space:nowrap;">
                <span style="font-size:0.75rem; font-weight:700; color:#1a2e4a;">
                    Вкупно: {{ isset($messages) ? $messages->count() : 0 }}
                </span>
            </div>
            @php $unread = isset($messages) ? $messages->where('is_read', false)->count() : 0; @endphp
            @if($unread > 0)
            <div style="background:#fee2e2; border:1px solid #fca5a5; border-radius:50px; padding:8px 18px; white-space:nowrap;">
                <span style="font-size:0.75rem; font-weight:700; color:#991b1b;">
                    {{ $unread }} непрочитани
                </span>
            </div>
            @endif
        </div>
    </div>

    {{-- Messages Table --}}
    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">

        <div class="msg-card-pad" style="padding:20px 24px; border-bottom:1px solid #e8f0fb; display:flex; justify-content:space-between; align-items:center;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">📥 Inbox</h2>
        </div>

        <div style="overflow-x:auto;">
            <table class="msg-table" style="width:100%; border-collapse:collapse; font-size:0.85rem; min-width:320px;">
                <thead>
                    <tr style="background:#f5f8ff;">
                        <th style="padding:14px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Испраќач</th>
                        <th style="padding:14px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Порака</th>
                        <th style="padding:14px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Статус</th>
                        <th style="padding:14px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Акција</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages ?? [] as $message)
                    <tr style="border-top:1px solid #f0f4fa; background:{{ $message->is_read ? '#fff' : '#f8faff' }};">
                        <td style="padding:16px 20px;">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="msg-avatar" style="width:40px; height:40px; border-radius:50%; background:#e6f1fb; color:#1d6fa5; display:flex; align-items:center; justify-content:center; font-weight:700; flex-shrink:0; font-size:0.9rem;">
                                    {{ strtoupper(substr($message->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p style="font-weight:{{ $message->is_read ? '600' : '800' }}; color:#1a2e4a; margin:0;">
                                        {{ $message->name }}
                                        @if(!$message->is_read)
                                            <span style="display:inline-block; width:7px; height:7px; border-radius:50%; background:#ef4444; margin-left:6px; vertical-align:middle;"></span>
                                        @endif
                                    </p>
                                    <p class="msg-hide-mobile" style="font-size:0.75rem; color:#5a7299; margin:2px 0 0;">{{ $message->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td style="padding:16px 20px; color:#5a7299; max-width:300px;">
                            {{ Str::limit($message->message, 80) }}
                            <p style="font-size:0.72rem; color:#94a3b8; margin-top:4px;">{{ $message->created_at->diffForHumans() }}</p>
                        </td>
                        <td style="padding:16px 20px;">
                            @if($message->is_read)
                                <span style="background:#f0f4fa; color:#5a7299; font-size:0.7rem; font-weight:700; padding:4px 10px; border-radius:20px; white-space:nowrap;">
                                    ✓ Прочитано
                                </span>
                            @else
                                <span style="background:#fee2e2; color:#991b1b; font-size:0.7rem; font-weight:700; padding:4px 10px; border-radius:20px; white-space:nowrap;">
                                    Непрочитано
                                </span>
                            @endif
                        </td>
                        <td style="padding:16px 20px;">
                            <div style="display:flex; gap:6px; flex-wrap:wrap;">
                                @if(!$message->is_read)
                                <form method="POST" action="{{ route('admin.messages.read', $message->id) }}">
                                    @csrf @method('PATCH')
                                    <button type="submit"
                                        style="background:#e6f1fb; color:#1d6fa5; border:1px solid #bfdbfe; border-radius:8px; padding:5px 12px; font-size:0.72rem; font-weight:700; cursor:pointer; white-space:nowrap;"
                                        onmouseover="this.style.background='#bfdbfe'" onmouseout="this.style.background='#e6f1fb'">
                                        ✓ Означи прочитано
                                    </button>
                                </form>
                                @endif
                                <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" onsubmit="return confirm('Избриши ја оваа порака?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        style="background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; border-radius:8px; padding:5px 12px; font-size:0.72rem; font-weight:700; cursor:pointer;"
                                        onmouseover="this.style.background='#fecaca'" onmouseout="this.style.background='#fee2e2'">
                                        🗑 Избриши
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="padding:50px; text-align:center; color:#5a7299; font-style:italic;">
                            Нема пораки во сандачето.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection