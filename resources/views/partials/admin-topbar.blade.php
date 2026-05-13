<header class="sticky top-0 z-30 border-b border-slate-200/80 bg-white/95 backdrop-blur-xl">
    <div class="mx-auto flex max-w-[1480px] items-center justify-between gap-3 px-4 py-4 sm:px-6 xl:px-8">
        <div class="flex items-center gap-3">
            <button id="mobile-menu-button"
                    class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-slate-950 text-white shadow-lg transition hover:bg-slate-800 xl:hidden">
                <span class="sr-only">Open navigation</span>
                <svg viewBox="0 0 24 24" class="h-6 w-6">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>

            <div class="rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 shadow-sm">
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">Admin interface</p>
                <p class="mt-1 text-sm font-semibold text-slate-950">
                    Welcome back, {{ auth()->user()->name ?? 'Admin' }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button class="relative inline-flex h-12 w-12 items-center justify-center rounded-3xl border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-[#c9b07d] hover:text-slate-900">
                <span class="absolute -right-1 -top-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-[#c9b07d] text-[10px] font-semibold text-slate-950">
                    3
                </span>
                <svg viewBox="0 0 24 24" class="h-5 w-5">
                    <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6 6 0 1 0-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
            </button>

            <div class="inline-flex items-center gap-3 rounded-3xl border border-slate-200 bg-white px-4 py-3 shadow-sm transition hover:border-slate-300">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#c9b07d]/15 text-[#c9b07d] font-semibold uppercase">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="text-left">
                    <p class="text-sm font-semibold text-slate-950">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Administrator</p>
                </div>
            </div>
        </div>
    </div>
</header>