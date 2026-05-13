
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Активности</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
              <span>ул.1 колонија Идризово бр.4А</span>
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
              <a href="{{ url('/AboutUs') }}" class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
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
                <a href="{{ url('/Activities') }}" class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition border-b border-white/30 text-center"
                  data-mk="Активности" data-sq="Aktivitete" data-en="Activities">Активности</a>
                <a href="{{ url('/Novosti') }}" class="block px-4 py-3 text-white text-sm font-medium hover:bg-[#0f172a] transition text-center"
                  data-mk="Соопштенија" data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
              </div>
            </li>
            <li>
              <a href="{{ url('/Handmade') }}" class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
                data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a>
            </li>
            <li>
              <a href="{{ url('/Contact') }}" class="inline-block px-2 relative before:absolute before:-bottom-1 before:left-0 before:h-0.5 before:w-0 hover:before:w-full before:bg-white before:transition-all before:duration-500"
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
          <button class="bg-sky-950 text-white px-4 md:px-6 py-2 rounded-md font-bold hover:bg-black transition text-sm md:text-base hidden md:block"
            data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</button>
          <button id="hamburger-btn" class="md:hidden p-2 text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
          <div class="scroll-top-btn fixed bottom-10 right-10 z-50">
            <button class="bg-[#2b5a9e] text-white p-4 rounded-full shadow-2xl hover:bg-[#1e3a8a]">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
              </svg>
            </button>
          </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden absolute top-full left-0 right-0 bg-sky-700 z-50 shadow-lg">
          <ul class="flex flex-col font-medium text-sm">
            <li class="border-b border-sky-600"><a href="{{ url('/') }}" class="block px-6 py-3 hover:bg-sky-600 transition" data-mk="Почетна" data-sq="Kreu" data-en="Home">Почетна</a></li>
            <li class="border-b border-sky-600"><a href="{{ url('/AboutUs') }}" class="block px-6 py-3 hover:bg-sky-600 transition" data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a></li>
            <li class="border-b border-sky-600"><a href="{{ url('/Novosti') }}" class="block px-6 py-3 hover:bg-sky-600 transition" data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости и соопштенија</a></li>
            <li class="border-b border-sky-600"><a href="{{ url('/Handmade') }}" class="block px-6 py-3 hover:bg-sky-600 transition" data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a></li>
            <li class="border-b border-sky-600"><a href="{{ url('/Contact') }}" class="block px-6 py-3 hover:bg-sky-600 transition" data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</a></li>
            <li class="px-6 py-3"><button class="bg-sky-950 text-white px-5 py-2 rounded-md font-bold hover:bg-black transition w-full"
                data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</button></li>
          </ul>
        </div>
      </nav>
    </header>

  <!-- HERO -->
  <section class="relative h-[500px] md:h-[700px] w-full overflow-hidden font-sans">
    <img src="{{ asset('images/sport2.jpg') }}" alt="Активности" class="absolute inset-0 h-full w-full object-cover" />
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative z-10 mx-auto flex h-full max-w-7xl flex-col justify-center px-6 md:px-16">
      <div class="mb-4 inline-block w-fit bg-blue-600 px-3 py-1 text-[10px] md:text-xs font-bold uppercase tracking-wider text-white">
        Најнова активност
      </div>
      <h1 class="mb-4 text-5xl font-black text-white drop-shadow-md md:text-8xl">Кошарка</h1>
      <p class="mb-8 max-w-md text-base md:text-lg leading-relaxed text-white drop-shadow-sm">
        Кошарка за подобрување на физичкото здравје, тимската работа и позитивниот ангажман.
      </p>
      <button class="w-fit rounded-sm bg-blue-800 px-8 py-3 text-sm font-semibold text-white transition-colors hover:bg-blue-900">
        Прочитај повеќе
      </button>
    </div>
    <div class="absolute bottom-5 right-5 md:bottom-10 md:right-10 z-20">
      <button class="flex h-10 w-10 md:h-12 md:w-12 items-center justify-center rounded-full bg-[#1e3a8a] text-white shadow-lg transition-transform hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-5 w-5 md:h-6 md:w-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
        </svg>
      </button>
    </div>
  </section>

  <!-- НАЈЧИТАНИ -->
  <section class="mx-auto max-w-7xl px-6 py-12">
    <h2 class="mb-8 text-2xl md:text-3xl font-bold text-[#1e293b]">Најчитани активности</h2>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-4">

      <div class="group relative overflow-hidden rounded-3xl bg-slate-200 md:col-span-2 md:row-span-2 h-[400px] md:h-[600px]">
        <img src="{{ asset('images/sport.jpg') }}" alt="Шах" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 md:p-8 flex flex-col justify-end">
          <h3 class="mb-2 text-xl md:text-2xl font-bold text-white">Натпревар во шах</h3>
          <p class="mb-4 text-gray-200 text-sm max-w-sm">Шаховски натпревар што поттикнува фокус, стратешко размислување и позитивна интеракција меѓу учесниците.</p>
          <a href="#" class="text-sm font-semibold text-white underline decoration-blue-400 underline-offset-4">Прочитај повеќе</a>
        </div>
      </div>

      <div class="group relative h-[250px] md:h-[290px] overflow-hidden rounded-3xl bg-slate-200">
        <img src="{{ asset('images/заваруванје.jpg') }}" alt="Заварување" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-black/50 p-6 flex flex-col justify-end">
          <h3 class="text-lg font-bold text-white">Заварување</h3>
          <p class="text-xs text-gray-300 mb-3">Активности за заварување каде што учесниците учат безбедно...</p>
          <a href="#" class="text-xs font-semibold text-white underline decoration-blue-400">Прочитај повеќе</a>
        </div>
      </div>

      <div class="group relative h-[250px] md:h-[290px] overflow-hidden rounded-3xl bg-slate-200">
        <img src="{{ asset('images/резба.jpg') }}" alt="Резба" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-black/50 p-6 flex flex-col justify-end">
          <h3 class="text-lg font-bold text-white">Резба</h3>
          <p class="text-xs text-gray-300 mb-3">Рачно изработени резби создадени со грижа...</p>
          <a href="#" class="text-xs font-semibold text-white underline decoration-blue-400">Прочитај повеќе</a>
        </div>
      </div>

      <div class="group relative h-[250px] md:h-[290px] overflow-hidden rounded-3xl bg-slate-200">
        <img src="{{ asset('images/столарија.jpg') }}" alt="Столарија" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-black/50 p-6 flex flex-col justify-end">
          <h3 class="text-lg font-bold text-white">Столарија</h3>
          <p class="text-xs text-gray-300 mb-3">Занает на работа со дрво за создавање...</p>
          <a href="#" class="text-xs font-semibold text-white underline decoration-blue-400">Прочитај повеќе</a>
        </div>
      </div>

      <div class="group relative h-[250px] md:h-[290px] overflow-hidden rounded-3xl bg-slate-200">
        <img src="{{ asset('images/електрика.jpg') }}" alt="Електрика" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-black/50 p-6 flex flex-col justify-end">
          <h3 class="text-lg font-bold text-white">Електрика</h3>
          <p class="text-xs text-gray-300 mb-3">Учење и извршување електрични задачи...</p>
          <a href="#" class="text-xs font-semibold text-white underline decoration-blue-400">Прочитај повеќе</a>
        </div>
      </div>

    </div>
  </section>

  <!-- ОСТАНАТИ -->
  <section class="mx-auto max-w-7xl px-6 py-12">
    <h2 class="mb-8 text-2xl md:text-3xl font-bold text-[#1e293b]">Останати активности</h2>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-4">

      <div class="grid grid-cols-1 gap-6 md:col-span-2 sm:grid-cols-2">
        <div class="group relative h-[250px] overflow-hidden rounded-3xl bg-gray-100">
          <img src="{{ asset('images/шиење.jpg') }}" class="h-full w-full object-cover" />
          <div class="absolute inset-0 bg-black/40 p-6 flex flex-col justify-end">
            <h3 class="text-lg font-bold text-white">Везење</h3>
            <p class="text-[10px] text-gray-200 mb-2">Везот ги подобрува креативноста...</p>
            <a href="#" class="text-xs font-semibold text-white underline">Прочитај повеќе</a>
          </div>
        </div>

        <div class="group relative h-[250px] overflow-hidden rounded-3xl bg-gray-100">
          <img src="{{ asset('images/цртање.jpg') }}" class="h-full w-full object-cover" />
          <div class="absolute inset-0 bg-black/40 p-6 flex flex-col justify-end">
            <h3 class="text-lg font-bold text-white">Цртање</h3>
            <p class="text-[10px] text-gray-200 mb-2">Активности за цртање...</p>
            <a href="#" class="text-xs font-semibold text-white underline">Прочитај повеќе</a>
          </div>
        </div>

        <div class="group relative h-[250px] overflow-hidden rounded-3xl bg-gray-100">
          <img src="{{ asset('images/шиење.jpg') }}" class="h-full w-full object-cover" />
          <div class="absolute inset-0 bg-black/40 p-6 flex flex-col justify-end">
            <h3 class="text-lg font-bold text-white">Шиење</h3>
            <p class="text-[10px] text-gray-200 mb-2">Активности за шиење...</p>
            <a href="#" class="text-xs font-semibold text-white underline">Прочитај повеќе</a>
          </div>
        </div>

        <div class="group relative h-[250px] overflow-hidden rounded-3xl bg-gray-100">
          <img src="{{ asset('images/сликанје.png') }}" class="h-full w-full object-cover" />
          <div class="absolute inset-0 bg-black/40 p-6 flex flex-col justify-end">
            <h3 class="text-lg font-bold text-white">Сликање</h3>
            <p class="text-[10px] text-gray-200 mb-2">Создавање уметнички дела...</p>
            <a href="#" class="text-xs font-semibold text-white underline">Прочитај повеќе</a>
          </div>
        </div>
      </div>

      <div class="group relative overflow-hidden rounded-3xl bg-gray-200 md:col-span-2 h-[400px] md:h-auto md:min-h-[524px]">
        <img src="{{ asset('images/sport2.jpg') }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent p-8 md:p-10 flex flex-col justify-end">
          <h3 class="mb-3 text-2xl md:text-3xl font-bold text-white">Спорт</h3>
          <p class="mb-6 max-w-md text-sm text-gray-200">Физички вежби за градење сила, кондиција и целокупна благосостојба.</p>
          <a href="#" class="text-sm font-semibold text-white underline decoration-blue-400 underline-offset-8">Прочитај повеќе</a>
        </div>
      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-gray-100 md:bg-transparent pt-4 md:pt-0">
    <!-- MOBILE -->
    <div class="md:hidden mx-4 mb-4 bg-[#315b96] rounded-3xl flex flex-col items-center text-center text-white px-6 py-8 gap-3 shadow-xl">
      <img src="{{ asset('images/logo.png') }}" alt="КПУ Идризово" class="h-16 w-auto brightness-0 invert opacity-90 mb-2">
      <a href="{{ url('/') }}" class="hover:text-blue-200 transition-colors text-sm" data-mk="Дома" data-sq="Kreu" data-en="Home">Дома</a>
      <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-sm" data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a>
      <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Историја" data-sq="Historia" data-en="History">Историја</a>
      <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Визија" data-sq="Vizioni" data-en="Vision">Визија</a>
      <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Мисија" data-sq="Misioni" data-en="Mission">Мисија</a>
      <a href="{{ url('/Activities') }}" class="hover:text-blue-200 transition-colors text-sm text-blue-100" data-mk="Активности" data-sq="Aktivitete" data-en="Activities">Активности</a>
      <a href="{{ url('/Handmade') }}" class="hover:text-blue-200 transition-colors text-sm" data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a>
      <a href="{{ url('/Contact') }}" class="hover:text-blue-200 transition-colors text-sm" data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</a>
      <div class="flex items-center gap-3 text-blue-100 text-sm"><i class="fa-solid fa-phone text-blue-200"></i><span>02 25 80 312</span></div>
      <div class="flex items-center gap-3 text-blue-100 text-sm"><i class="fa-regular fa-envelope text-blue-200"></i><span>kpuidrizovo@kpuidrizovo.gov.mk</span></div>
      <div class="flex items-center gap-2 text-blue-100 text-sm"><i class="fa-solid fa-location-dot text-blue-200"></i><span>ул.1 колонија Идризово бр.4A</span></div>
      <a href="#" class="mt-4 bg-[#0f172a] hover:bg-slate-800 text-white font-bold py-3 px-10 rounded-lg transition shadow-md" data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</a>
    </div>

    <!-- DESKTOP -->
    <div class="hidden md:block bg-[#315b96] border-t border-blue-800/30 py-8">
      <div class="max-w-7xl mx-auto px-6 flex justify-between items-center gap-6 lg:gap-10">
        <div class="flex-shrink-0">
          <img src="{{ asset('images/logo.png') }}" alt="КПУ Идризово" class="w-20 h-20 md:w-24 md:h-24 object-contain brightness-0 invert opacity-90">
        </div>
        <div class="flex-grow flex justify-center gap-8 lg:gap-14 text-white text-sm items-start">
          <div class="flex flex-col space-y-2.5">
            <a href="{{ url('/') }}" class="hover:text-blue-200 transition-colors" data-mk="Дома" data-sq="Kreu" data-en="Home">Дома</a>
          </div>
          <div class="flex flex-col space-y-3">
            <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors" data-mk="За нас" data-sq="Rreth nesh" data-en="About us">За нас</a>
            <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Историја" data-sq="Historia" data-en="History">Историја</a>
            <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Визија" data-sq="Vizioni" data-en="Vision">Визија</a>
            <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Мисија" data-sq="Misioni" data-en="Mission">Мисија</a>
          </div>
          <div class="flex flex-col space-y-3">
            <a href="{{ url('/Novosti') }}" class="hover:text-blue-200 transition-colors" data-mk="Новости и соопштенија" data-sq="Lajme dhe njoftime" data-en="News and announcements">Новости и соопштенија</a>
            <a href="{{ url('/Activities') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Активности" data-sq="Aktivitete" data-en="Activities">Активности</a>
            <a href="{{ url('/Novosti') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs" data-mk="Соопштенија" data-sq="Njoftime" data-en="Announcements">Соопштенија</a>
          </div>
          <div class="flex flex-col space-y-3">
            <a href="{{ url('/Handmade') }}" class="hover:text-blue-200 transition-colors" data-mk="Изработки" data-sq="Punime" data-en="Crafts">Изработки</a>
          </div>
          <div class="flex flex-col space-y-3">
            <a href="{{ url('/Contact') }}" class="hover:text-blue-200 transition-colors" data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</a>
            <div class="flex items-center space-x-2 text-blue-100/80 text-xs"><i class="fa-solid fa-phone"></i><span>02 25 80 312</span></div>
            <div class="flex items-start space-x-2 text-blue-100/80 text-xs"><i class="fa-regular fa-envelope mt-0.5"></i><span class="break-all">kpuidrizovo@kpuidrizovo.gov.mk</span></div>
            <div class="flex items-center space-x-2 text-blue-100/80 text-xs"><i class="fa-solid fa-location-dot"></i><span>ул.1 колонија Идризово бр.4A</span></div>
          </div>
        </div>
        <div class="flex-shrink-0">
          <a href="#" class="inline-block bg-[#0f172a] hover:bg-slate-800 text-white text-sm py-2.5 px-6 rounded transition shadow-md whitespace-nowrap text-center"
            data-mk="Закажи посета" data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</a>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
