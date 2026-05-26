<header class="sticky top-0 z-30 border-b border-[#dbeafe] bg-white/95 backdrop-blur-xl shadow-sm">
    <div class="mx-auto flex max-w-[1480px] items-center justify-between gap-3 px-4 py-4 sm:px-6 xl:px-8">

        {{-- Left Side --}}
        <div class="flex items-center gap-3">

            {{-- Mobile Menu --}}
            <button id="mobile-menu-button"
                    class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-[#1d6fa5] text-white shadow-md transition hover:bg-[#155a87] xl:hidden">
                <span class="sr-only">Open navigation</span>

                <svg viewBox="0 0 24 24" class="h-6 w-6">
                    <path d="M4 7h16M4 12h16M4 17h16"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round" />
                </svg>
            </button>

            {{-- Welcome Box --}}
            <div class="rounded-2xl border border-[#dbeafe] bg-[#f8fbff] px-5 py-3 shadow-sm">
                <p class="text-[11px] uppercase tracking-[0.3em] text-[#5a7299] font-bold">
                    Admin Interface
                </p>

                <p class="mt-1 text-sm font-semibold text-[#1a2e4a]">
                    Добредојде назад, {{ auth()->user()->name ?? 'Admin' }}
                </p>
            </div>

        </div>

        {{-- Right Side --}}
        <div class="flex items-center gap-3">

            {{-- Notifications --}}
            <button class="relative inline-flex h-12 w-12 items-center justify-center rounded-2xl border border-[#dbeafe] bg-white text-[#1d6fa5] shadow-sm transition hover:bg-[#f0f7ff] hover:border-[#1d6fa5]">

                <span class="absolute -right-1 -top-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-[#1d6fa5] text-[10px] font-bold text-white">
                    3
                </span>

                <svg viewBox="0 0 24 24" class="h-5 w-5">
                    <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6 6 0 1 0-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          fill="none"/>
                </svg>
            </button>

            {{-- Profile --}}
            <div class="inline-flex items-center gap-3 rounded-2xl border border-[#dbeafe] bg-white px-4 py-3 shadow-sm transition hover:border-[#1d6fa5]">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#e6f1fb] text-[#1d6fa5] font-bold uppercase">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>

                <div class="text-left hidden sm:block">
                    <p class="text-sm font-semibold text-[#1a2e4a]">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </p>

                    <p class="text-[11px] uppercase tracking-[0.25em] text-[#5a7299]">
                        Administrator
                    </p>
                </div>

            </div>

        </div>

    </div>
</header>