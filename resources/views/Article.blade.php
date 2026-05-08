<!DOCTYPE html>
<html lang="mk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вест</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-[#e6effa] via-[#7ea4db] to-[#4f78b8] text-white font-sans min-h-screen">
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
    
          <div class="topbar-right w-full md:w-1/2 flex justify-center md:justify-end items-center gap-4 md:gap-6 md:pl-10">
            <a href="https://maps.google.com/?q=КПУ+Идризово" target="_blank" rel="noopener noreferrer"
              class="hidden md:flex items-center gap-2 hover:text-gray-200 transition cursor-pointer">
              <i class="fa-solid fa-location-dot text-blue-200"></i>
              <span>ул.1 колонија Идризово бр.4А</span>
            </a>
    
            <div class="relative flex items-center justify-center">
    
              <div class="flex md:hidden items-center gap-3 py-1 px-4 bg-sky-700/50 rounded-full shadow-inner">
                <button onclick="setLang('mk')" class="font-bold text-[11px] hover:text-blue-200 tracking-wider">MK</button>
                <span class="text-white/30 text-[10px]">|</span>
                <button onclick="setLang('sq')"
                  class="font-bold text-[11px] hover:text-blue-200 tracking-wider">ALB</button>
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
    
                <!-- FIX: removed 'md:hidden', added 'hidden' so JS can toggle it -->
                <div id="lang-dropdown"
                  class="cursor-pointer hidden absolute right-0 top-full mt-2 bg-white rounded-xl shadow-2xl overflow-hidden z-20 w-48 border border-gray-100">
    
                  <button onclick="setLang('en')"
                    class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                    <img src="https://flagcdn.com/w20/gb.png" srcset="https://flagcdn.com/w40/gb.png 2x" width="20"
                      alt="UK Flag">
                    English
                  </button>
    
                  <div class="border-t border-gray-100"></div>
    
                  <button onclick="setLang('mk')"
                    class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                    <img src="https://flagcdn.com/w20/mk.png" srcset="https://flagcdn.com/w40/mk.png 2x" width="20"
                      alt="MK Flag">
                    Македонски
                  </button>
    
                  <div class="border-t border-gray-100"></div>
    
                  <button onclick="setLang('sq')"
                    class="cursor-pointer w-full text-left px-5 py-3 text-gray-800 text-sm font-medium hover:bg-sky-50 flex items-center gap-3 transition">
                    <img src="https://flagcdn.com/w20/al.png" srcset="https://flagcdn.com/w40/al.png 2x" width="20"
                      alt="AL Flag">
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
            <img src="./images/logo.png" />
          </div>
          <ul class="hidden md:flex items-center space-x-6 font-medium">
            <li
              class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-full hover:before:w-full before:bg-white before:transition-all before:duration-500 font-bold">
              <a href="#" data-mk="Почетна" data-sq="Kreu" data-en="Home">Почетна</a>
            </li>
            <li>
              <a href="./aboutUs.html"
                class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a>
            </li>
            <li class="relative flex items-center cursor-pointer">
              <button id="novosti-btn" onclick="toggleNovosti(event)"
                class="flex items-center gap-x-1 px-2 py-1 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500 focus:outline-none whitespace-nowrap">
                <span data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости
                  и соопштенија</span>
                <svg class="w-4 h-4 transition-transform duration-200 flex-shrink-0" id="novosti-icon" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                  </path>
                </svg>
              </button>
              <!-- FIX: changed style="display:none" to class="hidden" so JS can toggle it -->
              <div id="novosti-dropdown"
                class="hidden absolute top-full left-0 mt-3 w-48 bg-sky-600 rounded-lg shadow-xl overflow-hidden z-50 border border-blue-900">
                <a href="./aktivnosti.html"
                  class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition border-b border-white/30 text-center"
                  data-mk="Активности" data-sq="Aktivitete" data-en="Activities">Активности</a>
                <a href="#" class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition text-center"
                  data-mk="Соопштенија" data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
              </div>
            </li>
            <li>
              <a href="#"
                class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a>
            </li>
            <li>
              <a href="./kontakt.html"
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
              </svg>
            </button>
          </div>
        </div>
    
        <!-- Mobile menu starts hidden, JS toggles 'hidden' class -->
        <div id="mobile-menu" class="hidden absolute top-full left-0 right-0 bg-sky-700 z-50 shadow-lg">
          <ul class="flex flex-col font-medium text-sm">
            <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                data-mk="Почетна" data-sq="Kreu" data-en="Home">Почетна</a></li>
            <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a></li>
            <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости и
                соопштенија</a></li>
            <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a></li>
            <li class="border-b border-sky-600"><a href="#" class="block px-6 py-3 hover:bg-sky-600 transition"
                data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</a></li>
            <li class="px-6 py-3"><button
                class="bg-sky-950 text-white px-5 py-2 rounded-md font-bold hover:bg-black transition w-full"
                data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</button>
            </li>
          </ul>
        </div>
      </nav>
    </header>
<!-- HERO IMAGE (ИСТА КАКО INDEX) -->
<section class="w-full h-[300px] bg-white overflow-hidden">
  <img src="./images/news-hero.png" alt="Новости" class="w-full h-full object-cover object-center">
</section>

<!-- ARTICLE -->
<main class="w-[85%] max-w-[900px] mx-auto py-20">

  <article class="bg-white/30 border border-white/40 backdrop-blur-md p-10 rounded-xl shadow-lg">

    <h1 class="text-3xl font-extrabold underline mb-6">
      Интерен оглас за пополнување на работно место
    </h1>

    <p class="text-sm mb-4 opacity-80">
      Објавено на: 15.03.2026
    </p>

    <p class="text-lg leading-8 mb-6">
      Врз основа на член 30 став 1 алинеја 2 и став 3 од Законот за административни службеници,
      се објавува интерен оглас за пополнување на работно место со унапредување на административен службеник.
    </p>

    <p class="text-lg leading-8 mb-6">
      Кандидатите треба да ги исполнуваат следните услови:
    </p>

    <ul class="list-disc pl-6 mb-6 text-lg leading-8">
      <li>Да се вработени во институцијата</li>
      <li>Да имаат најмалку 2 години работно искуство</li>
      <li>Да имаат соодветно образование</li>
    </ul>

    <p class="text-lg leading-8 mb-10">
      Рокот за пријавување изнесува 5 работни дена од денот на објавување на огласот.
      Пријавите се доставуваат до архивата на институцијата.
    </p>

    <a href="novosti.html" class="inline-block bg-[#071a32] px-5 py-2 rounded font-bold hover:bg-[#17457d]">
      ← Назад кон новости
    </a>

  </article>

</main>

</body>
</html>
      ← Назад кон новости
    </a>

  </article>

</main>
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
    <a href="#" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Визија" data-sq="Vizioni"
      data-en="Vision">Визија</a>
    <a href="#" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Мисија" data-sq="Misioni"
      data-en="Mission">Мисија</a>
    <a href="#" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Активности"
      data-sq="Aktivitete" data-en="Activities">Активности</a>
    <a href="#" class="hover:text-blue-200 transition-colors text-sm" data-mk="Изработки" data-sq="Punime"
      data-en="Crafts">Изработки</a>
    <a href="#" class="hover:text-blue-200 transition-colors text-sm" data-mk="Контакт" data-sq="Kontakt"
      data-en="Contact">Контакт</a>
    <div class="flex items-center gap-3 text-blue-100 text-sm"><i class="fa-solid fa-phone text-blue-200"></i><span>02
        25 80 312</span></div>
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
          <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Историја"
            data-sq="Historia" data-en="History">Историја</a>
          <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Визија"
            data-sq="Vizioni" data-en="Vision">Визија</a>
          <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Мисија"
            data-sq="Misioni" data-en="Mission">Мисија</a>
        </div>
        <div class="flex flex-col space-y-3">
          <a href="#" class="hover:text-blue-200 transition-colors" data-mk="Новости и соопштенија"
            data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости и соопштенија</a>
          <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Активности"
            data-sq="Aktivitete" data-en="Activities">Активности</a>
          <a href="#" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Соопштенија"
            data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
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
            <i class="fa-regular fa-envelope mt-0.5"></i><span class="break-all">kpuidrizovo@kpuidrizovo.gov.mk</span>
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
</body>
</html>