<style>
    @media (max-width: 1279px) {
        #admin-sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        #admin-sidebar.sidebar-open {
            transform: translateX(0);
        }
        #sidebar-overlay {
            display: none;
        }
        #sidebar-overlay.overlay-open {
            display: block;
        }
    }
    @media (min-width: 1280px) {
        #admin-sidebar {
            transform: translateX(0) !important;
        }
        #sidebar-overlay {
            display: none !important;
        }
    }
</style>

{{-- Overlay (mobile only) --}}
<div id="sidebar-overlay"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40"
     onclick="closeSidebar()">
</div>

<aside id="admin-sidebar" class="w-64 bg-white border-r border-[#d1dff0] flex flex-col h-screen fixed left-0 top-0 z-50 shadow-sm">

    <div class="p-6 border-b border-[#e8f0fb]">
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-[#1d6fa5] flex items-center justify-center text-white font-bold shadow-md flex-shrink-0">
                ID
            </div>
            <span class="text-[#1a2e4a] font-extrabold text-xl tracking-tight">
                Idrizovo<span class="text-[#1d6fa5]">.</span>
            </span>
            <button onclick="closeSidebar()"
                    class="ml-auto xl:hidden flex items-center justify-center w-8 h-8 rounded-lg text-[#5a7299] hover:bg-[#f0f4fa] transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </button>
        </div>
    </div>

    @php
        $isVospituvac = auth()->check() && auth()->user()->email === 'vospituvac@idrizovo.com';
    @endphp

    <nav class="flex-1 px-4 space-y-1 mt-4 overflow-y-auto">

        @unless($isVospituvac)
        <p class="text-[10px] uppercase tracking-[0.2em] text-[#5a7299] font-bold px-4 mb-4">Главно</p>

        {{-- Контролен Центар --}}
        <a href="{{ route('admin.dashboard') }}" onclick="closeSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
           {{ Request::routeIs('admin.dashboard') ? 'bg-[#e6f1fb] text-[#1d6fa5]' : 'text-[#5a7299] hover:bg-[#f5f8ff] hover:text-[#1a2e4a]' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
            </svg>
            <span class="text-sm font-bold">Контролен Центар</span>
        </a>

        {{-- Барања за посети --}}
        <a href="{{ route('admin.visits') }}" onclick="closeSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
           {{ Request::routeIs('admin.visits') ? 'bg-[#e6f1fb] text-[#1d6fa5]' : 'text-[#5a7299] hover:bg-[#f5f8ff] hover:text-[#1a2e4a]' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
            </svg>
            <span class="text-sm font-bold">Барања за посети</span>
        </a>

        {{-- Пораки --}}
        <a href="{{ route('admin.messages') }}" onclick="closeSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
           {{ Request::routeIs('admin.messages') ? 'bg-[#e6f1fb] text-[#1d6fa5]' : 'text-[#5a7299] hover:bg-[#f5f8ff] hover:text-[#1a2e4a]' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
            </svg>
            <span class="text-sm font-bold">Пораки</span>
        </a>
        @endunless

        <div class="pt-4">
            <p class="text-[10px] uppercase tracking-[0.2em] text-[#5a7299] font-bold px-4 mb-4">Содржина</p>

            {{-- Рачни изработки --}}
            <a href="{{ route('admin.handmade.index') }}" onclick="closeSidebar()"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
               {{ Request::routeIs('admin.handmade.*') ? 'bg-[#e6f1fb] text-[#1d6fa5]' : 'text-[#5a7299] hover:bg-[#f5f8ff] hover:text-[#1a2e4a]' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
                <span class="text-sm font-bold">Рачни изработки</span>
            </a>

            {{-- Новости --}}
            <a href="{{ route('admin.novosti.index') }}" onclick="closeSidebar()"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
               {{ Request::routeIs('admin.novosti.*') ? 'bg-[#e6f1fb] text-[#1d6fa5]' : 'text-[#5a7299] hover:bg-[#f5f8ff] hover:text-[#1a2e4a]' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
                <span class="text-sm font-bold">Новости</span>
            </a>

            {{-- Активности --}}
            <a href="{{ route('admin.aktivnosti.index') }}" onclick="closeSidebar()"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
               {{ Request::routeIs('admin.aktivnosti.*') ? 'bg-[#e6f1fb] text-[#1d6fa5]' : 'text-[#5a7299] hover:bg-[#f5f8ff] hover:text-[#1a2e4a]' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M13 10V3L4 14h7v7l9-11h-7z"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
                <span class="text-sm font-bold">Активности</span>
            </a>
        </div>

        @unless($isVospituvac)
        <div class="pt-4">
            <p class="text-[10px] uppercase tracking-[0.2em] text-[#5a7299] font-bold px-4 mb-4">Систем</p>

            <a href="{{ route('admin.analytics') }}" onclick="closeSidebar()"
               class="flex items-center gap-3 px-4 py-2 text-xs font-bold transition-all
               {{ Request::routeIs('admin.analytics') ? 'text-[#1d6fa5]' : 'text-[#5a7299] hover:text-[#1a2e4a]' }}">
                <span class="w-1 h-1 rounded-full bg-current"></span>
                АНАЛИТИКА
            </a>

            <a href="{{ route('admin.security') }}" onclick="closeSidebar()"
               class="flex items-center gap-3 px-4 py-2 text-xs font-bold transition-all
               {{ Request::routeIs('admin.security') ? 'text-[#1d6fa5]' : 'text-[#5a7299] hover:text-[#1a2e4a]' }}">
                <span class="w-1 h-1 rounded-full bg-current"></span>
                БЕЗБЕДНОСНИ ЛОГОВИ
            </a>

            <a href="{{ route('admin.system') }}" onclick="closeSidebar()"
               class="flex items-center gap-3 px-4 py-2 text-xs font-bold transition-all
               {{ Request::routeIs('admin.system') ? 'text-[#1d6fa5]' : 'text-[#5a7299] hover:text-[#1a2e4a]' }}">
                <span class="w-1 h-1 rounded-full bg-current"></span>
                СИСТЕМСКИ ЛОГОВИ
            </a>
        </div>
        @endunless

    </nav>

    <div class="p-6 border-t border-[#e8f0fb]">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl
                    bg-red-50 text-red-500 hover:bg-red-500 hover:text-white
                    transition-all duration-300 font-bold text-sm">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
                Одјави се
            </button>
        </form>
    </div>

</aside>

<script>
    function openSidebar() {
        document.getElementById('admin-sidebar').classList.add('sidebar-open');
        document.getElementById('sidebar-overlay').classList.add('overlay-open');
        document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
        document.getElementById('admin-sidebar').classList.remove('sidebar-open');
        document.getElementById('sidebar-overlay').classList.remove('overlay-open');
        document.body.style.overflow = '';
    }
    document.addEventListener('DOMContentLoaded', function () {
        var btn = document.getElementById('mobile-menu-button');
        if (btn) btn.addEventListener('click', openSidebar);
    });
</script>