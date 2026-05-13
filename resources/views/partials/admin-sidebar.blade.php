<aside class="hidden lg:flex lg:w-72 lg:flex-col bg-slate-950 text-slate-100 shadow-2xl">
    <div class="flex items-center gap-3 border-b border-slate-800 px-6 py-6">
        <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-[#c9b07d] font-semibold text-slate-950">
            ID
        </div>
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Admin Panel</p>
            <h2 class="text-xl font-semibold text-white">Idrizovo</h2>
        </div>
    </div>

    <nav class="flex-1 overflow-y-auto px-4 py-6">
        @php
            $navItems = [
                ['label' => 'Homepage', 'path' => '/', 'route' => 'homepage.index', 'icon' => 'M3 12l9-9 9 9M4 10v10h6V14h4v6h6V10'],
                ['label' => 'Activities', 'path' => '/Activities', 'route' => 'activities.index', 'icon' => 'M4 6h16M4 12h10m-8 6h4'],
                ['label' => 'About Us', 'path' => '/AboutUs', 'route' => 'about.index', 'icon' => 'M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm-7 8a7 7 0 0 1 14 0'],
                ['label' => 'Article', 'path' => '/Article', 'route' => 'article.index', 'icon' => 'M5 7h14M5 12h14M5 17h10'],
                ['label' => 'Color', 'path' => '/Color', 'route' => 'color.index', 'icon' => 'M7 21a4 4 0 0 1-4-4V5h4l3 3 3-3h4v12a4 4 0 0 1-4 4H7z'],
                ['label' => 'Contact', 'path' => '/Contact', 'route' => 'contact.index', 'icon' => 'M3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z'],
                ['label' => 'Grncarstvo', 'path' => '/Grncarstvo', 'route' => 'grncarstvo.index', 'icon' => 'M5 12h14M12 5v14'],
                ['label' => 'Handmade', 'path' => '/Handmade', 'route' => 'handmade.index', 'icon' => 'M12 4l8 8-8 8-8-8 8-8z'],
                ['label' => 'Iglaikonec', 'path' => '/Iglaikonec', 'route' => 'iglaikonec.index', 'icon' => 'M6 6l12 12M18 6L6 18'],
                ['label' => 'Novosti', 'path' => '/Novosti', 'route' => 'novosti.index', 'icon' => 'M4 6h16M4 10h10M4 14h12M4 18h8'],
                ['label' => 'Rezba', 'path' => '/Rezba', 'route' => 'rezba.index', 'icon' => 'M5 12h14M12 5v14'],
            ];
        @endphp

        <ul class="space-y-1">
            @foreach($navItems as $item)
                @php
                    $link = Route::has($item['route']) ? route($item['route']) : url($item['path']);
                    $active = request()->is(ltrim($item['path'], '/').'*') || request()->routeIs($item['route']);
                @endphp
                <li>
                    <a href="{{ $link }}"
                       class="group flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-semibold transition duration-200 {{ $active ? 'bg-[#e8d6c2] text-slate-950 shadow-lg' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <span class="flex h-9 w-9 items-center justify-center rounded-2xl bg-white/5 text-slate-200 transition group-hover:bg-white/15">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5">
                                <path d="{{ $item['icon'] }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="border-t border-slate-800 px-6 py-4">
        <div class="rounded-2xl bg-slate-900 p-4 text-sm text-slate-300">
            <p class="font-semibold text-white">Idrizovo Admin</p>
            <p class="mt-1 text-xs text-slate-400">КПУ Идризово — Управна Плоча</p>
        </div>
    </div>
</aside>

{{-- MOBILE SIDEBAR --}}
<div id="mobile-sidebar-overlay"
     class="pointer-events-none fixed inset-0 z-40 bg-slate-950/80 opacity-0 transition-opacity duration-300 lg:hidden"></div>

<div id="mobile-sidebar"
     class="fixed inset-y-0 left-0 z-50 w-72 -translate-x-full overflow-y-auto bg-slate-950 px-4 py-6 shadow-2xl transition-transform duration-300 lg:hidden">
    <div class="flex items-center justify-between gap-3 px-2 mb-6">
        <div class="inline-flex h-11 w-11 items-center justify-center rounded-3xl bg-[#c9b07d] font-semibold text-slate-950">
            ID
        </div>
        <button type="button" id="mobile-close-button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-3xl bg-slate-900 text-slate-200 transition hover:bg-slate-800">
            <svg viewBox="0 0 24 24" class="h-5 w-5">
                <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
        </button>
    </div>

    <nav class="space-y-1">
        @foreach($navItems as $item)
            @php
                $link = Route::has($item['route']) ? route($item['route']) : url($item['path']);
            @endphp
            <a href="{{ $link }}"
               class="group flex items-center gap-3 rounded-3xl px-4 py-3 text-sm font-semibold text-slate-300 transition hover:bg-white/10 hover:text-white">
                <span class="flex h-9 w-9 items-center justify-center rounded-2xl bg-white/5">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5">
                        <path d="{{ $item['icon'] }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('mobile-menu-button');
        const closeBtn = document.getElementById('mobile-close-button');
        const sidebar = document.getElementById('mobile-sidebar');
        const overlay = document.getElementById('mobile-sidebar-overlay');

        function openSidebar() {
            sidebar.classList.add('translate-x-0');
            overlay.classList.add('opacity-100', 'pointer-events-auto');
        }

        function closeSidebar() {
            sidebar.classList.remove('translate-x-0');
            overlay.classList.remove('opacity-100', 'pointer-events-auto');
        }

        if (menuBtn) menuBtn.addEventListener('click', openSidebar);
        if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);
    });
</script>