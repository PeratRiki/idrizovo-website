

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакт - КПУ Идризово</title>
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
    </style>
</head>

<body>

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
                    <span data-mk="ул.1 колонија Идризово бр.4А" data-sq="rr.1 kolonia Idrizovë nr.4А"
                        data-en="st.1 Idrizovo Colony no.4А">ул.1 колонија Идризово бр.4А</span>
                </a>
                <div class="relative flex items-center justify-center">
                    <div class="flex md:hidden items-center gap-3 py-1 px-4 bg-sky-700/50 rounded-full shadow-inner">
                        <button onclick="setLang('mk')" class="font-bold text-[11px] hover:text-blue-200 tracking-wider">MK</button>
                        <span class="text-white/30 text-[10px]">|</span>
                        <button onclick="setLang('sq')" class="font-bold text-[11px] hover:text-blue-200 tracking-wider">ALB</button>
                        <span class="text-white/30 text-[10px]">|</span>
                        <button onclick="setLang('en')" class="font-bold text-[11px] hover:text-blue-200 tracking-wider">EN</button>
                    </div>
                    <div class="hidden md:block">
                        <button id="lang-btn"
                            class="hover:text-gray-200 transition cursor-pointer flex items-center gap-1.5 px-3 py-1.5 rounded hover:bg-sky-700">
                            <i class="fa-solid fa-globe text-lg text-sm"></i>
                            <span id="lang-label" class="text-xs font-bold tracking-wide">МК</span>
                            <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </button>
                        <div id="lang-dropdown"
                            class="cursor-pointer absolute right-0 top-full mt-2 bg-white rounded-xl shadow-2xl overflow-hidden z-20 w-48 border border-gray-100">
                            <button onclick="setLang('en')"
                                class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                                <img src="https://flagcdn.com/w20/gb.png" srcset="https://flagcdn.com/w40/gb.png 2x" width="20" alt="UK Flag"> English
                            </button>
                            <div class="border-t border-gray-100"></div>
                            <button onclick="setLang('mk')"
                                class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                                <img src="https://flagcdn.com/w20/mk.png" srcset="https://flagcdn.com/w40/mk.png 2x" width="20" alt="MK Flag"> Македонски
                            </button>
                            <div class="border-t border-gray-100"></div>
                            <button onclick="setLang('sq')"
                                class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
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
                <li class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500">
                    <a href="{{ route('homepage.index') }}" data-mk="Почетна" data-sq="Kreu" data-en="Home">Почетна</a>
                </li>
                <li>
                    <a href="{{ route('about.index') }}"
                        class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                        data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a>
                </li>
                <li class="relative flex items-center cursor-pointer">
                    <button id="novosti-btn" onclick="toggleNovosti(event)"
                        class="flex items-center gap-x-1 px-2 py-1 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500 focus:outline-none whitespace-nowrap">
                        <span data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime"
                            data-en="News and announcements">Новости и соопштенија</span>
                        <svg class="w-4 h-4 transition-transform duration-200 flex-shrink-0" id="novosti-icon"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="novosti-dropdown"
                        class="absolute top-full left-0 mt-3 w-48 bg-sky-600 rounded-lg shadow-xl overflow-hidden z-50 border border-blue-900"
                        style="display:none;">
                        <a href="{{ route('activities.index') }}"
                            class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition border-b border-white/30 text-center"
                            data-mk="Активности" data-sq="Aktivitete" data-en="Activities">Активности</a>
                        <a href="{{ route('novosti.index') }}"
                            class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition text-center"
                            data-mk="Соопштенија" data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
                    </div>
                </li>
                <li>
                    <a href="{{ route('handmade.index') }}"
                        class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                        data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a>
                </li>
                <li>
                    <a href="{{ route('contact.index') }}"
                        class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-full hover:before:w-full before:bg-white before:transition-all before:duration-500 font-bold"
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
            <button id="hamburger-btn" class="md:hidden p-2 rounded hover:bg-sky-700 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="absolute top-full left-0 right-0 bg-sky-700 z-50 shadow-lg">
            <ul class="flex flex-col font-medium text-sm">
                <li class="border-b border-sky-600">
                    <a href="{{ route('homepage.index') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="Почетна" data-sq="Kreu" data-en="Home">Почетна</a>
                </li>
                <li class="border-b border-sky-600">
                    <a href="{{ route('about.index') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a>
                </li>
                <li class="border-b border-sky-600">
                    <a href="{{ route('novosti.index') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime"
                        data-en="News and announcements">Новости и соопштенија</a>
                </li>
                <li class="border-b border-sky-600">
                    <a href="{{ route('handmade.index') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a>
                </li>
                <li class="border-b border-sky-600">
                    <a href="{{ route('contact.index') }}" class="block px-6 py-3 hover:bg-sky-600 transition"
                        data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</a>
                </li>
                <li class="px-6 py-3">
                    <button
                        class="bg-sky-950 text-white px-5 py-2 rounded-md font-bold hover:bg-black transition w-full"
                        data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</button>
                </li>
            </ul>
        </div>
    </nav>
</header>

    <!-- CONTACT SECTION -->
    <div id="kontakti"
        class="min-h-screen bg-linear-to-b from-white via-[#2E589E] to-white flex flex-col md:flex-row items-center justify-between p-4 md:p-8 space-y-10 md:space-y-0 md:space-x-10 mx-4 md:m-14">
        <div class="md:w-1/2 space-y-5">
            <h1 class="text-4xl font-extrabold mb-4" data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</h1>
            <p class="text-sm text-white mb-8"
                data-mk="Доколку имате прашања, потреба од дополнителни информации или сакате да закажете официјална посета, нашиот тим е тука за вас. Секогаш сме достапни за да ви помогнеме околу процедурите, програмите за ресоцијализација или административни прашања."
                data-sq="Nëse keni pyetje, nevojë për informacion shtesë ose dëshironi të caktoni një vizitë zyrtare, ekipi ynë është këtu për ju. Jemi gjithmonë të disponueshëm për t'ju ndihmuar me procedurat, programet e risocializimit ose çështjet administrative."
                data-en="If you have questions, need additional information or want to schedule an official visit, our team is here for you. We are always available to help you with procedures, resocialization programs or administrative matters.">
                Доколку имате прашања, потреба од дополнителни информации или сакате да закажете официјална посета,
                нашиот тим е тука за вас. Секогаш сме достапни за да ви помогнеме околу процедурите, програмите за
                ресоцијализација или административни прашања.
            </p>

            <div class="flex flex-col gap-4 mb-8">
                <div class="bg-white rounded-lg p-4 flex items-center gap-3 shadow-md">
                    <i class="fa-solid fa-phone text-[#315b96]"></i>
                    <span class="text-sm font-medium text-gray-800" data-mk="Телефонски број: 02 25 80 312"
                        data-sq="Numri i telefonit: 02 25 80 312" data-en="Phone number: 02 25 80 312">Телефонски број:
                        02 25 80 312</span>
                </div>
                <div class="bg-white rounded-lg p-4 flex items-center gap-3 shadow-md">
                    <i class="fa-regular fa-envelope text-[#315b96]"></i>
                    <span class="text-sm font-medium text-gray-800" data-mk="Е-пошта: kpuidrizovo@kpuidrizovo.gov.mk"
                        data-sq="Email: kpuidrizovo@kpuidrizovo.gov.mk"
                        data-en="Email: kpuidrizovo@kpuidrizovo.gov.mk">Е-пошта: kpuidrizovo@kpuidrizovo.gov.mk</span>
                </div>
                <div class="bg-white rounded-lg p-4 flex items-center gap-3 shadow-md">
                    <i class="fa-solid fa-location-dot text-[#315b96]"></i>
                    <span class="text-sm font-medium text-gray-800" data-mk="Ул.1 Колонија Идризово бр. 4А"
                        data-sq="Rr.1 Kolonia Idrizovë nr. 4А" data-en="St.1 Idrizovo Colony no. 4А">Ул.1 Колонија
                        Идризово бр. 4А</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-10 shadow-md text-center">
                <h2 class="font-semibold text-gray-900 text-base mb-6" data-mk="Работно време" data-sq="Orari i punës"
                    data-en="Working hours">Работно време</h2>
                <div class="space-y-3 text-sm text-gray-800">
                    <p data-mk="Понеделник - Петок: 08:00 - 16:00" data-sq="E hënë - E premte: 08:00 - 16:00"
                        data-en="Monday - Friday: 08:00 - 16:00">Понеделник - Петок: 08:00 - 16:00</p>
                    <p data-mk="Сабота: 08:00 - 13:00" data-sq="E shtunë: 08:00 - 13:00"
                        data-en="Saturday: 08:00 - 13:00">Сабота: 08:00 - 13:00</p>
                    <p data-mk="Недела: Затворено" data-sq="E diel: Mbyllur" data-en="Sunday: Closed">Недела: Затворено
                    </p>
                    <p data-mk="Државни празници: Затворено" data-sq="Festat shtetërore: Mbyllur"
                        data-en="Public holidays: Closed">Државни празници: Затворено</p>
                </div>
            </div>
        </div>

        <!-- CONTACT FORM -->
        <div class="bg-white rounded-2xl p-8 md:p-10 shadow-2xl w-full md:w-1/2">
            <h2 class="text-xl font-bold text-center text-gray-900 mb-8" data-mk="Испрати порака" data-sq="Dërgo mesazh"
                data-en="Send a message">Испрати порака</h2>
            <div class="space-y-4">
                <input type="text" id="input-name" placeholder="Име и презиме" data-placeholder-mk="Име и презиме"
                    data-placeholder-sq="Emri dhe mbiemri" data-placeholder-en="Full name"
                    class="w-full border border-gray-400 rounded-lg px-4 py-2 text-sm placeholder-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="text" id="input-prison" placeholder="Затворенички број:"
                    data-placeholder-mk="Затворенички број:" data-placeholder-sq="Numri i të burgosurit:"
                    data-placeholder-en="Prisoner number:"
                    class="w-full border border-gray-400 rounded-lg px-4 py-2 text-sm placeholder-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="email" id="input-email" placeholder="Е-пошта:" data-placeholder-mk="Е-пошта:"
                    data-placeholder-sq="Email:" data-placeholder-en="Email:"
                    class="w-full border border-gray-400 rounded-lg px-4 py-2 text-sm placeholder-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <textarea id="input-message" rows="10" placeholder="Остави порака.."
                    data-placeholder-mk="Остави порака.." data-placeholder-sq="Lër një mesazh.."
                    data-placeholder-en="Leave a message.."
                    class="w-full border border-gray-400 rounded-xl px-4 py-4 text-sm placeholder-gray-900 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>
                <div class="flex justify-center pt-4">
                    <button type="submit"
                        class="bg-[#0E1B2F] text-white font-semibold rounded-lg px-12 py-3 hover:bg-gray-800 transition-colors duration-200"
                        data-mk="Испрати" data-sq="Dërgo" data-en="Send">Испрати</button>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOK A VISIT -->
    <section class="py-16 px-6 font-sans flex justify-center bg-white">
        <div class="max-w-6xl w-full">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#0a1930] mb-12" data-mk="Закажи посета"
                data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">

                <div class="bg-[#6A92D4] text-white rounded-3xl p-8 flex flex-col items-center text-center shadow-md">
                    <h3 class="text-xl font-bold mb-6" data-mk="Преку телефон" data-sq="Nëpërmjet telefonit"
                        data-en="By phone">Преку телефон</h3>
                    <p class="text-sm font-medium mb-4" data-mk="Понеделник-Четврток" data-sq="E hënë-E enjte"
                        data-en="Monday-Thursday">Понеделник-Четврток</p>
                    <div class="flex gap-6 justify-center text-xs mb-6 w-full">
                        <div>
                            <span class="block mb-1 font-medium" data-mk="Прва смена" data-sq="Turni i parë"
                                data-en="First shift">Прва смена</span>
                            <span class="flex items-center justify-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                08:30-10:30
                            </span>
                        </div>
                        <div>
                            <span class="block mb-1 font-medium" data-mk="Втора смена" data-sq="Turni i dytë"
                                data-en="Second shift">Втора смена</span>
                            <span class="flex items-center justify-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                14:00-18:00
                            </span>
                        </div>
                    </div>
                    <p class="text-sm font-medium mb-1" data-mk="Петок" data-sq="E premte" data-en="Friday">Петок</p>
                    <span class="flex items-center justify-center gap-1 text-xs mb-8">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        8:30-18:00
                    </span>
                    <div class="mt-auto">
                        <button
                            class="bg-[#0E1B2F] text-white text-sm font-bold py-2.5 px-8 rounded-lg hover:bg-gray-800 transition">02
                            25 80365</button>
                    </div>
                </div>

                <div class="bg-[#6A92D4] text-white rounded-3xl p-8 flex flex-col items-center text-center shadow-md">
                    <h3 class="text-xl font-bold mb-6" data-mk="Закажи Online" data-sq="Cakto Online"
                        data-en="Book Online">Закажи Online</h3>
                    <p class="text-sm leading-relaxed mb-8 font-medium max-w-[16rem]"
                        data-mk="Пополнете го онлајн формуларот за закажување посета и ќе ве контактираме за потврда."
                        data-sq="Plotësoni formularin online për të caktuar vizitën dhe do t'ju kontaktojmë për konfirmim."
                        data-en="Fill in the online form to schedule a visit and we will contact you for confirmation.">
                        Пополнете го онлајн формуларот за закажување посета и ќе ве контактираме за потврда.
                    </p>
                    <div class="mt-auto">
                        <button
                            class="bg-[#0b132b] text-white text-sm font-bold py-2.5 px-6 rounded-lg hover:bg-gray-800 transition"
                            data-mk="Кликни за календар" data-sq="Kliko për kalendar"
                            data-en="Click for calendar">Кликни за календар</button>
                    </div>
                </div>

                <div class="bg-[#6A92D4] text-white rounded-3xl p-8 flex flex-col items-center text-center shadow-md">
                    <h3 class="text-xl font-bold mb-6" data-mk="Преку портирница" data-sq="Nëpërmjet portierës"
                        data-en="Via reception">Преку<br>портирница</h3>
                    <p class="text-sm font-medium mb-2" data-mk="Понеделник-Четврток" data-sq="E hënë-E enjte"
                        data-en="Monday-Thursday">Понеделник-Четврток</p>
                    <p class="text-xs mb-6" data-mk="13:00-14:00 часот" data-sq="13:00-14:00 orë" data-en="13:00-14:00">
                        13:00-14:00 часот</p>
                    <p class="text-sm font-medium mb-3" data-mk="Сабота и недела" data-sq="E shtunë dhe e diel"
                        data-en="Saturday and Sunday">Сабота и недела</p>
                    <div class="space-y-1.5 text-xs">
                        <p data-mk="1 Група: 08:30-09:30" data-sq="1 Grup: 08:30-09:30" data-en="1 Group: 08:30-09:30">1
                            Група: 08:30-09:30</p>
                        <p data-mk="2 Група: 10:30-11:30" data-sq="2 Grup: 10:30-11:30" data-en="2 Group: 10:30-11:30">2
                            Група: 10:30-11:30</p>
                        <p data-mk="3 Група: 12:30-13:30" data-sq="3 Grup: 12:30-13:30" data-en="3 Group: 12:30-13:30">3
                            Група: 12:30-13:30</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- MAP -->
    <section class="py-16 px-6 font-sans bg-white flex justify-center">
        <div class="max-w-5xl w-full">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#0a1930] mb-10" data-mk="Мапа" data-sq="Harta"
                data-en="Map">Мапа</h2>
            <div class="w-full bg-gray-200 shadow-md rounded-2xl overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2966.971798067837!2d21.564919600000003!3d41.957940799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13543f300cf6f5ab%3A0xc775d2423b8cd12c!2sPP%20Skopje%20-%20Idrizovo%20Prison!5e0!3m2!1sen!2smk!4v1778111983735!5m2!1sen!2smk"
                    width="100%" height="600" style="border:0; display:block;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- Scroll to top -->
    <div class="fixed bottom-10 right-10 z-50">
        <button onclick="window.scrollTo({top:0,behavior:'smooth'})"
            class="bg-[#2b5a9e] text-white p-4 rounded-full shadow-2xl hover:bg-[#1e3a8a] transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

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
                    class="fa-solid fa-location-dot text-blue-200"></i>
                <span data-mk="ул.1 колонија Идризово бр.4A" data-sq="rr.1 kolonia Idrizovë nr.4A"
                    data-en="st.1 Idrizovo Colony no.4A">ул.1 колонија Идризово бр.4A</span>
            </div>
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
                        <a href="./Homepage.html" class="hover:text-blue-200 transition-colors" data-mk="Дома"
                            data-sq="Kreu" data-en="Home">Дома</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="./About.html" class="hover:text-blue-200 transition-colors" data-mk="За нас"
                            data-sq="Rreth nesh" data-en="About us">За нас</a>
                        <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                            data-mk="Историја" data-sq="Historia" data-en="History">Историја</a>
                        <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                            data-mk="Визија" data-sq="Vizioni" data-en="Vision">Визија</a>
                        <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                            data-mk="Мисија" data-sq="Misioni" data-en="Mission">Мисија</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="#" class="hover:text-blue-200 transition-colors" data-mk="Новости и соопштенија"
                            data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости и соопштенија</a>
                        <a href="./aktivnosti.html"
                            class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Активности"
                            data-sq="Aktivitete" data-en="Activities">Активности</a>
                        <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs"
                            data-mk="Соопштенија" data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="#" class="hover:text-blue-200 transition-colors" data-mk="Изработки" data-sq="Punime"
                            data-en="Crafts">Изработки</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="./kontakt.html" class="hover:text-blue-200 transition-colors" data-mk="Контакт"
                            data-sq="Kontakt" data-en="Contact">Контакт</a>
                        <div class="flex items-center space-x-2 text-blue-100/80 text-xs"><i
                                class="fa-solid fa-phone"></i><span>02 25 80 312</span></div>
                        <div class="flex items-start space-x-2 text-blue-100/80 text-xs"><i
                                class="fa-regular fa-envelope mt-0.5"></i><span
                                class="break-all">kpuidrizovo@kpuidrizovo.gov.mk</span></div>
                        <div class="flex items-center space-x-2 text-blue-100/80 text-xs"><i
                                class="fa-solid fa-location-dot"></i>
                            <span data-mk="ул.1 колонија Идризово бр.4A" data-sq="rr.1 kolonia Idrizovë nr.4A"
                                data-en="st.1 Idrizovo Colony no.4A">ул.1 колонија Идризово бр.4A</span>
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

