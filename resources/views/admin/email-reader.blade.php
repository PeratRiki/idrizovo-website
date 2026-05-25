<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>КПУ Идризово — Мејл Панел</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', sans-serif; background: #0f1e2e; min-height: 100vh; display: flex; }

        /* SIDEBAR */
        .sidebar {
            width: 260px; min-width: 260px; background: #162032;
            display: flex; flex-direction: column;
            border-right: 1px solid #1e3450; height: 100vh; position: sticky; top: 0;
            overflow-y: auto;
        }
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: #1e3450; border-radius: 4px; }

        .sidebar-logo {
            padding: 20px 18px 16px;
            display: flex; align-items: center; gap: 12px;
            border-bottom: 1px solid #1e3450;
            flex-shrink: 0;
        }
        .logo-icon {
            width: 40px; height: 40px; background: #1d6fa5;
            border-radius: 10px; display: flex; align-items: center;
            justify-content: center; font-weight: 800; color: #fff; font-size: 0.78rem; flex-shrink: 0;
        }
        .logo-title { color: #fff; font-weight: 700; font-size: 0.95rem; }
        .logo-sub { color: #4a6a8a; font-size: 0.72rem; }

        .sidebar-section {
            padding: 18px 18px 6px;
            color: #3d5a7a; font-size: 0.65rem;
            font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;
        }
        .sidebar-item {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 18px; color: #6b8cae; font-size: 0.85rem;
            cursor: pointer; border-radius: 8px; margin: 2px 8px;
            transition: all 0.15s; text-decoration: none;
        }
        .sidebar-item:hover { background: #1e3450; color: #fff; }
        .sidebar-item.active { background: #1d4e7a; color: #fff; }
        .sidebar-item .icon { font-size: 0.95rem; width: 20px; text-align: center; }
        .sidebar-badge {
            margin-left: auto; background: #e74c3c; color: #fff;
            border-radius: 50px; padding: 2px 8px; font-size: 0.65rem; font-weight: 700;
        }
        .sidebar-badge.green { background: #10b981; }
        .sidebar-badge.gray { background: #3d5a7a; }

        .sidebar-bottom {
            border-top: 1px solid #1e3450; padding: 12px 8px;
            flex-shrink: 0;
        }
        .user-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px; border-radius: 8px;
        }
        .user-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: #1d6fa5; display: flex; align-items: center;
            justify-content: center; font-weight: 700; color: #fff; font-size: 0.85rem; flex-shrink: 0;
        }
        .user-name { color: #fff; font-weight: 600; font-size: 0.82rem; }
        .user-role { color: #4a6a8a; font-size: 0.68rem; }
        .logout-item {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 18px; color: #6b8cae; font-size: 0.85rem;
            cursor: pointer; border-radius: 8px; margin: 2px 8px;
            transition: all 0.15s; width: calc(100% - 16px); border: none;
            background: transparent; text-align: left; font-family: inherit;
        }
        .logout-item:hover { background: #1e3450; color: #e74c3c; }

        /* MAIN - БЕЛО */
        .main { flex: 1; display: flex; flex-direction: column; overflow: hidden; background: #ffffff; }

        /* TOPBAR */
        .topbar {
            background: #ffffff; border-bottom: 1px solid #e2e8f0;
            padding: 14px 28px; display: flex; align-items: center; justify-content: space-between;
        }
        .topbar-title { color: #1e293b; font-weight: 700; font-size: 1rem; }
        .topbar-sub { color: #64748b; font-size: 0.75rem; }
        .topbar-right { display: flex; align-items: center; gap: 16px; }
        .topbar-date { color: #64748b; font-size: 0.82rem; }
        .connected-badge {
            background: #ecfdf5; border: 1px solid #10b981;
            color: #10b981; border-radius: 50px;
            padding: 4px 12px; font-size: 0.72rem; font-weight: 700;
        }

        /* STATS */
        .stats-row {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 16px; padding: 20px 28px; background: #f8fafc;
        }
        .stat-card {
            background: #ffffff; border: 1px solid #e2e8f0;
            border-radius: 12px; padding: 16px 20px;
        }
        .stat-label { color: #64748b; font-size: 0.72rem; text-transform: uppercase; font-weight: 700; margin-bottom: 8px; }
        .stat-num { color: #1e293b; font-size: 2rem; font-weight: 800; }
        .stat-num.red { color: #e74c3c; }
        .stat-sub { color: #94a3b8; font-size: 0.72rem; margin-top: 4px; }

        /* EMAIL LIST */
        .email-area { flex: 1; display: flex; flex-direction: column; overflow: hidden; }
        .email-toolbar {
            background: #ffffff; border-bottom: 1px solid #e2e8f0;
            padding: 12px 28px; display: flex; align-items: center; gap: 10px;
        }
        .filter-btn {
            padding: 7px 18px; border-radius: 8px; font-size: 0.8rem;
            font-weight: 600; cursor: pointer; border: 1px solid #e2e8f0;
            background: transparent; color: #64748b; transition: all 0.15s;
        }
        .filter-btn.active { background: #1d4e7a; color: #fff; border-color: #1d6fa5; }
        .filter-btn:hover:not(.active) { background: #f1f5f9; color: #1e293b; }
        .search-box {
            margin-left: auto; display: flex; align-items: center;
            background: #f8fafc; border: 1px solid #e2e8f0;
            border-radius: 8px; padding: 7px 14px; gap: 8px;
        }
        .search-box input {
            border: none; background: transparent; outline: none;
            font-size: 0.82rem; color: #1e293b; width: 180px;
        }
        .search-box input::placeholder { color: #94a3b8; }

        .email-list { flex: 1; overflow-y: auto; background: #ffffff; }

        .email-item {
            background: #ffffff; border-bottom: 1px solid #f1f5f9;
            padding: 16px 28px; display: flex; align-items: flex-start;
            gap: 14px; cursor: pointer; transition: background 0.1s;
        }
        .email-item:hover { background: #f8fafc; }
        .email-item.unread { border-left: 3px solid #1d6fa5; }
        .email-item.replied { border-left: 3px solid #10b981; }
        .email-item.hidden { display: none; }

        .email-avatar {
            width: 40px; height: 40px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; color: #fff; font-size: 0.9rem; flex-shrink: 0;
        }
        .email-content { flex: 1; min-width: 0; }
        .email-header { display: flex; align-items: center; gap: 10px; margin-bottom: 4px; }
        .email-name { font-weight: 600; color: #64748b; font-size: 0.88rem; }
        .email-name.bold { font-weight: 800; color: #1e293b; }
        .email-time { margin-left: auto; color: #94a3b8; font-size: 0.75rem; flex-shrink: 0; }
        .email-subject { color: #1e293b; font-size: 0.85rem; font-weight: 600; margin-bottom: 4px; }
        .email-preview { color: #94a3b8; font-size: 0.78rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .email-tags { display: flex; gap: 6px; margin-top: 6px; }
        .tag { font-size: 0.65rem; font-weight: 700; padding: 2px 10px; border-radius: 20px; }
        .tag-urgent { background: #fee2e2; color: #dc2626; }
        .tag-normal { background: #dbeafe; color: #2563eb; }
        .tag-low { background: #f1f5f9; color: #64748b; }
        .tag-replied { background: #d1fae5; color: #059669; }
        .tag-new { background: #dbeafe; color: #2563eb; }

        /* DETAIL PANEL */
        .email-detail {
            position: fixed; top: 0; right: 0; bottom: 0;
            width: 520px; background: #162032;
            box-shadow: -4px 0 30px rgba(0,0,0,0.4);
            display: flex; flex-direction: column;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 100;
        }
        .email-detail.open { transform: translateX(0); }
        .detail-header {
            padding: 18px 24px; border-bottom: 1px solid #1e3450;
            display: flex; align-items: center; gap: 14px;
        }
        .detail-close {
            width: 32px; height: 32px; border-radius: 8px;
            background: #1e3450; border: none; cursor: pointer;
            font-size: 0.9rem; color: #6b8cae; flex-shrink: 0;
        }
        .detail-close:hover { background: #243d5c; color: #fff; }
        .detail-subject { font-size: 1rem; font-weight: 800; color: #fff; flex: 1; }
        .detail-body { flex: 1; overflow-y: auto; padding: 24px; }
        .detail-sender { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
        .detail-avatar {
            width: 44px; height: 44px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; color: #fff; font-size: 1rem; flex-shrink: 0;
        }
        .detail-name { font-weight: 700; color: #fff; font-size: 0.92rem; }
        .detail-email-addr { font-size: 0.78rem; color: #4a6a8a; }
        .detail-date { margin-left: auto; font-size: 0.75rem; color: #3d5a7a; }
        .detail-message {
            background: #1e3450; border-radius: 12px;
            padding: 18px; color: #c8d8ea; font-size: 0.9rem;
            line-height: 1.7; margin-bottom: 20px;
        }
        .detail-reply-existing {
            background: #0a2e1f; border: 1px solid #10b981;
            border-radius: 12px; padding: 16px; margin-bottom: 20px;
        }
        .reply-label { font-size: 0.7rem; font-weight: 700; color: #10b981; text-transform: uppercase; margin-bottom: 8px; }
        .reply-text { color: #c8d8ea; font-size: 0.88rem; line-height: 1.6; }
        .reply-date { font-size: 0.7rem; color: #3d5a7a; margin-top: 6px; }

        .detail-footer { padding: 18px 24px; border-top: 1px solid #1e3450; }
        .reply-textarea {
            width: 100%; background: #1e3450; border: 1px solid #243d5c;
            border-radius: 10px; padding: 14px; font-size: 0.88rem;
            font-family: inherit; resize: none; height: 110px;
            color: #fff; outline: none; margin-bottom: 12px;
        }
        .reply-textarea:focus { border-color: #1d6fa5; }
        .reply-textarea::placeholder { color: #3d5a7a; }
        .footer-actions { display: flex; gap: 10px; }
        .btn-send {
            background: #1d6fa5; color: #fff; border: none;
            border-radius: 10px; padding: 10px 24px;
            font-size: 0.85rem; font-weight: 700; cursor: pointer;
        }
        .btn-send:hover { background: #155d8e; }
        .btn-mark {
            background: #1e3450; color: #6b8cae; border: 1px solid #243d5c;
            border-radius: 10px; padding: 10px 16px;
            font-size: 0.85rem; cursor: pointer;
        }
        .btn-mark:hover { background: #243d5c; color: #fff; }

        .toast {
            position: fixed; bottom: 24px; right: 24px;
            background: #10b981; color: #fff; border-radius: 12px;
            padding: 14px 20px; font-weight: 600; font-size: 0.88rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3); z-index: 200; display: none;
        }

        /* NEW MAIL MODAL */
        .modal-overlay {
            position: fixed; inset: 0; background: rgba(0,0,0,0.5);
            z-index: 300; display: none; align-items: center; justify-content: center;
        }
        .modal-overlay.open { display: flex; }
        .modal {
            background: #162032; border-radius: 16px; width: 540px; max-width: 95vw;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            display: flex; flex-direction: column;
        }
        .modal-header {
            padding: 18px 24px; border-bottom: 1px solid #1e3450;
            display: flex; align-items: center; justify-content: space-between;
        }
        .modal-title { color: #fff; font-weight: 700; font-size: 0.95rem; }
        .modal-close {
            width: 32px; height: 32px; border-radius: 8px;
            background: #1e3450; border: none; cursor: pointer;
            font-size: 0.9rem; color: #6b8cae;
        }
        .modal-close:hover { background: #243d5c; color: #fff; }
        .modal-body { padding: 24px; display: flex; flex-direction: column; gap: 14px; }
        .modal-field label {
            display: block; color: #4a6a8a; font-size: 0.72rem;
            font-weight: 700; text-transform: uppercase; margin-bottom: 6px;
        }
        .modal-field input, .modal-field select, .modal-field textarea {
            width: 100%; background: #1e3450; border: 1px solid #243d5c;
            border-radius: 10px; padding: 10px 14px; font-size: 0.88rem;
            font-family: inherit; color: #fff; outline: none;
        }
        .modal-field input:focus, .modal-field select:focus, .modal-field textarea:focus { border-color: #1d6fa5; }
        .modal-field input::placeholder, .modal-field textarea::placeholder { color: #3d5a7a; }
        .modal-field select option { background: #162032; }
        .modal-field textarea { resize: none; height: 120px; }
        .modal-footer {
            padding: 16px 24px; border-top: 1px solid #1e3450;
            display: flex; gap: 10px; justify-content: flex-end;
        }
        .btn-cancel {
            background: #1e3450; color: #6b8cae; border: 1px solid #243d5c;
            border-radius: 10px; padding: 10px 20px; font-size: 0.85rem; cursor: pointer;
            font-family: inherit;
        }
        .btn-cancel:hover { background: #243d5c; color: #fff; }
    </style>
</head>
<body>

{{-- SIDEBAR --}}
<div class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">КПУ</div>
        <div>
            <div class="logo-title">КПУ Идризово</div>
            <div class="logo-sub">Мејл панел</div>
        </div>
    </div>

    @php
        $total   = $messages->count();
        $unread  = $messages->where('is_read', false)->count();
        $replied = $messages->whereNotNull('reply')->count();
        $urgent  = $messages->where('priority', 'urgent')->count();
    @endphp

    <div class="sidebar-section">Главно</div>
    <div class="sidebar-item active" onclick="filterMessages('all', this)">
        <span class="icon">📥</span> Дојдовни
        @if($unread > 0)<span class="sidebar-badge">{{ $unread }}</span>@endif
    </div>
    <div class="sidebar-item" onclick="filterMessages('replied', this)">
        <span class="icon">📤</span> Испратени
        @if($replied > 0)<span class="sidebar-badge green">{{ $replied }}</span>@endif
    </div>
    <div class="sidebar-item" onclick="filterMessages('unread', this)">
        <span class="icon">📋</span> Нацрти
    </div>

    <div class="sidebar-section">Категории</div>
    <div class="sidebar-item" onclick="filterMessages('urgent', this)">
        <span class="icon">📌</span> Посети
    </div>
    <div class="sidebar-item" onclick="filterMessages('normal', this)">
        <span class="icon">📊</span> Известувања
    </div>
    <div class="sidebar-item" onclick="filterMessages('low', this)">
        <span class="icon">🗂️</span> Архива
    </div>

    <div class="sidebar-section">Акции</div>
    <div class="sidebar-item" onclick="openNewMail()">
        <span class="icon">✏️</span> Нов мејл ↗
    </div>

    {{-- Bottom: user + logout --}}
    <div style="margin-top: auto;">
        <div class="sidebar-bottom">
            <div class="user-item">
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div>
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-role">Мејл читач</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-item">
                    <span class="icon">🚪</span> Одјави се
                </button>
            </form>
        </div>
    </div>
</div>

{{-- MAIN --}}
<div class="main">

    {{-- TOPBAR --}}
    <div class="topbar">
        <div>
            <div class="topbar-title">Мејл читач</div>
            <div class="topbar-sub">КПУ Идризово — Воспитувач преглед</div>
        </div>
        <div class="topbar-right">
            <span class="topbar-date">{{ now()->format('d.m.Y') }}</span>
            <span class="connected-badge">● Поврзан</span>
        </div>
    </div>

    {{-- STATS --}}
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-label">Непрочитани</div>
            <div class="stat-num">{{ $unread }}</div>
            <div class="stat-sub">Денес</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Вкупно мејлови</div>
            <div class="stat-num">{{ $total }}</div>
            <div class="stat-sub">Оваа недела</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Итни</div>
            <div class="stat-num red">{{ $urgent }}</div>
            <div class="stat-sub">Бараат одговор</div>
        </div>
    </div>

    {{-- EMAIL LIST --}}
    <div class="email-area">
        <div class="email-toolbar">
            <button class="filter-btn active" onclick="filterMessages('all', this)">Сите</button>
            <button class="filter-btn" onclick="filterMessages('unread', this)">Непрочитани</button>
            <button class="filter-btn" onclick="filterMessages('urgent', this)">Итни</button>
            <button class="filter-btn" onclick="filterMessages('replied', this)">Одговорени</button>
            <div class="search-box">
                <span style="color:#4a6a8a;">🔍</span>
                <input type="text" placeholder="Пребарај..." oninput="searchMessages(this.value)">
            </div>
        </div>

        <div class="email-list">
            @php
                $colors = ['#1d6fa5','#e67e22','#8e44ad','#10b981','#e74c3c','#f39c12'];
                $i = 0;
            @endphp
            @forelse($messages as $msg)
            @php
                $color = $colors[$i % count($colors)];
                $i++;
                $cls = [];
                if (!$msg->is_read) $cls[] = 'unread';
                if ($msg->reply) $cls[] = 'replied';
            @endphp
            <div class="email-item {{ implode(' ', $cls) }}"
                 data-read="{{ $msg->is_read ? '1' : '0' }}"
                 data-replied="{{ $msg->reply ? '1' : '0' }}"
                 data-priority="{{ $msg->priority }}"
                 data-name="{{ strtolower($msg->name) }}"
                 data-subject="{{ strtolower($msg->subject ?? '') }}"
                 onclick="openDetail({{ $msg->id }}, '{{ addslashes($msg->name) }}', '{{ addslashes($msg->email) }}', '{{ addslashes($msg->subject ?? 'Без наслов') }}', '{{ addslashes($msg->message) }}', '{{ $msg->created_at->format('d.m.Y H:i') }}', '{{ addslashes($msg->reply ?? '') }}', '{{ $msg->replied_at ? $msg->replied_at->format('d.m.Y H:i') : '' }}', '{{ $msg->priority }}', '{{ $color }}')">
                <div class="email-avatar" style="background:{{ $color }}">
                    {{ strtoupper(substr($msg->name, 0, 1)) }}
                </div>
                <div class="email-content">
                    <div class="email-header">
                        <span class="email-name {{ !$msg->is_read ? 'bold' : '' }}">{{ $msg->name }}</span>
                        <span class="email-time">{{ $msg->created_at->format('H:i') }}</span>
                    </div>
                    <div class="email-subject">{{ $msg->subject ?? 'Без наслов' }}</div>
                    <div class="email-preview">{{ Str::limit($msg->message, 80) }}</div>
                    <div class="email-tags">
                        @if($msg->priority === 'urgent')
                            <span class="tag tag-urgent">Итно</span>
                        @elseif($msg->priority === 'normal')
                            <span class="tag tag-normal">Нормално</span>
                        @else
                            <span class="tag tag-low">Ниско</span>
                        @endif
                        @if($msg->reply)
                            <span class="tag tag-replied">✓ Одговорено</span>
                        @elseif(!$msg->is_read)
                            <span class="tag tag-new">Ново</span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div style="padding:60px; text-align:center; color:#3d5a7a; font-style:italic;">Нема пораки.</div>
            @endforelse
        </div>
    </div>
</div>

{{-- DETAIL PANEL --}}
<div class="email-detail" id="emailDetail">
    <div class="detail-header">
        <button class="detail-close" onclick="closeDetail()">✕</button>
        <div class="detail-subject" id="detailSubject"></div>
    </div>
    <div class="detail-body">
        <div class="detail-sender">
            <div class="detail-avatar" id="detailAvatar"></div>
            <div>
                <div class="detail-name" id="detailName"></div>
                <div class="detail-email-addr" id="detailEmailAddr"></div>
            </div>
            <div class="detail-date" id="detailDate"></div>
        </div>
        <div class="detail-message" id="detailMessage"></div>
        <div id="detailReplyExisting"></div>
    </div>
    <div class="detail-footer">
        <form id="replyForm" method="POST">
            @csrf
            <textarea class="reply-textarea" name="reply" id="replyTextarea" placeholder="Напишете одговор..."></textarea>
            <div class="footer-actions">
                <button type="submit" class="btn-send">📨 Зачувај одговор</button>
                <button type="button" class="btn-mark" onclick="markAsRead()">✓ Прочитана</button>
            </div>
        </form>
    </div>
</div>

{{-- NEW MAIL MODAL --}}
<div class="modal-overlay" id="newMailModal">
    <div class="modal">
        <div class="modal-header">
            <div class="modal-title">✏️ Нов мејл</div>
            <button class="modal-close" onclick="closeNewMail()">✕</button>
        </div>
        {{-- ПОПРАВЕНО: action повеќе не користи route() кој не постои --}}
        <form method="POST" action="/admin/messages/send">
            @csrf
            <div class="modal-body">
                <div class="modal-field">
                    <label>До (е-пошта)</label>
                    <input type="email" name="to" placeholder="primer@email.com" required>
                </div>
                <div class="modal-field">
                    <label>Наслов</label>
                    <input type="text" name="subject" placeholder="Наслов на мејлот..." required>
                </div>
                <div class="modal-field">
                    <label>Приоритет</label>
                    <select name="priority">
                        <option value="normal">Нормално</option>
                        <option value="urgent">Итно</option>
                        <option value="low">Ниско</option>
                    </select>
                </div>
                <div class="modal-field">
                    <label>Порака</label>
                    <textarea name="message" placeholder="Напишете порака..." required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeNewMail()">Откажи</button>
                <button type="submit" class="btn-send">📨 Испрати</button>
            </div>
        </form>
    </div>
</div>

@if(session('success'))
<div class="toast" id="toast">✓ {{ session('success') }}</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const t = document.getElementById('toast');
        t.style.display = 'block';
        setTimeout(() => t.style.display = 'none', 3000);
    });
</script>
@endif

<script>
let markReadUrl = null;

function openDetail(id, name, email, subject, message, date, reply, repliedAt, priority, color) {
    document.getElementById('detailSubject').textContent = subject;
    document.getElementById('detailName').textContent = name;
    document.getElementById('detailEmailAddr').textContent = email;
    document.getElementById('detailDate').textContent = date;
    document.getElementById('detailMessage').textContent = message;

    const avatar = document.getElementById('detailAvatar');
    avatar.textContent = name.charAt(0).toUpperCase();
    avatar.style.background = color;

    document.getElementById('replyTextarea').value = reply || '';
    document.getElementById('replyForm').action = '/admin/messages/' + id + '/reply';
    markReadUrl = '/admin/messages/' + id + '/read';

    const replyExisting = document.getElementById('detailReplyExisting');
    if (reply) {
        replyExisting.innerHTML = `
            <div class="detail-reply-existing">
                <div class="reply-label">Вашиот одговор</div>
                <div class="reply-text">${reply}</div>
                <div class="reply-date">${repliedAt}</div>
            </div>`;
    } else {
        replyExisting.innerHTML = '';
    }

    document.getElementById('emailDetail').classList.add('open');
}

function closeDetail() {
    document.getElementById('emailDetail').classList.remove('open');
}

function markAsRead() {
    if (!markReadUrl) return;
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = markReadUrl;
    form.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="PATCH">`;
    document.body.appendChild(form);
    form.submit();
}

function openNewMail() {
    document.getElementById('newMailModal').classList.add('open');
}

function closeNewMail() {
    document.getElementById('newMailModal').classList.remove('open');
}

function filterMessages(type, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.sidebar-item').forEach(b => b.classList.remove('active'));
    if (btn) btn.classList.add('active');

    document.querySelectorAll('.email-item').forEach(item => {
        let show = true;
        if (type === 'unread') show = item.dataset.read === '0';
        else if (type === 'replied') show = item.dataset.replied === '1';
        else if (type === 'urgent') show = item.dataset.priority === 'urgent';
        else if (type === 'normal') show = item.dataset.priority === 'normal';
        else if (type === 'low') show = item.dataset.priority === 'low';
        item.classList.toggle('hidden', !show);
    });
}

function searchMessages(query) {
    const q = query.toLowerCase();
    document.querySelectorAll('.email-item').forEach(item => {
        const name = item.dataset.name || '';
        const subject = item.dataset.subject || '';
        item.classList.toggle('hidden', !name.includes(q) && !subject.includes(q));
    });
}
</script>
</body>
</html>