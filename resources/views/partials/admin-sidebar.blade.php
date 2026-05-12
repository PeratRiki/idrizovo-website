<aside class="w-64 bg-[#0a0a0b] border-r border-white/5 flex flex-col h-screen fixed left-0 top-0 z-50">
    {{-- Branding --}}
    <div class="p-6">
        <div class="flex items-center gap-3 px-2">
            <div class="h-9 w-9 rounded-xl bg-gradient-to-tr from-[#c9b07d] to-[#e8d6c2] flex items-center justify-center text-slate-950 font-bold shadow-lg shadow-[#c9b07d]/20">
                ID
            </div>
            <span class="text-white font-bold tracking-tight text-lg">Idrizovo<span class="text-[#c9b07d]">.</span></span>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-4 space-y-1.5 mt-4 overflow-y-auto">
        <p class="text-[10px] uppercase tracking-[0.2em] text-slate-500 font-bold px-4 mb-4 opacity-50">Management</p>
        
        {{-- Insights / Dashboard --}}
        <a href="/admin" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group {{ Request::is('admin') ? 'bg-[#c9b07d]/10 text-[#c9b07d]' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            <span class="text-sm font-semibold">Insights</span>
        </a>

        {{-- Traffic / Посети --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-white/5 hover:text-white transition-all group">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
            <span class="text-sm font-semibold">Traffic Metrics</span>
        </a>

        {{-- Communications / Пораки --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-white/5 hover:text-white transition-all group">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
            <span class="text-sm font-semibold">Communications</span>
        </a>

        {{-- System Audit / Лозинки --}}
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-white/5 hover:text-white transition-all group">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
            <span class="text-sm font-semibold">System Audit</span>
        </a>
    </nav>

    {{-- Bottom Logout --}}
    <div class="p-4 border-t border-white/5 bg-[#0a0a0b]">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition-all duration-300 group">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                <span class="text-sm font-bold tracking-wide">Secure Logout</span>
            </button>
        </form>
    </div>
</aside>