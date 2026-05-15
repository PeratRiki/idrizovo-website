<header>
    <!-- TOP BAR -->
    <div class="bg-[#315b96] text-white text-xs py-2 md:py-3 border-b border-white/20">
        <div class="max-w-7xl mx-auto px-4 md:px-6 flex flex-col md:flex-row justify-between items-center font-light gap-3 md:gap-0">
            <div class="topbar-left w-full md:w-1/2 hidden md:flex justify-center md:justify-start items-center gap-6 md:pr-10 md:border-r md:border-dashed md:border-blue-300/50">
                <span class="flex items-center gap-2 hover:text-gray-200 transition cursor-pointer">
                    <i class="fa-solid fa-phone text-blue-200"></i> 02 25 80 312
                </span>
                <span class="flex items-center gap-2 hover:text-gray-200 transition cursor-pointer">
                    <i class="fa-regular fa-envelope text-blue-200"></i>
                    <span class="hidden sm:inline">kpuidrizovo@kpuidrizovo.gov.mk</span>
                </span>
            </div>
            <div class="topbar-right w-full md:w-1/2 flex justify-center md:justify-end items-center gap-4 md:gap-6 md:pl-10">
                <a href="https://maps.google.com/?q=КПУ+Идризово" target="_blank" rel="noopener noreferrer"
                    class="hidden md:flex items-center gap-2 hover:text-gray-200 transition cursor-pointer">
                    <i class="fa-solid fa-location-dot text-blue-200"></i>
                    <span>ул.1 колонија Идризово бр.4А</span>
                </a>
                <div class="relative flex items-center justify-center">
                    <!-- MOBILE LANG -->
                    <div class="flex md:hidden items-center gap-3 py-1 px-4 bg-sky-700/50 rounded-full shadow-inner">
                        <button onclick="setLang('mk')" class="font-bold text-[11px] hover:text-blue-200 tracking-wider">MK</button>
                        <span class="text-white/30 text-[10px]">|</span>
                        <button onclick="setLang('sq')" class="font-bold text-[11px] hover:text-blue-200 tracking-wider">ALB</button>
                        <span class="text-white/30 text-[10px]">|</span>
                        <button onclick="setLang('en')" class="font-bold text-[11px] hover:text-blue-200 tracking-wider">EN</button>
                    </div>
                    <!-- DESKTOP LANG -->
                    <div class="hidden md:block">
                        <button id="lang-btn" class="hover:text-gray-200 transition cursor-pointer flex items-center gap-1.5 px-3 py-1.5 rounded hover:bg-sky-700">
                            <i class="fa-solid fa-globe text-lg text-sm"></i>
                            <span id="lang-label" class="text-xs font-bold tracking-wide">МК</span>
                            <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </button>
                        <div id="lang-dropdown" class="cursor-pointer hidden absolute right-0 top-full mt-2 bg-white rounded-xl shadow-2xl overflow-hidden z-20 w-48 border border-gray-100">
                            <button onclick="setLang('en')" class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                                <img src="https://flagcdn.com/w20/gb.png" srcset="https://flagcdn.com/w40/gb.png 2x" width="20" alt="UK Flag"> English
                            </button>
                            <div class="border-t border-gray-100"></div>
                            <button onclick="setLang('mk')" class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                                <img src="https://flagcdn.com/w20/mk.png" srcset="https://flagcdn.com/w40/mk.png 2x" width="20" alt="MK Flag"> Македонски
                            </button>
                            <div class="border-t border-gray-100"></div>
                            <button onclick="setLang('sq')" class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                                <img src="https://flagcdn.com/w20/al.png" srcset="https://flagcdn.com/w40/al.png 2x" width="20" alt="AL Flag"> Albanian
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="bg-[#315b96] text-white px-4 md:px-20 py-4 flex justify-between items-center shadow-md relative">
        <div class="flex items-center space-x-4 md:space-x-8">
            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                <img src="{{ asset('images/logo.png') }}" />
            </div>
            <ul class="hidden md:flex items-center space-x-6 font-medium">
                <li class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-full hover:before:w-full before:bg-white before:transition-all before:duration-500 font-bold">
                    <a href="{{ url('/') }}" data-mk="Почетна" data-sq="Kreu" data-en="Home">Почетна</a>
                </li>
                <li>
                    <a href="{{ url('/AboutUs') }}"
                       class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                       data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a>
                </li>
                <li class="relative flex items-center cursor-pointer">
                    <button id="novosti-btn" onclick="toggleNovosti(event)"
                        class="flex items-center gap-x-1 px-2 py-1 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500 focus:outline-none whitespace-nowrap">
                        <span data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости и соопштенија</span>
                        <svg class="w-4 h-4 transition-transform duration-200 flex-shrink-0" id="novosti-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="novosti-dropdown" class="hidden absolute top-full left-0 mt-3 w-48 bg-sky-600 rounded-lg shadow-xl overflow-hidden z-50 border border-blue-900">
                        <a href="{{ url('/Activities') }}"
                           class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition border-b border-white/30 text-center"
                           data-mk="Активности" data-sq="Aktivitete" data-en="Activities">Активности</a>
                        <a href="{{ url('/Novosti') }}"
                           class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition text-center"
                           data-mk="Соопштенија" data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
                    </div>
                </li>
                <li>
                    <a href="{{ url('/Handmade') }}"
                       class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                       data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a>
                </li>
                <li>
                    <a href="{{ url('/Contact') }}"
                       class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                       data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</a>
                </li>
            </ul>
        </div>

        <div class="flex items-center space-x-2 md:space-x-4">
            <button class="p-2 hidden md:block">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>

            <a href="{{ route('appointments.index') }}"
               class="bg-sky-950 text-white px-4 md:px-6 py-2 rounded-md font-bold hover:bg-black transition text-sm md:text-base hidden md:block"
               data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</a>

            <button id="hamburger-btn" class="md:hidden p-2 text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div class="scroll-top-btn fixed bottom-10 right-10 z-50">
                <button onclick="window.scrollTo({top:0,behavior:'smooth'})" class="bg-[#2b5a9e] text-white p-4 rounded-full shadow-2xl hover:bg-[#1e3a8a]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- MOBILE MENU -->
        <div id="mobile-menu" class="hidden absolute top-full left-0 right-0 bg-sky-700 z-50 shadow-lg">
            <ul class="flex flex-col font-medium text-sm">
                <li class="border-b border-sky-600"><a href="{{ url('/') }}" class="block px-6 py-3 hover:bg-sky-600 transition">Почетна</a></li>
                <li class="border-b border-sky-600"><a href="{{ url('/AboutUs') }}" class="block px-6 py-3 hover:bg-sky-600 transition">За нас</a></li>
                <li class="border-b border-sky-600"><a href="{{ url('/Novosti') }}" class="block px-6 py-3 hover:bg-sky-600 transition">Новости и соопштенија</a></li>
                <li class="border-b border-sky-600"><a href="{{ url('/Handmade') }}" class="block px-6 py-3 hover:bg-sky-600 transition">Изработки</a></li>
                <li class="border-b border-sky-600"><a href="{{ url('/Contact') }}" class="block px-6 py-3 hover:bg-sky-600 transition">Контакт</a></li>
                <li class="px-6 py-3">
                    <a href="{{ route('appointments.index') }}" class="bg-sky-950 text-white px-5 py-2 rounded-md font-bold hover:bg-black transition w-full block text-center">
                        Закажи посета
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>