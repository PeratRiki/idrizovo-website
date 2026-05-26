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

            {{-- Close button (mobile only) --}}
            <button onclick="closeSidebar()"
                    class="ml-auto xl:hidden flex items-center justify-center w-8 h-8 rounded-lg text-[#5a7299] hover:bg-[#f0f4fa] transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </button>

        </div>
    </div>

    <nav class="flex-1 px-4 space-y-2 mt-4 overflow-y-auto">

        <p class="text-[10px] uppercase tracking-[0.2em] text-[#5a7299] font-bold px-4 mb-4">
            Мени
        </p>

        {{-- Контролен Центар --}}
        <a href="{{ route('admin.dashboard') }}"
           onclick="closeSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
           {{ Request::routeIs('admin.dashboard')
                ? 'bg-[#e6f1fb] text-[#1d6fa5]'
                : 'text-[#5a7299] hover:bg-[#f5f8ff] hover:text-[#1a2e4a]' }}">

            <div class="w-5 h-5 flex items-center justify-center">
                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </div>

            <span class="text-sm font-bold">Контролен Центар</span>
        </a>

        {{-- Аналитика --}}
        <a href="{{ route('admin.analytics') }}"
           onclick="closeSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
           {{ Request::routeIs('admin.analytics')
                ? 'bg-[#e6f1fb] text-[#1d6fa5]'
                : 'text-[#5a7299] hover:bg-[#f5f8ff] hover:text-[#1a2e4a]' }}">

            <div class="w-5 h-5 flex items-center justify-center">
                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </div>

            <span class="text-sm font-bold">Аналитика</span>
        </a>

        {{-- Пораки --}}
        <a href="{{ route('admin.messages') }}"
           onclick="closeSidebar()"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
           {{ Request::routeIs('admin.messages')
                ? 'bg-[#e6f1fb] text-[#1d6fa5]'
                : 'text-[#5a7299] hover:bg-[#f5f8ff] hover:text-[#1a2e4a]' }}">

            <div class="w-5 h-5 flex items-center justify-center">
                <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                </svg>
            </div>

            <span class="text-sm font-bold">Пораки</span>
        </a>

        <div class="pt-6">

            <p class="text-[10px] uppercase tracking-[0.2em] text-[#5a7299] font-bold px-4 mb-4">
                Систем
            </p>

            <a href="{{ route('admin.security') }}"
               onclick="closeSidebar()"
               class="flex items-center gap-3 px-4 py-2 text-xs font-bold transition-all
               {{ Request::routeIs('admin.security')
                    ? 'text-[#1d6fa5]'
                    : 'text-[#5a7299] hover:text-[#1a2e4a]' }}">

                <span class="w-1 h-1 rounded-full bg-current"></span>
                БЕЗБЕДНОСНИ ЛОГОВИ
            </a>

            <a href="{{ route('admin.system') }}"
               onclick="closeSidebar()"
               class="flex items-center gap-3 px-4 py-2 text-xs font-bold transition-all
               {{ Request::routeIs('admin.system')
                    ? 'text-[#1d6fa5]'
                    : 'text-[#5a7299] hover:text-[#1a2e4a]' }}">

                <span class="w-1 h-1 rounded-full bg-current"></span>
                СИСТЕМСКИ ЛОГОВИ
            </a>

        </div>
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

    // Wire up the topbar hamburger button
    document.addEventListener('DOMContentLoaded', function () {
        var btn = document.getElementById('mobile-menu-button');
        if (btn) btn.addEventListener('click', openSidebar);
    });
</script>