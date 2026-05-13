@extends('layouts.admin')
@section('content')

    <header>
        <!-- TOP BAR -->
        <div class="bg-[#315b96] text-white text-xs py-2 md:py-3 border-b border-white/20">
            <div
                class="max-w-7xl mx-auto px-4 md:px-6 flex flex-col md:flex-row justify-between items-center font-light gap-3 md:gap-0">

                <div
                    class="topbar-left w-full md:w-1/2 hidden md:flex justify-center md:justify-start items-center gap-6 md:pr-10 md:border-r md:border-dashed md:border-blue-300/50">
                    <span class="flex items-center gap-2 hover:text-gray-200 transition cursor-pointer">
                        <i class="fa-solid fa-phone text-blue-200"></i> 02 25 80 312
                    </span>
                    <span class="flex items-center gap-2 hover:text-gray-200 transition cursor-pointer">
                        <i class="fa-regular fa-envelope text-blue-200"></i>
                        <span class="hidden sm:inline">kpuidrizovo@kpuidrizovo.gov.mk</span>
                    </span>
                </div>

                <div
                    class="topbar-right w-full md:w-1/2 flex justify-center md:justify-end items-center gap-4 md:gap-6 md:pl-10">
                    <a href="https://maps.google.com/?q=КПУ+Идризово" target="_blank" rel="noopener noreferrer"
                        class="hidden md:flex items-center gap-2 hover:text-gray-200 transition cursor-pointer">
                        <i class="fa-solid fa-location-dot text-blue-200"></i>
                        <span>ул.1 колонија Идризово бр.4А</span>
                    </a>

                    <div class="relative flex items-center justify-center">

                        <div class="flex md:hidden items-center gap-3 py-1 px-4 bg-sky-700/50 rounded-full shadow-inner">
                            <button onclick="setLang('mk')"
                                class="font-bold text-[11px] hover:text-blue-200 tracking-wider">MK</button>
                            <span class="text-white/30 text-[10px]">|</span>
                            <button onclick="setLang('sq')"
                                class="font-bold text-[11px] hover:text-blue-200 tracking-wider">ALB</button>
                            <span class="text-white/30 text-[10px]">|</span>
                            <button onclick="setLang('en')"
                                class="font-bold text-[11px] hover:text-blue-200 tracking-wider">EN</button>
                        </div>

                        <div class="hidden md:block">
                            <button id="lang-btn"
                                class="hover:text-gray-200 transition cursor-pointer flex items-center gap-1.5 px-3 py-1.5 rounded hover:bg-sky-700">
                                <i class="fa-solid fa-globe text-lg text-sm"></i>
                                <span id="lang-label" class="text-xs font-bold tracking-wide">МК</span>
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </button>

                            <!-- FIX: removed 'md:hidden', added 'hidden' so JS can toggle it -->
                            <div id="lang-dropdown"
                                class="cursor-pointer hidden absolute right-0 top-full mt-2 bg-white rounded-xl shadow-2xl overflow-hidden z-20 w-48 border border-gray-100">

                                <button onclick="setLang('en')"
                                    class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                                    <img src="https://flagcdn.com/w20/gb.png" srcset="https://flagcdn.com/w40/gb.png 2x"
                                        width="20" alt="UK Flag">
                                    English
                                </button>

                                <div class="border-t border-gray-100"></div>

                                <button onclick="setLang('mk')"
                                    class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                                    <img src="https://flagcdn.com/w20/mk.png" srcset="https://flagcdn.com/w40/mk.png 2x"
                                        width="20" alt="MK Flag">
                                    Македонски
                                </button>

                                <div class="border-t border-gray-100"></div>

                                <button onclick="setLang('sq')"
                                    class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                                    <img src="https://flagcdn.com/w20/al.png" srcset="https://flagcdn.com/w40/al.png 2x"
                                        width="20" alt="AL Flag">
                                    Albanian
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
                    <li
                        class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-full hover:before:w-full before:bg-white before:transition-all before:duration-500 font-bold">
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
                            <span data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime"
                                data-en="News and announcements">Новости
                                и соопштенија</span>
                            <svg class="w-4 h-4 transition-transform duration-200 flex-shrink-0" id="novosti-icon"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <!-- FIX: changed style="display:none" to class="hidden" so JS can toggle it -->
                        <div id="novosti-dropdown"
                            class="hidden absolute top-full left-0 mt-3 w-48 bg-sky-600 rounded-lg shadow-xl overflow-hidden z-50 border border-blue-900">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                <button
                    class="bg-sky-950 text-white px-4 md:px-6 py-2 rounded-md font-bold hover:bg-black transition text-sm md:text-base hidden md:block"
                    data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</button>

                <!-- FIX: Added hamburger button with correct id -->
                <button id="hamburger-btn" class="md:hidden p-2 text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div class="scroll-top-btn fixed bottom-10 right-10 z-50">
                    <button class="bg-[#2b5a9e] text-white p-4 rounded-full shadow-2xl hover:bg-[#1e3a8a]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile menu starts hidden, JS toggles 'hidden' class -->
            <div id="mobile-menu" class="hidden absolute top-full left-0 right-0 bg-sky-700 z-50 shadow-lg">
                <ul class="flex flex-col font-medium text-sm">
                    <li class="border-b border-sky-600"><a href="{{ url('/') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                            data-mk="Почетна" data-sq="Kreu" data-en="Home">Почетна</a></li>
                    <li class="border-b border-sky-600"><a href="{{ url('/AboutUs') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                            data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a></li>
                    <li class="border-b border-sky-600"><a href="{{ url('/Novosti') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                            data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime"
                            data-en="News and announcements">Новости и соопштенија</a></li>
                    <li class="border-b border-sky-600"><a href="{{ url('/Handmade') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                            data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a></li>
                    <li class="border-b border-sky-600"><a href="{{ url('/Contact') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                            data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</a></li>
                    <li class="px-6 py-3"><button
                            class="bg-sky-950 text-white px-5 py-2 rounded-md font-bold hover:bg-black transition w-full"
                            data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>    
    <!-- HERO -->
    <section class="hero-section relative h-[600px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0"><img src="{{ asset('images/homebg.png') }}" alt="Building"
                class="w-full h-full object-cover"></div>
        <div class="container mx-auto px-4 md:px-20 z-10">
            <div class="max-w-2xl p-3 md:p-8 rounded-lg">
                <h1 class="text-5xl md:text-7xl font-extrabold text-[#1e3a8a] leading-tight">КПУ<br>ИДРИЗОВО</h1>
                <p class="text-base md:text-xl font-bold text-gray-800 mt-3 mb-8" data-mk="со отворено одделение Велес"
                    data-sq="me degën e hapur Veles" data-en="with open department Veles">со отворено одделение Велес
                </p>
                <a href="{{ url('/AboutUs') }}"
                    class="bg-[#3b71ca] mt-10 text-white px-6 md:px-8 py-3 rounded-md font-bold text-base md:text-lg hover:bg-[#2b5a9e] transition shadow-lg inline-block"
                    data-mk="Повеќе за нас" data-sq="Më shumë rreth nesh" data-en="More about us">Повеќе за нас</a>
            </div>
        </div>
    </section>

    <!-- AKTIVNOSTI -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col px-4 md:flex-row justify-between md:items-center gap-4 mb-10 md:w-full">
                <h2 class="text-3xl md:text-4xl font-bold text-[#0f172a]" data-mk="Активности" data-sq="Aktivitete"
                    data-en="Activities">Активности</h2>
                <a href="{{ url('/Activities') }}"
                    class="bg-[#3b71ca] self-start hover:bg-[#2b5a9e] text-white px-6 md:px-8 py-3 rounded-md text-base md:text-lg font-bold transition shadow-lg flex items-center gap-2 w-fit"
                    data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative h-[320px] md:h-[380px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/sport.jpg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 w-full p-6 md:p-8 flex flex-col justify-end">
                        <h3 class="text-white text-xl font-bold mb-3 underline decoration-2 underline-offset-4"
                            data-mk="Натпревар во шах" data-sq="Gara e shahut" data-en="Chess competition">Натпревар во
                            шах</h3>
                        <p class="text-gray-200 text-sm leading-relaxed"
                            data-mk="Шаховски натпревар што поттикнува фокус, стратешко размислување и позитивна интеракција меѓу учесниците во рамките на поправната средина."
                            data-sq="Një garë shahu që nxit fokusimin, mendimin strategjik dhe ndërveprimin pozitiv midis pjesëmarrësve brenda mjedisit korrektues."
                            data-en="A chess competition that encourages focus, strategic thinking and positive interaction among participants within the correctional environment.">
                            Шаховски натпревар што поттикнува фокус, стратешко размислување и позитивна интеракција меѓу
                            учесниците во рамките на поправната средина.</p>
                    </div>
                </div>
                <div class="relative h-[320px] md:h-[380px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/шиење.jpg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 w-full p-6 md:p-8 flex flex-col justify-end">
                        <h3 class="text-white text-xl font-bold mb-3 underline decoration-2 underline-offset-4"
                            data-mk="Везење" data-sq="Qëndisje" data-en="Embroidery">Везење</h3>
                        <p class="text-gray-200 text-sm leading-relaxed"
                            data-mk="Везот ги подобрува креативноста, фокусот и фините моторни вештини."
                            data-sq="Qëndisja përmirëson kreativitetin, fokusimin dhe aftësitë motorike të imëta."
                            data-en="Embroidery improves creativity, focus and fine motor skills.">Везот ги подобрува
                            креативноста, фокусот и фините моторни вештини.</p>
                    </div>
                </div>
                <div class="relative h-[320px] md:h-[380px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/rezba1.jpg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 w-full p-6 md:p-8 flex flex-col justify-end">
                        <h3 class="text-white text-xl font-bold mb-3 underline decoration-2 underline-offset-4"
                            data-mk="Резба" data-sq="Gdhendje" data-en="Wood carving">Резба</h3>
                        <p class="text-gray-200 text-sm leading-relaxed"
                            data-mk="Рачно изработени резби создадени со грижа, вештина и претворајќи ги едноставните материјали во значајни уметнички дела."
                            data-sq="Gdhendje të punuara me dorë, të krijuara me kujdes dhe aftësi, duke i kthyer materialet e thjeshta në vepra arti domethënëse."
                            data-en="Handmade carvings created with care and skill, transforming simple materials into meaningful works of art.">
                            Рачно изработени резби создадени со грижа, вештина и претворајќи ги едноставните материјали
                            во значајни уметнички дела.</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center gap-4 mt-10">
                <button class="w-10 h-3.5 bg-[#0f172a] rounded-full transition-all"></button>
                <button
                    class="w-3.5 h-3.5 border border-gray-400 rounded-full hover:bg-gray-200 transition-all"></button>
                <button
                    class="w-3.5 h-3.5 border border-gray-400 rounded-full hover:bg-gray-200 transition-all"></button>
            </div>
        </div>
    </section>

    <!-- E-VESNIK -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-[#0f172a]" data-mk="Е-весник" data-sq="E-gazetë"
                    data-en="E-newspaper">Е-весник</h2>
                <a href="#"
                    class="bg-[#315b96] hover:bg-blue-800 text-white px-4 md:px-6 py-2.5 rounded-md text-xs md:text-sm font-medium transition shadow-sm flex items-center gap-2"
                    data-mk="Превземи Е-весник" data-sq="Shkarko E-gazetën" data-en="Download E-newspaper">Превземи
                    Е-весник</a>
            </div>
            <div class="flex flex-row bg-white shadow-2xl rounded-sm overflow-hidden max-w-5xl mx-auto">
                <div class="vesnik-img w-1/2 relative bg-black min-h-[200px] md:min-h-[500px]">
                    <img src="https://images.unsplash.com/photo-1518049362265-f5b249d01f18?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Typewriter" class="absolute inset-0 w-full h-full object-cover grayscale opacity-70">
                    <div class="absolute top-0 bottom-0 left-2 md:left-6 w-4 md:w-12 bg-red-600"></div>
                    <div
                        class="absolute top-8 md:top-16 left-1/2 -translate-x-1/2 bg-gray-100 px-3 md:px-8 py-1 md:py-2 border border-gray-300 shadow-md whitespace-nowrap">
                        <h3 class="text-2xl md:text-5xl font-serif font-bold italic tracking-widest text-black">ИСКРА
                        </h3>
                    </div>
                </div>
                <div class="w-1/2 p-3 md:p-10 text-[9px] md:text-xs text-gray-800 relative overflow-hidden">
                    <p class="mb-4 md:mb-8 text-justify leading-relaxed"
                        data-mk='Осуденичкиот весник „Искра" е периодично списание изготвувано од страна на вработени во затворските установи, во соработка со лица кои издржуваат затворска казна. Весникот е наменет за осудените лица и веруваме дека ќе стане активен двигател на процесот на ресоцијализација.'
                        data-sq='Gazeta e të dënuarve „Iskra" është revistë periodike e përgatitur nga punonjësit e institucioneve të burgut, në bashkëpunim me personat që vuajnë dënimin me burg. Gazeta u dedikohet të dënuarve dhe besojmë se do të bëhet nxitës aktiv i procesit të risocializimit.'
                        data-en='The prisoner newspaper "Iskra" is a periodical prepared by prison institution employees in cooperation with persons serving sentences. The newspaper is intended for convicted persons and we believe it will become an active driver of the resocialization process.'>
                        Осуденичкиот весник „Искра" е периодично списание изготвувано од страна на вработени во
                        затворските установи, во соработка со лица кои издржуваат затворска казна. Весникот е наменет за
                        осудените лица и веруваме дека ќе стане активен двигател на процесот на ресоцијализација.</p>
                    <div class="mb-4 md:mb-8 relative pr-14 md:pr-28">
                        <h4 class="font-bold mb-1 text-black" data-mk="Автор и уредник:" data-sq="Autor dhe redaktor:"
                            data-en="Author and editor:">Автор и уредник:</h4>
                        <p class="mb-2">М-р Александар Ковилоски (сектор за ресоцијализација во КПД Идризово)</p>
                        <div class="absolute right-1 md:right-4 top-0 w-10 md:w-20 flex flex-col gap-1">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                alt="Profile" class="w-full h-8 md:h-16 object-cover border border-gray-300">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                alt="Profile" class="w-full h-8 md:h-16 object-cover border border-gray-300">
                        </div>
                        <div class="absolute right-0 top-0 bottom-0 w-1 bg-red-600"></div>
                    </div>
                    <div class="relative pl-6">
                        <div class="absolute left-0 top-0 bottom-0 w-4 bg-red-600"></div>
                        <h4 class="font-bold mb-1 text-black" data-mk="В. Д. директор на КПД Идризово:"
                            data-sq="Drejtor i përkohshëm i KPD Idrizovës:" data-en="Acting Director of KPD Idrizovo:">
                            В. Д. директор на КПД Идризово:</h4>
                        <p class="mb-4">М-р Зоран Јовановски</p>
                        <h4 class="font-bold mb-1 text-black" data-mk="Својот придонес во овој број го дадоа:"
                            data-sq="Kontribuuan në këtë numër:" data-en="Contributors to this issue:">Svojот придонес
                            во овој број го дадоа:</h4>
                        <ul class="space-y-1 mb-6 text-gray-700">
                            <li data-mk="Ф. (осудено лице во женскиот дел од КПД Идризово)"
                                data-sq="F. (person i dënuar në seksionin e femrave të KPD Idrizovës)"
                                data-en="F. (convicted person in the female section of KPD Idrizovo)">Ф. (осудено лице
                                во женскиот дел од КПД Идризово)</li>
                            <li data-mk="Осуденички од женскиот дел на КПД Идризово"
                                data-sq="Të dënuara nga seksioni i femrave i KPD Idrizovës"
                                data-en="Female convicts from the female section of KPD Idrizovo">Осуденички од женскиот
                                дел на КПД Идризово</li>
                            <li data-mk="С.Н. (осудено лице во КПД Идризово)"
                                data-sq="S.N. (person i dënuar në KPD Idrizovë)"
                                data-en="S.N. (convicted person in KPD Idrizovo)">С.Н. (осудено лице во КПД Идризово)
                            </li>
                            <li data-mk="М.М. (осудено лице во КПД Идризово)"
                                data-sq="M.M. (person i dënuar në KPD Idrizovë)"
                                data-en="M.M. (convicted person in KPD Idrizovo)">М.М. (осудено лице во КПД Идризово)
                            </li>
                            <li data-mk="Д.Т. (осудено лице во КПД Идризово)"
                                data-sq="D.T. (person i dënuar në KPD Idrizovë)"
                                data-en="D.T. (convicted person in KPD Idrizovo)">Д.Т. (осудено лице во КПД Идризово)
                            </li>
                            <li data-mk="Ч.Д. (осудено лице во КПД Идризово)"
                                data-sq="Q.D. (person i dënuar në KPD Idrizovë)"
                                data-en="Ch.D. (convicted person in KPD Idrizovo)">Ч.Д. (осудено лице во КПД Идризово)
                            </li>
                        </ul>
                        <h4 class="font-bold mb-1 text-black" data-mk="Техничка обработка:" data-sq="Përpunim teknik:"
                            data-en="Technical processing:">Техничка обработка:</h4>
                        <p>Александар Ковилоски (сектор за ресоцијализација во КПД Идризово)</p>
                    </div>
                    <p class="text-right font-bold text-[10px] mt-10 text-black"
                        data-mk="Првиот број од весникот излезе во 2019 година."
                        data-sq="Numri i parë i gazetës doli në vitin 2019."
                        data-en="The first issue of the newspaper was published in 2019.">Првиот број од весникот излезе
                        во 2019 година.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- NOVOSTI -->
    <section class="py-16 bg-gradient-to-br from-[#c8dcf0] via-[#85a8d0] to-[#517bb2]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-[#0f172a]" data-mk="Новости и соопштенија"
                    data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости и соопштенија</h2>
                <a href="{{ url('/Novosti') }}"
                    class="bg-[#315b96] hover:bg-blue-800 text-white px-4 md:px-6 py-2.5 rounded-md text-xs md:text-sm font-medium transition shadow-sm"
                    data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
            </div>
            <div class="mb-14">
                <h3 class="text-center text-white text-xl font-medium mb-8" data-mk="Нови соопштенија"
                    data-sq="Njoftime të reja" data-en="New announcements">Нови соопштенија</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl p-6 flex flex-col h-full shadow-sm hover:bg-white/30 transition-all duration-300">
                        <a href="#"
                            class="text-white font-bold text-sm uppercase underline decoration-2 underline-offset-4 mb-4 hover:text-blue-100 transition leading-snug"
                            data-mk="ИНТЕРЕН ОГЛАС за пополнување на работно место со унапредување на административен службеник"
                            data-sq="KONKURS INTERN për plotësimin e vendit të punës me avancim të nëpunësit administrativ"
                            data-en="INTERNAL ANNOUNCEMENT for filling a position by promotion of an administrative officer">ИНТЕРЕН
                            ОГЛАС за пополнување на работно место со унапредување на административен службеник</a>
                        <p class="text-white/90 text-xs leading-relaxed mb-6 flex-grow text-justify"
                            data-mk="Врз основа на член 30 став 1 алинеја 2 став 3 и став 5, член 48 и член 49 од Законот за административни службеници („Службен весник на Република Македонија"
                            бр. 27/14, 199/14, 48/15, 154/15, 5/16, 142/16, и 11/18).."
                            data-sq="Në bazë të nenit 30 paragrafi 1 pika 2, paragrafi 3 dhe 5, nenit 48 dhe 49 të Ligjit për nëpunësit administrativë (Gazeta Zyrtare nr. 27/14, 199/14, 48/15, 154/15, 5/16, 142/16, dhe 11/18).."
                            data-en="Based on Article 30 paragraph 1 item 2, paragraph 3 and 5, Article 48 and 49 of the Law on Administrative Officers (Official Gazette no. 27/14, 199/14, 48/15, 154/15, 5/16, 142/16, and 11/18)..">
                            Врз основа на член 30 став 1 алинеја 2 став 3 и став 5, член 48 и член 49 од Законот за
                            административни службеници..</p>
                        <a href="#"
                            class="bg-[#0f172a] hover:bg-gray-800 text-white text-xs font-medium px-5 py-2.5 rounded self-start transition shadow-md"
                            data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                    <div
                        class="bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl p-6 flex flex-col h-full shadow-sm hover:bg-white/30 transition-all duration-300">
                        <a href="#"
                            class="text-white font-bold text-sm uppercase underline decoration-2 underline-offset-4 mb-4 hover:text-blue-100 transition leading-snug"
                            data-mk="Одлука за избор на кандидати за унапредување на административни службеници"
                            data-sq="Vendim për zgjedhjen e kandidatëve për avancim të nëpunësve administrativë"
                            data-en="Decision on selection of candidates for promotion of administrative officers">Одлука
                            за избор на кандидати за унапредување на административни службеници</a>
                        <p class="text-white/90 text-xs leading-relaxed mb-6 flex-grow text-justify"
                            data-mk="Врз основа на чл. 52 ст.1 од Законот за Административни службеници(Сл.весник на Република Македонија бр. 27/14, 199/14, 48/15, 154/15, 5/16, 80/16, 127/16, 142/16, 2/17, 16/17, 11/18 и 275/19).."
                            data-sq="Në bazë të nenit 52 paragrafi 1 të Ligjit për Nëpunësit Administrativë (Gazeta Zyrtare nr. 27/14, 199/14, 48/15, 154/15, 5/16, 80/16, 127/16, 142/16, 2/17, 16/17, 11/18 dhe 275/19).."
                            data-en="Based on Article 52 paragraph 1 of the Law on Administrative Officers (Official Gazette no. 27/14, 199/14, 48/15, 154/15, 5/16, 80/16, 127/16, 142/16, 2/17, 16/17, 11/18 and 275/19)..">
                            Врз основа на чл. 52 ст.1 од Законот за Административни службеници..</p>
                        <a href="#"
                            class="bg-[#0f172a] hover:bg-gray-800 text-white text-xs font-medium px-5 py-2.5 rounded self-start transition shadow-md"
                            data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                    <div
                        class="bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl p-6 flex flex-col h-full shadow-sm hover:bg-white/30 transition-all duration-300">
                        <a href="#"
                            class="text-white font-bold text-sm uppercase underline decoration-2 underline-offset-4 mb-4 hover:text-blue-100 transition leading-snug"
                            data-mk="Предлог на одлука за избор на кандидати за унапредување на административни службеници"
                            data-sq="Propozim vendimi për zgjedhjen e kandidatëve për avancim të nëpunësve administrativë"
                            data-en="Proposed decision on selection of candidates for promotion of administrative officers">Предлог
                            на одлука за избор на кандидати за унапредување на административни службеници</a>
                        <p class="text-white/90 text-xs leading-relaxed mb-6 flex-grow text-justify"
                            data-mk="Врз основа на чл.52 ст.1 од Законот за Административни службеници(Сл.весник на Република Македонија бр. 7/14, 199/14, 48/15, 154/15, 5/16, 80/16, 127/16, 142/16, 2/17, 16/17, 11/18 и 275/19).."
                            data-sq="Në bazë të nenit 52 paragrafi 1 të Ligjit për Nëpunësit Administrativë (Gazeta Zyrtare nr. 7/14, 199/14, 48/15, 154/15, 5/16, 80/16, 127/16, 142/16, 2/17, 16/17, 11/18 dhe 275/19).."
                            data-en="Based on Article 52 paragraph 1 of the Law on Administrative Officers (Official Gazette no. 7/14, 199/14, 48/15, 154/15, 5/16, 80/16, 127/16, 142/16, 2/17, 16/17, 11/18 and 275/19)..">
                            Врз основа на чл.52 ст.1 од Законот за Административни службеници..</p>
                        <a href="#"
                            class="bg-[#0f172a] hover:bg-gray-800 text-white text-xs font-medium px-5 py-2.5 rounded self-start transition shadow-md"
                            data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-center text-white text-xl font-medium mb-8" data-mk="Постари соопштенија"
                    data-sq="Njoftime më të vjetra" data-en="Older announcements">Постари соопштенија</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl p-6 flex flex-col h-full shadow-sm hover:bg-white/30 transition-all duration-300">
                        <a href="#"
                            class="text-white font-bold text-sm uppercase underline decoration-2 underline-offset-4 mb-4 hover:text-blue-100 transition leading-snug"
                            data-mk="ИНТЕРЕН ОГЛАС за пополнување на работни места со унапредување на административни службеници"
                            data-sq="KONKURS INTERN për plotësimin e vendeve të punës me avancim të nëpunësve administrativë"
                            data-en="INTERNAL ANNOUNCEMENT for filling positions by promotion of administrative officers">ИНТЕРЕН
                            ОГЛАС за пополнување на работни места со унапредување на административни службеници</a>
                        <p class="text-white/90 text-xs leading-relaxed mb-6 flex-grow text-justify"
                            data-mk="Врз основа на член 30 став 1 алинеја 2 став 3 и став 5, член 48 и член 49 од Законот за административни службеници.."
                            data-sq="Në bazë të nenit 30 paragrafi 1 pika 2, paragrafi 3 dhe 5, nenit 48 dhe 49 të Ligjit për nëpunësit administrativë.."
                            data-en="Based on Article 30 paragraph 1 item 2, paragraph 3 and 5, Article 48 and 49 of the Law on Administrative Officers..">
                            Врз основа на член 30 став 1 алинеја 2 став 3 и став 5, член 48 и член 49 од Законот за
                            административни службеници..</p>
                        <a href="#"
                            class="bg-[#0f172a] hover:bg-gray-800 text-white text-xs font-medium px-5 py-2.5 rounded self-start transition shadow-md"
                            data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                    <div
                        class="bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl p-6 flex flex-col h-full shadow-sm hover:bg-white/30 transition-all duration-300">
                        <a href="#"
                            class="text-white font-bold text-sm uppercase underline decoration-2 underline-offset-4 mb-4 hover:text-blue-100 transition leading-snug"
                            data-mk="ИНТЕРЕН ОГЛАС за пополнување на работни места со унапредување на припадници на затворска полиција"
                            data-sq="KONKURS INTERN për plotësimin e vendeve të punës me avancim të anëtarëve të policisë së burgut"
                            data-en="INTERNAL ANNOUNCEMENT for filling positions by promotion of prison police officers">ИНТЕРЕН
                            ОГЛАС за пополнување на работни места со унапредување на припадници на затворска
                            полиција</a>
                        <p class="text-white/90 text-xs leading-relaxed mb-6 flex-grow text-justify"
                            data-mk="Врз основа на член 67 став 1 алинеја 2 од Законот за извршување на санкции.."
                            data-sq="Në bazë të nenit 67 paragrafi 1 pika 2 të Ligjit për ekzekutimin e sanksioneve.."
                            data-en="Based on Article 67 paragraph 1 item 2 of the Law on Execution of Sanctions..">Врз
                            основа на член 67 став 1 алинеја 2 од Законот за извршување на санкции..</p>
                        <a href="#"
                            class="bg-[#0f172a] hover:bg-gray-800 text-white text-xs font-medium px-5 py-2.5 rounded self-start transition shadow-md"
                            data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                    <div
                        class="bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl p-6 flex flex-col h-full shadow-sm hover:bg-white/30 transition-all duration-300">
                        <a href="#"
                            class="text-white font-bold text-sm uppercase underline decoration-2 underline-offset-4 mb-4 hover:text-blue-100 transition leading-snug"
                            data-mk="Рок за поднесување пријави по Јавниот оглас за вработување на неопределено време на припадници на затворска полиција бр.1/2025"
                            data-sq="Afati për dorëzimin e aplikimeve sipas Konkursit Publik për punësim të pakufizuar të anëtarëve të policisë së burgut nr.1/2025"
                            data-en="Deadline for applications for the Public Announcement for indefinite employment of prison police officers no.1/2025">Рок
                            за поднесување пријави по Јавниот оглас за вработување на неопределено време на припадници
                            на затворска полиција бр.1/2025</a>
                        <p class="text-white/90 text-xs leading-relaxed mb-6 flex-grow text-justify"
                            data-mk="Пријавите заедно со документите по Јавниот оглас за вработување на неопределено време на 2025 година..."
                            data-sq="Aplikimet bashkë me dokumentet sipas Konkursit Publik për punësim të pakufizuar të vitit 2025..."
                            data-en="Applications together with documents for the Public Announcement for indefinite employment of 2025...">
                            Пријавите заедно со документите по Јавниот оглас за вработување на неопределено време на
                            2025 година...</p>
                        <a href="#"
                            class="bg-[#0f172a] hover:bg-gray-800 text-white text-xs font-medium px-5 py-2.5 rounded self-start transition shadow-md"
                            data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RACNI IZRABOTKI -->
    <section class="py-16 bg-gradient-to-b from-blue-50/50 to-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-6 mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-[#0f172a]" data-mk="Рачни изработки"
                    data-sq="Punime me dorë" data-en="Handmade crafts">Рачни изработки</h2>

                <a href="{{ url('/Handmade') }}"
                    class="bg-[#315b96] hover:bg-blue-800 text-white px-5 py-4 rounded-md text-xl md:text-2xl font-bold transition shadow-sm flex items-center justify-center w-full md:flex-1 md:ml-10"
                    data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="relative h-[360px] md:h-[420px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/torba1.jpg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div
                        class="absolute bottom-0 left-0 w-full h-[45%] bg-black/40 backdrop-blur-md p-7 border-t border-white/10 flex flex-col justify-center">
                        <h3 class="text-white text-lg font-bold mb-3 underline decoration-2 underline-offset-4">Lorem
                            Ipsum</h3>
                        <p class="text-gray-200 text-xs leading-relaxed text-justify">Lorem Ipsum is simply dummy text
                            of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="relative h-[360px] md:h-[420px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/pernica.jpg') }}" alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div
                        class="absolute bottom-0 left-0 w-full h-[45%] bg-black/40 backdrop-blur-md p-7 border-t border-white/10 flex flex-col justify-center">
                        <h3 class="text-white text-lg font-bold mb-3 underline decoration-2 underline-offset-4">Lorem
                            Ipsum</h3>
                        <p class="text-gray-200 text-xs leading-relaxed text-justify">Lorem Ipsum is simply dummy text
                            of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="relative h-[360px] md:h-[420px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/roba.jpg') }}" alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div
                        class="absolute bottom-0 left-0 w-full h-[45%] bg-black/40 backdrop-blur-md p-7 border-t border-white/10 flex flex-col justify-center">
                        <h3 class="text-white text-lg font-bold mb-3 underline decoration-2 underline-offset-4">Lorem
                            Ipsum</h3>
                        <p class="text-gray-200 text-xs leading-relaxed text-justify">Lorem Ipsum is simply dummy text
                            of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERIJA -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl md:text-3xl font-bold text-[#0f172a] mb-10" data-mk="Галерија" data-sq="Galeri"
                data-en="Gallery">Галерија</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 mb-4">
                <div
                    class="relative h-[160px] md:h-[220px] rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image1.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div
                        class="absolute bottom-0 left-0 w-full h-1/3 bg-black/50 backdrop-blur-md flex items-center justify-center">
                        <h3 class="text-white text-xs md:text-sm font-bold tracking-wide uppercase"
                            data-mk="Рачни изработки" data-sq="Punime me dorë" data-en="Handmade crafts">Рачни изработки
                        </h3>
                    </div>
                </div>
                <div
                    class="relative h-[160px] md:h-[220px] rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image2.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div
                        class="absolute bottom-0 left-0 w-full h-1/3 bg-black/50 backdrop-blur-md flex items-center justify-center">
                        <h3 class="text-white text-xs md:text-sm font-bold tracking-wide uppercase" data-mk="Активности"
                            data-sq="Aktivitete" data-en="Activities">Активности</h3>
                    </div>
                </div>
                <div
                    class="relative h-[160px] md:h-[220px] rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image3.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div
                        class="absolute bottom-0 left-0 w-full h-1/3 bg-black/50 backdrop-blur-md flex items-center justify-center">
                        <h3 class="text-white text-xs md:text-sm font-bold tracking-wide uppercase" data-mk="Настани"
                            data-sq="Ngjarje" data-en="Events">Настани</h3>
                    </div>
                </div>
                <div
                    class="relative h-[160px] md:h-[220px] rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image4.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div
                        class="absolute bottom-0 left-0 w-full h-1/3 bg-black/50 backdrop-blur-md flex items-center justify-center">
                        <h3 class="text-white text-xs md:text-sm font-bold tracking-wide uppercase" data-mk="Установа"
                            data-sq="Institucioni" data-en="Institution">Установа</h3>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-6 gap-3 md:gap-4">
                <div
                    class="relative h-[120px] md:h-[280px] rounded-xl md:rounded-2xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image5.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div
                    class="relative h-[120px] md:h-[280px] rounded-xl md:rounded-2xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image6.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div
                    class="relative h-[120px] md:h-[280px] rounded-xl md:rounded-2xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image7.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div
                    class="relative h-[120px] md:h-[280px] rounded-xl md:rounded-2xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image8.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div
                    class="relative h-[120px] md:h-[280px] rounded-xl md:rounded-2xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image9.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div
                    class="relative h-[120px] md:h-[280px] rounded-xl md:rounded-2xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image10.jpeg') }}"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
            </div>
        </div>
    </section>

    <!-- RESURSI -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="resources-grid grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-8 lg:gap-12">
                <div class="flex flex-col items-center">
                    <div class="h-36 md:h-48 mb-6 flex items-end justify-center w-full">
                        <img src="{{ asset('images/regulativa.png') }}" alt=""
                            class="max-h-full object-contain opacity-80 hover:-translate-y-2 transition-transform duration-300">
                    </div>
                    <div class="bg-[#6a8bce] w-full rounded-2xl p-8 text-center text-white shadow-md flex-grow">
                        <h3 class="text-lg font-bold uppercase tracking-wider mb-6" data-mk="Регулатива"
                            data-sq="Rregullore" data-en="Regulation">Регулатива</h3>
                        <ul class="space-y-3 text-xs md:text-sm font-semibold uppercase tracking-wide">
                            <li><a href="#"
                                    class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                    data-mk="Закони" data-sq="Ligje" data-en="Laws">Закони</a></li>
                            <li><a href="#"
                                    class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                    data-mk="Правилници" data-sq="Rregullore" data-en="Rulebooks">Правилници</a></li>
                            <li><a href="#"
                                    class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                    data-mk="Упатство и протоколи" data-sq="Udhëzime dhe protokolle"
                                    data-en="Instructions and protocols">Упатство и протоколи</a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="h-36 md:h-48 mb-6 flex items-end justify-center w-full">
                        <img src="{{ asset('images/resursi.png') }}" alt=""
                            class="max-h-full object-contain opacity-80 hover:-translate-y-2 transition-transform duration-300">
                    </div>
                    <div class="bg-[#6a8bce] w-full rounded-2xl p-8 text-center text-white shadow-md flex-grow">
                        <h3 class="text-lg font-bold uppercase tracking-wider mb-6" data-mk="Ресурси" data-sq="Burime"
                            data-en="Resources">Ресурси</h3>
                        <ul class="space-y-3 text-xs md:text-sm font-semibold uppercase tracking-wide">
                            <li><a href="#"
                                    class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                    data-mk="Јавни набавки" data-sq="Prokurime publike"
                                    data-en="Public procurement">Јавни набавки</a></li>
                            <li><a href="#"
                                    class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                    data-mk="Буџет" data-sq="Buxheti" data-en="Budget">Буџет</a></li>
                            <li><a href="#"
                                    class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                    data-mk="Извештаи" data-sq="Raporte" data-en="Reports">Извештаи</a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="h-36 md:h-48 mb-6 flex items-end justify-center w-full">
                        <img src="{{ asset('images/odnosi.png') }}" alt=""
                            class="max-h-full object-contain opacity-80 hover:-translate-y-2 transition-transform duration-300">
                    </div>
                    <div class="bg-[#6a8bce] w-full rounded-2xl p-8 text-center text-white shadow-md flex-grow">
                        <h3 class="text-lg font-bold uppercase tracking-wider mb-6" data-mk="Односи со јавноста"
                            data-sq="Marrëdhëniet me publikun" data-en="Public relations">Односи со јавноста</h3>
                        <ul class="space-y-3 text-xs md:text-sm font-semibold uppercase tracking-wide">
                            <li><a href="#"
                                    class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                    data-mk="Информации од јавен карактер" data-sq="Informacione me karakter publik"
                                    data-en="Public information">Информации од јавен карактер</a></li>
                            <li><a href="#"
                                    class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                    data-mk="Огласи" data-sq="Njoftime" data-en="Announcements">Огласи</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DVE KOCKI -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-6 bottom-boxes flex flex-col md:flex-row justify-center items-stretch gap-6">
            <a href="tel:022580312"
                class="bg-[#0f172a] hover:bg-slate-800 text-white rounded-xl px-6 md:px-8 py-6 flex justify-between items-center w-full md:w-[450px] shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <span class="font-bold text-sm md:text-base" data-mk="Пријави корупција" data-sq="Raporto korrupsionin"
                    data-en="Report corruption">Пријави корупција</span>
                <span class="font-bold text-sm md:text-base tracking-wide">02 25 80 312</span>
            </a>
            <a href="#"
                class="bg-[#0f172a] hover:bg-slate-800 text-white rounded-xl px-6 md:px-8 py-6 flex items-center w-full md:w-[450px] shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <span class="font-bold text-sm md:text-base leading-snug"
                    data-mk="Годишен план за спречување на корупција"
                    data-sq="Plani vjetor për parandalimin e korrupsionit" data-en="Annual anti-corruption plan">Годишен
                    план за спречување на<br>корупција</span>
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-100 md:bg-transparent pt-4 md:pt-0">
        <!-- MOBILE -->
        <div
            class="md:hidden mx-4 mb-4 bg-[#315b96] rounded-3xl flex flex-col items-center text-center text-white px-6 py-8 gap-3 shadow-xl">
            <img src="{{ asset('images/logo.png') }}" alt="КПУ Идризово" class="h-16 w-auto brightness-0 invert opacity-90 mb-2">
            <a href="{{ url('/') }}" class="hover:text-blue-200 transition-colors text-sm" data-mk="Дома" data-sq="Kreu"
                data-en="Home">Дома</a>
            <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-sm" data-mk="За нас" data-sq="Rreth nesh"
                data-en="About us">За нас</a>
            <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Историја"
                data-sq="Historia" data-en="History">Историја</a>
            <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Визија"
                data-sq="Vizioni" data-en="Vision">Визија</a>
            <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Мисија"
                data-sq="Misioni" data-en="Mission">Мисија</a>
            <a href="{{ url('/Activities') }}" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Активности"
                data-sq="Aktivitete" data-en="Activities">Активности</a>
            <a href="{{ url('/Handmade') }}" class="hover:text-blue-200 transition-colors text-sm" data-mk="Изработки" data-sq="Punime"
                data-en="Crafts">Изработки</a>
            <a href="{{ url('/Contact') }}" class="hover:text-blue-200 transition-colors text-sm" data-mk="Контакт" data-sq="Kontakt"
                data-en="Contact">Контакт</a>
            <div class="flex items-center gap-3 text-blue-100 text-sm"><i
                    class="fa-solid fa-phone text-blue-200"></i><span>02 25 80 312</span></div>
            <div class="flex items-center gap-3 text-blue-100 text-sm"><i
                    class="fa-regular fa-envelope text-blue-200"></i><span>kpuidrizovo@kpuidrizovo.gov.mk</span></div>
            <div class="flex items-center gap-2 text-blue-100 text-sm"><i
                    class="fa-solid fa-location-dot text-blue-200"></i><span data-mk="ул.1 колонија Идризово бр.4A"
                    data-sq="rr.1 kolonia Idrizovë nr.4A" data-en="st.1 Idrizovo Colony no.4A">ул.1 колонија Идризово
                    бр.4A</span></div>
            <a href="#"
                class="mt-4 bg-[#0f172a] hover:bg-slate-800 text-white font-bold py-3 px-10 rounded-lg transition shadow-md"
                data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</a>
        </div>

        <!-- DESKTOP -->
        <div class="hidden md:block bg-[#315b96] border-t border-blue-800/30 py-8">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center gap-6 lg:gap-10">

                <div class="flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="КПУ Идризово"
                        class="w-20 h-20 md:w-24 md:h-24 object-contain brightness-0 invert opacity-90">
                </div>

                <div class="flex-grow flex justify-center gap-8 lg:gap-14 text-white text-sm items-start">
                    <div class="flex flex-col space-y-2.5">
                        <a href="{{ url('/') }}" class="hover:text-blue-200 transition-colors" data-mk="Дома" data-sq="Kreu"
                            data-en="Home">Дома</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors" data-mk="За нас" data-sq="Rreth nesh"
                            data-en="About us">За нас</a>
                        <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                            data-mk="Историја" data-sq="Historia" data-en="History">Историја</a>
                        <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                            data-mk="Визија" data-sq="Vizioni" data-en="Vision">Визија</a>
                        <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                            data-mk="Мисија" data-sq="Misioni" data-en="Mission">Мисија</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ url('/Novosti') }}" class="hover:text-blue-200 transition-colors" data-mk="Новости и соопштенија"
                            data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости и соопштенија</a>
                        <a href="{{ url('/Activities') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                            data-mk="Активности" data-sq="Aktivitete" data-en="Activities">Активности</a>
                        <a href="{{ url('/Novosti') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                            data-mk="Соопштенија" data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ url('/Handmade') }}" class="hover:text-blue-200 transition-colors" data-mk="Изработки" data-sq="Punime"
                            data-en="Crafts">Изработки</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ url('/Contact') }}" class="hover:text-blue-200 transition-colors" data-mk="Контакт" data-sq="Kontakt"
                            data-en="Contact">Контакт</a>
                        <div class="flex items-center space-x-2 text-blue-100/80 text-xs">
                            <i class="fa-solid fa-phone"></i><span>02 25 80 312</span>
                        </div>
                        <div class="flex items-start space-x-2 text-blue-100/80 text-xs">
                            <i class="fa-regular fa-envelope mt-0.5"></i><span
                                class="break-all">kpuidrizovo@kpuidrizovo.gov.mk</span>
                        </div>
                        <div class="flex items-center space-x-2 text-blue-100/80 text-xs">
                            <i class="fa-solid fa-location-dot"></i><span data-mk="ул.1 колонија Идризово бр.4A"
                                data-sq="rr.1 kolonia Idrizovë nr.4A" data-en="st.1 Idrizovo Colony no.4A">ул.1 колонија
                                Идризово бр.4A</span>
                        </div>
                    </div>
                </div>

                <div class="flex-shrink-0">
                    <a href="#"
                        class="inline-block bg-[#0f172a] hover:bg-slate-800 text-white text-sm py-2.5 px-6 rounded transition shadow-md whitespace-nowrap text-center"
                        data-mk="Закажи посета" data-sq="Cakto визитë" data-en="Book a visit">Закажи посета</a>
                </div>

            </div>
        </div>

    </footer>
    <script src="./script.js"></script>

@endsection