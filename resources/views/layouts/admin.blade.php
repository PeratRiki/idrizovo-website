<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>КПУ Идризово — Админ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }

        .sidebar-link { transition: all 0.2s ease; }
        .sidebar-link:hover { background: rgba(255,255,255,0.15); transform: translateX(4px); }
        .sidebar-link.active { background: rgba(255,255,255,0.2); border-left: 3px solid white; }

        #sidebar {
            position: fixed;
            left: 0; top: 0;
            width: 256px;
            height: 100vh;
            z-index: 50;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        #sidebar.open {
            transform: translateX(0);
        }

        @media (min-width: 768px) {
            #sidebar {
                transform: translateX(0) !important;
            }
            #sidebar-overlay { display: none !important; }
            #hamburger { display: none !important; }
            .main-content { margin-left: 256px; }
        }

        @media (max-width: 767px) {
            .main-content { margin-left: 0; }
        }

        #sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 40;
        }
        #sidebar-overlay.open {
            display: block;
        }
    </style>
</head>
<body style="background:#f0f4fa; min-height:100vh;">

    <div id="sidebar-overlay" onclick="closeSidebar()"></div>

    <aside id="sidebar" style="background:#315b96; display:flex; flex-direction:column;">

        <div style="padding:24px 20px; border-bottom:1px solid rgba(255,255,255,0.15);">
            <div style="display:flex; align-items:center; gap:12px;">
                <img src="{{ asset('images/logo.png') }}" style="width:40px; height:40px; object-fit:contain; filter:brightness(0) invert(1); flex-shrink:0;" />
                <div>
                    <p style="color:#fff; font-weight:700; font-size:0.875rem; margin:0;">КПУ Идризово</p>
                    <p style="color:rgba(255,255,255,0.55); font-size:0.65rem; text-transform:uppercase; letter-spacing:0.1em; margin:0;">Админ Панел</p>
                </div>
            </div>
        </div>

        <nav style="flex:1; padding:16px 12px; display:flex; flex-direction:column; gap:2px; overflow-y:auto;">

            @php
                $isVospituvac = auth()->check() && auth()->user()->email === 'vospituvac@idrizovo.com';
                $currentUser = auth()->user();
            @endphp

            <p style="color:rgba(255,255,255,0.45); font-size:0.6rem; font-weight:700; text-transform:uppercase; letter-spacing:0.12em; padding:8px 12px 6px;">Главно</p>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:rgba(255,255,255,0.9); text-decoration:none; font-size:0.875rem; font-weight:500;">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Контролен Центар
            </a>

            @unless($isVospituvac)
            <a href="{{ route('admin.visits') }}"
               class="sidebar-link {{ request()->routeIs('admin.visits*') ? 'active' : '' }}"
               style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:rgba(255,255,255,0.9); text-decoration:none; font-size:0.875rem; font-weight:500;">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Барања за посети
                @php
                    try { $pendingVisits = \App\Models\VisitRequest::where('status','pending')->count(); } catch(\Exception $e) { $pendingVisits = 0; }
                @endphp
                @if($pendingVisits > 0)
                    <span style="margin-left:auto; background:#ef4444; color:#fff; font-size:0.6rem; font-weight:700; padding:2px 7px; border-radius:20px;">{{ $pendingVisits }}</span>
                @endif
            </a>

            <a href="{{ route('admin.messages') }}"
               class="sidebar-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}"
               style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:rgba(255,255,255,0.9); text-decoration:none; font-size:0.875rem; font-weight:500;">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Пораки
                @php
                    try { $unreadMessages = \App\Models\ContactMessage::where('is_read', false)->count(); } catch(\Exception $e) { $unreadMessages = 0; }
                @endphp
                @if($unreadMessages > 0)
                    <span style="margin-left:auto; background:#f59e0b; color:#1a2e4a; font-size:0.6rem; font-weight:700; padding:2px 7px; border-radius:20px;">{{ $unreadMessages }}</span>
                @endif
            </a>
            @endunless

            <p style="color:rgba(255,255,255,0.45); font-size:0.6rem; font-weight:700; text-transform:uppercase; letter-spacing:0.12em; padding:12px 12px 6px;">Содржина</p>

            <a href="{{ route('admin.handmade.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.handmade*') ? 'active' : '' }}"
               style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:rgba(255,255,255,0.9); text-decoration:none; font-size:0.875rem; font-weight:500;">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                Рачни изработки
            </a>

            <a href="{{ route('admin.novosti.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.novosti*') ? 'active' : '' }}"
               style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:rgba(255,255,255,0.9); text-decoration:none; font-size:0.875rem; font-weight:500;">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                Новости
            </a>

            <a href="{{ route('admin.aktivnosti.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.aktivnosti*') ? 'active' : '' }}"
               style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:rgba(255,255,255,0.9); text-decoration:none; font-size:0.875rem; font-weight:500;">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Активности
            </a>

            @unless($isVospituvac)
            <p style="color:rgba(255,255,255,0.45); font-size:0.6rem; font-weight:700; text-transform:uppercase; letter-spacing:0.12em; padding:12px 12px 6px;">Систем</p>

            <a href="{{ route('admin.analytics') }}"
               class="sidebar-link {{ request()->routeIs('admin.analytics*') ? 'active' : '' }}"
               style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:rgba(255,255,255,0.9); text-decoration:none; font-size:0.875rem; font-weight:500;">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                Аналитика
            </a>

            <a href="{{ route('admin.security') }}"
               class="sidebar-link {{ request()->routeIs('admin.security*') ? 'active' : '' }}"
               style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:rgba(255,255,255,0.9); text-decoration:none; font-size:0.875rem; font-weight:500;">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Безбедносни Логови
            </a>

            <a href="{{ route('admin.system') }}"
               class="sidebar-link {{ request()->routeIs('admin.system*') ? 'active' : '' }}"
               style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:rgba(255,255,255,0.9); text-decoration:none; font-size:0.875rem; font-weight:500;">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Системски Логови
            </a>
            @endunless

        </nav>

        <div style="padding:16px 12px; border-top:1px solid rgba(255,255,255,0.15);">
            <div style="display:flex; align-items:center; gap:10px; padding:8px 12px; margin-bottom:6px;">
                <div style="width:32px; height:32px; border-radius:10px; background:rgba(255,255,255,0.2); display:flex; align-items:center; justify-content:center; color:#fff; font-size:0.75rem; font-weight:700; flex-shrink:0;">{{ strtoupper(substr(auth()->user()?->name ?? 'A', 0, 1)) }}</div>
                <div>
                    <p style="color:#fff; font-size:0.8rem; font-weight:700; margin:0;">{{ auth()->user()?->name ?? 'Admin' }}</p>
                    <p style="color:rgba(255,255,255,0.5); font-size:0.65rem; margin:0;">{{ auth()->user()?->email === 'vospituvac@idrizovo.com' ? 'Воспитувач' : 'Администратор' }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-link"
                    style="width:100%; display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:12px; color:#fca5a5; background:none; border:none; cursor:pointer; font-size:0.875rem; font-weight:500;">
                    <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Одјави се
                </button>
            </form>
        </div>
    </aside>

    <div class="main-content" style="min-height:100vh; display:flex; flex-direction:column;">

        <header style="background:#fff; border-bottom:1px solid #d1dff0; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; position:sticky; top:0; z-index:30; box-shadow:0 1px 4px rgba(49,91,150,0.06);">
            <div style="display:flex; align-items:center; gap:14px;">
                <button id="hamburger" onclick="openSidebar()"
                    style="background:none; border:none; cursor:pointer; padding:4px; display:flex; flex-direction:column; gap:5px;">
                    <span style="display:block; width:22px; height:2px; background:#315b96; border-radius:2px;"></span>
                    <span style="display:block; width:22px; height:2px; background:#315b96; border-radius:2px;"></span>
                    <span style="display:block; width:22px; height:2px; background:#315b96; border-radius:2px;"></span>
                </button>
                <div>
                    <p style="font-size:0.6rem; text-transform:uppercase; letter-spacing:0.1em; color:#315b96; font-weight:700; margin:0;">КПУ Идризово</p>
                    <p style="font-size:0.8rem; font-weight:600; color:#1a2e4a; margin:0;">Добредојдовте, {{ auth()->user()?->name ?? 'Admin' }}</p>
                </div>
            </div>
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:0.75rem; color:#5a7299;">{{ now()->format('d.m.Y') }}</span>
                <div style="display:flex; align-items:center; gap:8px; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:50px; padding:6px 14px;">
                    <span style="width:7px; height:7px; border-radius:50%; background:#22c55e; display:inline-block; animation:pulse 2s infinite;"></span>
                    <span style="font-size:0.65rem; font-weight:700; color:#15803d; text-transform:uppercase; letter-spacing:0.08em;">Систем активен</span>
                </div>
            </div>
        </header>

        @if(session('success'))
            <div style="margin:20px 24px 0; background:#f0fdf4; border:1px solid #bbf7d0; color:#166534; padding:12px 18px; border-radius:14px; font-size:0.875rem; font-weight:500;">
                ✓ {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div style="margin:20px 24px 0; background:#fef2f2; border:1px solid #fecaca; color:#991b1b; padding:12px 18px; border-radius:14px; font-size:0.875rem; font-weight:500;">
                ✗ {{ session('error') }}
            </div>
        @endif

        <main style="flex:1;">
            @yield('content')
        </main>
    </div>

    <style>
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
    </style>

    <script>
        function openSidebar() {
            document.getElementById('sidebar').classList.add('open');
            document.getElementById('sidebar-overlay').classList.add('open');
        }
        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('sidebar-overlay').classList.remove('open');
        }
    </script>

</body>
</html>