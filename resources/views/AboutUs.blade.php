<!DOCTYPE html>
<html lang="mk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>КПУ Идризово</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        #mobile-menu {
            display: none;
        }

        #mobile-menu.open {
            display: block;
        }

        #lang-dropdown {
            display: none;
        }

        #lang-dropdown.open {
            display: block;
        }

        /* ── Topbar ── */
        @media (max-width: 767px) {
            .topbar-wrap {
                flex-direction: column;
                gap: 6px;
                align-items: flex-start;
                font-size: 10px;
            }

            .topbar-wrap .topbar-left,
            .topbar-wrap .topbar-right {
                flex-direction: column;
                gap: 4px;
                width: 100%;
                border: none !important;
                padding: 0 !important;
            }

            .hero-section {
                height: 420px !important;
            }

            .hero-section h1 {
                font-size: 3rem !important;
            }

            .hero-section p {
                font-size: 1rem !important;
            }

            .scroll-top-btn {
                display: none !important;
            }

            .vesnik-img {
                min-height: 200px !important;
            }

            .resources-grid {
                gap: 24px;
            }

            .bottom-boxes {
                flex-direction: column;
                align-items: stretch;
            }

            .bottom-boxes a {
                width: 100% !important;
            }
        }

        /* ── About hero ── */
        #about_us {
            position: relative;
            width: 100%;
            height: 650px;
        }

        @media (max-width: 767px) {
            #about_us {
                height: auto;
                min-height: 420px;
            }

            #about_us h1 {
                font-size: 2rem !important;
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* ── Сектори icon placeholder ── */
        .sector-icon-placeholder {
            height: 10rem;
            display: flex;
            align-items: flex-end;
            margin-bottom: 1rem;
        }

        @media (max-width: 767px) {
            .sector-icon-placeholder {
                height: 5rem;
                margin-bottom: 0.75rem;
            }
        }

        /* ── Card min-height override for very small screens ── */
        @media (max-width: 480px) {
            .staff-card {
                min-height: 180px !important;
            }
        }

        /* ── Sectors grid: single column on mobile ── */
        @media (max-width: 639px) {
            .sectors-grid {
                grid-template-columns: 1fr !important;
            }
        }

        /* ── Правилник section padding ── */
        @media (max-width: 767px) {
            .pravilnik-section {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }
        }

        /* ── Footer desktop layout ── */
        @media (max-width: 1023px) and (min-width: 768px) {
            .footer-desktop-inner {
                flex-wrap: wrap;
                gap: 1.5rem;
            }

            .footer-desktop-links {
                gap: 1.5rem !important;
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">
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
    </header>
    
    <!-- NAVBAR -->
    <nav class="bg-[#315b96] text-white px-4 md:px-20 py-4 flex justify-between items-center shadow-md relative">
        <div class="flex items-center space-x-4 md:space-x-8">
            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
                <img src="./images/logo.png" />
            </div>
            <ul class="hidden md:flex space-x-6 font-medium">
                <li class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-full hover:before:w-full before:bg-white before:transition-all before:duration-500 font-bold"><a href="#" data-mk="Почетна" data-sq="Kreu" data-en="Home">Почетна</a>
                </li>
                <li><a href="#"
                        class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                        data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a></li>
                <li class="relative flex items-center cursor-pointer">
                    
                    <button id="novosti-btn" onclick="toggleNovosti(event)"
                        class="flex items-center gap-x-1 px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500 focus:outline-none">
                        <span data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime"
                            data-en="News and announcements">Новости и соопштенија</span>
                        <svg class="w-4 h-4 transition-transform duration-200" id="novosti-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                
                   <div id="novosti-dropdown"
                        class="absolute top-full left-0 mt-3 w-full bg-sky-600 rounded-lg shadow-xl overflow-hidden z-50 border border-blue-900"
                        style="display:none;">
                        
                        <a href="#"
                            class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition border-b border-white/30 text-center"
                            data-mk="Активности" data-sq="Aktivitete" data-en="Activities">Активности</a>
                            
                        <a href="#"
                            class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition text-center"
                            data-mk="Соопштенија" data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
                    </div>
                
                </li>
                <li><a href="#"
                        class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                        data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a></li>
                <li><a href="#"
                        class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                        data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</a></li>
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
            <button id="hamburger-btn" class="md:hidden p-2 rounded hover:bg-sky-700 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="absolute top-full left-0 right-0 bg-sky-700 z-50 shadow-lg">
            <ul class="flex flex-col font-medium text-sm">
                <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="Почетна" data-sq="Kreu" data-en="Home">Почетна</a></li>
                <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a></li>
                <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime"
                        data-en="News and announcements">Новости и соопштенија</a></li>
                <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a></li>
                <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</a></li>
                <li class="px-6 py-3"><button class="bg-sky-950 text-white px-6 py-3 rounded-md font-bold hover:bg-black transition w-full"
                        data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</button>
                </li>
            </ul>
        </div>
    </nav>

<!-- About Hero -->
    <div id="about_us" class="relative w-full" style="height:650px;">

    <!-- Background Image -->
    <div class="absolute inset-0">
        <img 
            src="../img/Messenger_creation_1ADAC9BC-9BF5-494E-B7B5-AC6B7B26CBF1.jpeg" 
            alt="Hero" 
            class="w-full h-full object-cover brightness-110"
        />
    </div>
    <div class="absolute inset-0 bg-black/20"></div>
    
    <!-- Content -->
    <div class="relative z-10 h-full flex flex-col justify-between pt-8 md:pt-36 pb-20 md:pb-12 px-4 md:px-6">
        
        <!-- Title -->
        <h1 class="text-8xl md:text-7xl font-black text-[#101e3d] uppercase tracking-tighter md:px-16 py-24 md:py-0" data-mk="За нас" data-sq="Rreth nesh" data-en="About us">
            За нас
        </h1>

        <!-- Buttons Container -->
        <div class="flex flex-col gap-4 md:gap-4 w-full md:w-auto">
            
            <!-- Mobile Buttons (Constrained Width) -->
            <div class="flex flex-col gap-4 md:hidden w-[320px] max-w-full">
                <a href="#" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3 px-8 rounded-2xl text-center text-sm uppercase tracking-wider transition-all" data-mk="Историја" data-sq="Historia" data-en="History">
                    Историја
                </a>
                <a href="#" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3 px-8 rounded-2xl text-center text-sm uppercase tracking-wider transition-all" data-mk="Визија" data-sq="Vizioni" data-en="Vision">
                    Визија
                </a>
                <a href="#" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3 px-8 rounded-2xl text-center text-sm uppercase tracking-wider transition-all" data-mk="Мисија" data-sq="Misioni" data-en="Mission">
                    Мисија
                </a>
            </div>

            <!-- Desktop Buttons (Side by Side) -->
            <div class="hidden md:flex flex-row gap-4 justify-around">
                <a href="#" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3.5 px-14 rounded-lg text-center text-[12px] uppercase tracking-widest transition-all" data-mk="Историја" data-sq="Historia" data-en="History">
                    Историја
                </a>
                <a href="#" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3.5 px-14 rounded-lg text-center text-[12px] uppercase tracking-widest transition-all" data-mk="Визија" data-sq="Vizioni" data-en="Vision">
                    Визија
                </a>
                <a href="#" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3.5 px-14 rounded-lg text-center text-[12px] uppercase tracking-widest transition-all" data-mk="Мисија" data-sq="Misioni" data-en="Mission">
                    Мисија
                </a>
            </div>

        </div>

    </div>
    </div>

    <!-- Историја Section -->
    <section class="relative bg-white py-12 md:py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-16 items-center">
                
                <div class="w-full order-2 lg:order-1">
                    <img 
                        src="../img/Messenger_creation_B317B5D7-CA3E-4593-A061-699FE4B79381.jpeg" 
                        alt="Историја" 
                        class="rounded-2xl md:rounded-[3rem] w-full h-auto object-cover grayscale shadow-sm"
                    >
                </div>

                <div class="order-1 lg:order-2">
                    <h2 class="text-2xl md:text-4xl font-black text-[#101e3d] mb-6 md:mb-8" data-mk="Историја" data-sq="Historia" data-en="History">Историја</h2>
                    <div class="space-y-4 md:space-y-6 text-sm md:text-[16px] text-gray-700 leading-relaxed font-medium">
                        <p data-mk="Казнено-Поправниот Дом Идризово е најголемата затворска установа во Република С. Македонија. Таа се наоѓа околу 10 километри југоисточно од Скопје и претставува централна установа за издржување затворски казни." data-sq="Shtëpia e Punës Penale Idrizovo është institucion më i madh i burgimit në Republikën e Maqedonisë. Ndodhet rreth 10 kilometra në jugolindje të Shkupit dhe përfaqëson institucionin qendror për ekzekutimin e dënimeve me burg." data-en="The Penal Prison House Idrizovo is the largest correctional facility in the Republic of Macedonia. It is located about 10 kilometers southeast of Skopje and represents the central facility for serving prison sentences.">
                            Казнено-Поправниот Дом Идризово е најголемата затворска установа 
                            во Република С. Македонија. Таа се наоѓа околу 10 километри 
                            југоисточно од Скопје и претставува централна установа за 
                            издржување затворски казни.
                        </p>
                        <p data-mk="Историјата на КПД Идризово започнува во текот на Втората светска војна, кога е изграден војни камп од страна на бугарската окупаторска војска. Веднаш по завршувањето на Втората светска војна продолжува да функционира како затвор – работна колонија." data-sq="Histori i KPD Idrizovo fillon gjatë Luftës së Dytë Botërore, kur një kampi ushtarak ishte ndërtuar nga ushtria okupuese bullgare. Menjëherë pas përfundimit të Luftës së Dytë Botërore, ajo vazhdoi të funksionojë si burg - koloni pune." data-en="The history of KPD Idrizovo began during World War II, when a military camp was built by the Bulgarian occupying army. Immediately after the end of World War II, it continued to function as a prison - a labor colony.">
                            Историјата на КПД Идризово започнува во текот на Втората светска 
                            војна, кога е изграден војни камп од страна на бугарската окупаторска 
                            војска. Веднаш по завршувањето на Втората светска војна продолжува 
                            да функционира како затвор – работна колонија.
                        </p>
                    </div>
                    <button class="mt-6 md:mt-8 text-[#101e3d] font-bold text-sm md:text-[15px] underline underline-offset-8 decoration-2 hover:opacity-60 transition" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">
                        Прочитај повеќе
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Управа Section -->
    <section class="relative bg-white pb-12 md:pb-24">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <h2 class="text-2xl md:text-4xl font-black text-[#101e3d] mb-8 md:mb-16" data-mk="Управа" data-sq="Administrata" data-en="Administration">Управа</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 md:gap-12 lg:gap-24 max-w-5xl mx-auto">
                
                <div class="text-center group">
                    <div class="relative rounded-2xl md:rounded-[2.5rem] overflow-hidden bg-gradient-to-b from-[#6b96d3] to-[#2b5292] aspect-[4/3] mb-4 md:mb-6">
                        <img 
                            src="director.png" 
                            alt="Директор" 
                            class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[90%] h-auto object-contain"
                        >
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-[#101e3d]">М-р. Зоран Јовановски</h3>
                    <p class="text-[10px] md:text-[11px] uppercase tracking-[0.2em] text-gray-400 font-black mt-2" data-mk="Директор" data-sq="Drejtori" data-en="Director">Директор</p>
                </div>

                <div class="text-center group">
                    <div class="relative rounded-2xl md:rounded-[2.5rem] overflow-hidden bg-gradient-to-b from-[#6b96d3] to-[#2b5292] aspect-[4/3] mb-4 md:mb-6">
                        <img 
                            src="" 
                            alt="Заменик Директор" 
                            class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[90%] h-auto object-contain"
                        >
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-[#101e3d]">Наим Љамалари</h3>
                    <p class="text-[10px] md:text-[11px] uppercase tracking-[0.2em] text-gray-400 font-black mt-2" data-mk="Заменик директор" data-sq="Zëvendësdrejtori" data-en="Deputy Director">Заменик директор</p>
                </div>

            </div>
        </div>
    </section>

<!-- Одговорни Службени Лица Section -->
    <section class="bg-white py-12 md:py-20">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <h2 class="text-2xl md:text-4xl font-black text-[#101e3d] text-center mb-8 md:mb-16" data-mk="Одговорни службени лица" data-sq="Persona zyrtar përgjegjës" data-en="Responsible officials">
            Одговорни службени лица
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            
            <!-- Card 1 -->
            <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Разије Osmanи Хоџа</h3>
                    <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Лице за посредување со информации" data-sq="Person për ndërmjetësimin e informacionit" data-en="Person for intermediating information">
                        Лице за посредување со информации
                    </p>
                </div>
                <a href="mailto:razije@kpuidrizovo.gov.mk" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                    <i class="fa-regular fa-envelope text-sm"></i>
                    <span class="break-all">razije@kpuidrizovo.gov.mk</span>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Горан Јовчевски</h3>
                    <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Лице за заштитено внатрешно пријавување" data-sq="Person për raportime të mbrojtur të brendshme" data-en="Person for protected internal reporting">
                        Лице за заштитено внатрешно пријавување
                    </p>
                </div>
                <a href="mailto:prijava@kpuidrizovo.gov.mk" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                    <i class="fa-regular fa-envelope text-sm"></i>
                    <span class="break-all">prijava@kpuidrizovo.gov.mk</span>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Виолета Тепеѓозова</h3>
                    <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Раководител на одделение за човечки ресурси" data-sq="Drejtori i departamentit të burimeve njerëzore" data-en="Head of human resources department">
                        Раководител на одделение за човечки ресурси
                    </p>
                </div>
                <a href="mailto:violeta.tepegozova@kpuidrizovo.gov.mk" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                    <i class="fa-regular fa-envelope text-sm"></i>
                    <span class="break-all">violeta.tepegozova@kpuidrizovo.gov.mk</span>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Владимир Арсковски</h3>
                    <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Раководител на сектор за општо-правни работи и јавни набавки" data-sq="Drejtori i sektorit për punë të përgjithshme ligjore dhe prokurimit publik" data-en="Head of general legal affairs and public procurement sector">
                        Раководител на сектор за општо-правни работи и јавни набавки
                    </p>
                </div>
                <a href="mailto:vladimirarsovski@gmail.com" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                    <i class="fa-regular fa-envelope text-sm"></i>
                    <span class="break-all">vladimirarsovski@gmail.com</span>
                </a>
            </div>

            <!-- Card 5 -->
            <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Африм Незири</h3>
                    <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Раководител на сектор за ресоцијализација" data-sq="Drejtori i sektorit për riintegrimin" data-en="Head of rehabilitation sector">
                        Раководител на сектор за ресоцијализација
                    </p>
                </div>
                <a href="mailto:kpuidrizovo@kpuidrizovo.gov.mk" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                    <i class="fa-regular fa-envelope text-sm"></i>
                    <span class="break-all">kpuidrizovo@kpuidrizovo.gov.mk</span>
                </a>
            </div>

            <!-- Card 6 -->
            <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Цветков Љупчо</h3>
                    <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Помошник раководител во сектор за ресоцијализација" data-sq="Zëvendës-drejtori në sektorin e riintegrimit" data-en="Deputy head in rehabilitation sector">
                        Помошник раководител во сектор за ресоцијализација
                    </p>
                </div>
                <a href="mailto:ljupco.cvetkov73@gmail.com" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                    <i class="fa-regular fa-envelope text-sm"></i>
                    <span class="break-all">ljupco.cvetkov73@gmail.com</span>
                </a>
            </div>

        </div>

        <!-- Last Two Cards - Centered -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 max-w-2xl mx-auto mt-8 md:mt-12">
            
            <!-- Card 7 -->
            <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Марија Цветкова</h3>
                    <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Раководител во отворено одделение Велес" data-sq="Drejtore në degën e hapë të Veles" data-en="Head of open section in Veles">
                        Раководител во отворено одделение Велес
                    </p>
                </div>
                <a href="mailto:otvorenooddelenieveles@yahoo.com" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                    <i class="fa-regular fa-envelope text-sm"></i>
                    <span class="break-all">otvorenooddelenieveles@yahoo.com</span>
                </a>
            </div>

            <!-- Card 8 -->
            <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3">Игор Кокалински</h3>
                    <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Заповедник во затворска полиција" data-sq="Komandant në policinë e burgut" data-en="Commander in prison police">
                        Заповедник во затворска полиција
                    </p>
                </div>
            </div>

        </div>

    </div>
    </section>

    <!-- Правилник Section -->
    <section class="pravilnik-section bg-white py-12 md:py-20">
        <div class="max-w-4xl mx-auto px-4 md:px-6 text-center">
            <h2 class="text-2xl md:text-[32px] font-black text-[#101e3d] uppercase tracking-wider mb-4 md:mb-6" data-mk="Правилник" data-sq="Rregullore" data-en="Regulations">
                Правилник
            </h2>
            
            <h3 class="text-lg md:text-2xl font-bold text-[#101e3d] leading-snug mb-6 md:mb-10" data-mk="за внатрешна организација и работа на Казнено-поправната установа - Казнено-поправен дом Идризово со Отворено одделение во Велес" data-sq="për organizimin e brendshëm dhe funksionimin e Institucioni Penal - Shtëpia e Punës Penale Idrizovo me degën e hapur në Veles" data-en="on internal organization and operation of the Penal Institution - Penal Prison House Idrizovo with Open Section in Veles">
                за внатрешна организација и работа на Казнено-поправната установа - <br class="hidden md:block">
                Казнено-поправен дом Идризово со Отворено одделение во Велес
            </h3>

            <p class="text-gray-600 text-sm md:text-[15px] leading-relaxed font-medium mb-8 md:mb-12 px-4 md:px-10" data-mk="Со овој Правилник се уредува организацијата и работата на Казнено-поправната установа - Казнено-поправниот дом Идризово - со отворено одделение во Велес (во понатамошниот текст: Установата), се утврдуваат внатрешната организација, видот на организационите единици и нивниот делокруг на работење, раководење во Установата и во организационите единици, програмирањето и извршувањето на работите и задачите во установата." data-sq="Me këtë Rregullore rregullohet organizimi dhe funksionimi i Institucioni Penal - Shtëpia e Punës Penale Idrizovo - me degën e hapur në Veles (në tekstin e mëtejshëm: Institucioni), përcaktohet organizimi i brendshëm, lloji i njësive organizative dhe rreth i tyre punës, drejtimi në Institucioni dhe në njësitë organizative, planifikimi dhe ekzekutimi i punëve dhe detyrave në institucioni." data-en="This Regulation governs the organization and operation of the Penal Institution - Penal Prison House Idrizovo - with an open section in Veles (hereinafter: the Institution), establishes internal organization, the type of organizational units and their scope of work, management in the Institution and in organizational units, planning and execution of work and tasks in the institution.">
                Со овој Правилник се уредува организацијата и работата на Казнено-поправната установа - Казнено-поправниот дом Идризово - со отворено одделение во Велес (во понатамошниот текст: Установата), се утврдуваат внатрешната организација, видот на организационите единици и нивниот делокруг на работење, раководење во Установата и во организационите единици, програмирањето и извршувањето на работите и задачите во установата.
            </p>

            <a href="#" class="inline-block bg-[#101e3d] text-white font-bold px-8 md:px-12 py-3 md:py-4 rounded-xl hover:bg-[#1a2e5a] transition-all duration-300 shadow-md uppercase tracking-widest text-xs md:text-sm" data-mk="Превземи" data-sq="Shkarko" data-en="Download">
                Превземи
            </a>
        </div>
    </section>

    <!-- Сектори Section -->
    <section class="relative py-12 md:py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-white via-[#7195d1]/40 to-white -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <h2 class="text-2xl md:text-4xl font-black text-[#101e3d] mb-8 md:mb-20" data-mk="Сектори" data-sq="Sektore" data-en="Sectors">Сектори</h2>

            <div class="sectors-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-x-10 md:gap-y-24">
                
                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder">
                        <img src="../icons/solving a mental health problem.png" alt="Icon" class="w-32 md:w-44 h-auto object-contain">
                    </div>
                    <div class="bg-[#7195d1]/40 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[200px] md:min-h-[220px] shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider mb-3 md:mb-5 leading-tight" data-mk="Сектор за ресоцијализација" data-sq="Sektori i riintegrimit" data-en="Rehabilitation Sector">Сектор за ресоцијализација</h3>
                        <ul class="text-[11px] md:text-[12px] space-y-1 md:space-y-2 opacity-95 font-medium leading-relaxed">
                            <li data-mk="1. Одделение за прием" data-sq="1. Departamenti i pranimit" data-en="1. Reception Department">1. Одделение за прием</li>
                            <li data-mk="2. Одделение за третман" data-sq="2. Departamenti i trajtimit" data-en="2. Treatment Department">2. Одделение за третман</li>
                            <li data-mk="3. Одделение за стручно инструкторски работи" data-sq="3. Departamenti për punë instruksioni në specialitet" data-en="3. Specialized Instructional Work Department">3. Одделение за стручно инструкторски работи</li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder">
                        <img src="../icons/searching for a file in a folder.png" alt="Icon" class="w-32 md:w-44 h-auto object-contain">
                    </div>
                    <div class="bg-[#7195d1]/40 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[200px] md:min-h-[220px] shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider mb-3 md:mb-5 leading-tight" data-mk="Сектор за општи-правни работи и јавни набавки" data-sq="Sektori për punë të përgjithshme ligjore dhe prokurimit publik" data-en="General Legal Affairs and Public Procurement Sector">Сектор за општи-правни работи и јавни набавки</h3>
                        <ul class="text-[11px] md:text-[12px] space-y-1 md:space-y-2 opacity-95 font-medium leading-relaxed">
                            <li data-mk="1. Одделение за општи-правни работи" data-sq="1. Departamenti për punë të përgjithshme ligjore" data-en="1. General Legal Affairs Department">1. Одделение за општи-правни работи</li>
                            <li data-mk="2. Одделение за јавни набавки" data-sq="2. Departamenti i prokurimit publik" data-en="2. Public Procurement Department">2. Одделение за јавни набавки</li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder">
                        <img src="../icons/standardized test as method of assessment.png" alt="Icon" class="w-32 md:w-44 h-auto object-contain">
                    </div>
                    <div class="bg-[#7195d1]/40 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[200px] md:min-h-[220px] shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider mb-3 md:mb-5 leading-tight" data-mk="Сектор за финансиски прашања" data-sq="Sektori për çështje financiare" data-en="Financial Affairs Sector">Сектор за финансиски прашања</h3>
                        <ul class="text-[11px] md:text-[12px] space-y-1 md:space-y-2 opacity-95 font-medium leading-relaxed">
                            <li data-mk="1. Одделение за буџетска координација и контрола" data-sq="1. Departamenti i koordinimit dhe kontrollit buxhetor" data-en="1. Budget Coordination and Control Department">1. Одделение за буџетска координација и контрола</li>
                            <li data-mk="2. Одделение за сметководство и плаќање" data-sq="2. Departamenti i kontabilitetit dhe pagesave" data-en="2. Accounting and Payments Department">2. Одделение за сметководство и плаќање</li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder">
                        <img src="../icons/Project management, team work and idea generation.png" alt="Icon" class="w-32 md:w-44 h-auto object-contain">
                    </div>
                    <div class="bg-[#7195d1]/20 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[160px] md:min-h-[160px] flex items-center justify-center text-center shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider leading-tight" data-mk="Одделение за управување со човечки ресурси" data-sq="Departamenti për menaxhimin e burimeve njerëzore" data-en="Human Resources Management Department">Одделение за управување со човечки ресурси</h3>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder">
                        <img src="../icons/Money saving with bank building, banknotes and dollar coins.png" alt="Icon" class="w-32 md:w-44 h-auto object-contain">
                    </div>
                    <div class="bg-[#7195d1]/20 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[160px] md:min-h-[160px] flex items-center justify-center text-center shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider leading-tight" data-mk="Отворено одделение Велес" data-sq="Degë e hapur në Veles" data-en="Open Section Veles">Отворено одделение Велес</h3>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder">
                        <img src="../icons/Server hardware for data storage and processing.png" alt="Icon" class="w-32 md:w-44 h-auto object-contain">
                    </div>
                    <div class="bg-[#7195d1]/20 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[160px] md:min-h-[160px] flex items-center justify-center text-center shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider leading-tight" data-mk="Сект  р на затворска полиција" data-sq="Sektori i policisë burgjake" data-en="Prison Police Sector">Сектор на затворска полиција</h3>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Gradient Divider -->
    <div class="w-full h-16 md:h-32 bg-gradient-to-t from-[#101e3d] to-transparent opacity-10 bg-white"></div>

    <!-- FOOTER -->
    <footer class="bg-gray-100 md:bg-transparent pt-4 md:pt-0">
    <!-- MOBILE -->
    <div
        class="md:hidden mx-4 mb-4 bg-[#315b96] rounded-3xl flex flex-col items-center text-center text-white px-6 py-8 gap-3 shadow-xl">
        <img src="./images/logo.png" alt="КПУ Идризово" class="h-16 w-auto brightness-0 invert opacity-90 mb-2">
        <a href="#" class="hover:text-blue-200 transition-colors text-sm" data-mk="Дома" data-sq="Kreu"
            data-en="Home">Дома</a>
        <a href="#" class="hover:text-blue-200 transition-colors text-sm" data-mk="За нас" data-sq="Rreth nesh"
            data-en="About us">За нас</a>
        <a href="#" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Историја"
            data-sq="Historia" data-en="History">Историја</a>
        <a href="#" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Визија"
            data-sq="Vizioni" data-en="Vision">Визија</a>
        <a href="#" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Мисија"
            data-sq="Misioni" data-en="Mission">Мисија</a>
        <a href="#" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Активности"
            data-sq="Aktivitete" data-en="Activities">Активности</a>
        <a href="#" class="hover:text-blue-200 transition-colors text-sm" data-mk="Изработки" data-sq="Punime"
            data-en="Crafts">Изработки</a>
        <a href="#" class="hover:text-blue-200 transition-colors text-sm" data-mk="Контакт" data-sq="Kontakt"
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
                <img src="./images/logo.png" alt="КПУ Идризово"
                    class="w-20 h-20 md:w-24 md:h-24 object-contain brightness-0 invert opacity-90">
            </div>

            <div class="flex-grow flex justify-center gap-8 lg:gap-14 text-white text-sm items-start">
                <div class="flex flex-col space-y-2.5">
                    <a href="#" class="hover:text-blue-200 transition-colors" data-mk="Дома" data-sq="Kreu"
                        data-en="Home">Дома</a>
                </div>
                <div class="flex flex-col space-y-3">
                    <a href="#" class="hover:text-blue-200 transition-colors" data-mk="За нас" data-sq="Rreth nesh"
                        data-en="About us">За нас</a>
                    <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                        data-mk="Историја" data-sq="Historia" data-en="History">Историја</a>
                    <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Визија"
                        data-sq="Vizioni" data-en="Vision">Визија</a>
                    <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Мисија"
                        data-sq="Misioni" data-en="Mission">Мисија</a>
                </div>
                <div class="flex flex-col space-y-3">
                    <a href="#" class="hover:text-blue-200 transition-colors" data-mk="Новости и соопштенија"
                        data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости и соопштенија</a>
                    <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                        data-mk="Активности" data-sq="Aktivitete" data-en="Activities">Активности</a>
                    <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                        data-mk="Соопштенија" data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
                </div>
                <div class="flex flex-col space-y-3">
                    <a href="#" class="hover:text-blue-200 transition-colors" data-mk="Изработки" data-sq="Punime"
                        data-en="Crafts">Изработки</a>
                </div>
                <div class="flex flex-col space-y-3">
                    <a href="#" class="hover:text-blue-200 transition-colors" data-mk="Контакт" data-sq="Kontakt"
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
                    data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</a>
            </div>

        </div>
    </div>

    </footer>
</body>
</html>