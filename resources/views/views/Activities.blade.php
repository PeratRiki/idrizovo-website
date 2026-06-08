@extends('layouts.app')
@section('title', 'Активности')
@section('content')
</head>
<body>
  <!-- HERO -->
  <section class="relative h-[500px] md:h-[700px] w-full overflow-hidden font-sans">
   <img src="{{ asset('images/kosarka.png') }}" alt="Активности" class="absolute inset-0 h-full w-full object-cover" />
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative z-10 mx-auto flex h-full max-w-7xl flex-col justify-center px-6 md:px-16">
      <div
        class="mb-4 inline-block w-fit bg-blue-600 px-3 py-1 text-[10px] md:text-xs font-bold uppercase tracking-wider text-white"
        data-mk="Најнова активност"
        data-sq="Aktiviteti më i ri"
        data-en="Latest Activity">
        Најнова активност
      </div>
      <h1
        class="mb-4 text-5xl font-black text-white drop-shadow-md md:text-8xl"
        data-mk="Кошарка"
        data-sq="Basketboll"
        data-en="Basketball">
        Кошарка
      </h1>
      <p
        class="mb-8 max-w-md text-base md:text-lg leading-relaxed text-white drop-shadow-sm"
        data-mk="Кошарка за подобрување на физичкото здравје, тимската работа и позитивниот ангажман."
        data-sq="Basketbolli për përmirësimin e shëndetit fizik, punës në ekip dhe angazhimit pozitiv."
        data-en="Basketball for improving physical health, teamwork and positive engagement.">
        Кошарка за подобрување на физичкото здравје, тимската работа и позитивниот ангажман.
      </p>
      <button
        class="w-fit rounded-sm bg-blue-800 px-8 py-3 text-sm font-semibold text-white transition-colors hover:bg-blue-900"
        data-mk="Прочитај повеќе"
        data-sq="Lexo më shumë"
        data-en="Read More">
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
    <h2
      class="mb-8 text-2xl md:text-3xl font-bold text-[#1e293b]"
      data-mk="Најчитани активности"
      data-sq="Aktivitetet më të lexuara"
      data-en="Most Read Activities">
      Најчитани активности
    </h2>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-4">

      <!-- Шах -->
      <div class="group relative overflow-hidden rounded-3xl bg-slate-200 md:col-span-2 md:row-span-2 h-[400px] md:h-[600px]">
        <img src="{{ asset('images/20260303-dali-lugjeto-shto-igraat-shah-se-popametni-od-drugite-m.jpg') }}" alt="Шах" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 md:p-8 flex flex-col justify-end">
          <h3
            class="mb-2 text-xl md:text-2xl font-bold text-white"
            data-mk="Натпревар во шах"
            data-sq="Garë shahu"
            data-en="Chess Tournament">
            Натпревар во шах
          </h3>
          <p
            class="mb-4 text-gray-200 text-sm max-w-sm"
            data-mk="Шаховски натпревар што поттикнува фокус, стратешко размислување и позитивна интеракција меѓу учесниците."
            data-sq="Garë shahu që nxit fokusim, të menduarit strategjik dhe ndërveprim pozitiv mes pjesëmarrësve."
            data-en="A chess tournament that encourages focus, strategic thinking and positive interaction among participants.">
            Шаховски натпревар што поттикнува фокус, стратешко размислување и позитивна интеракција меѓу учесниците.
          </p>
          <a
            href="#"
            class="text-sm font-semibold text-white underline decoration-blue-400 underline-offset-4"
            data-mk="Прочитај повеќе"
            data-sq="Lexo më shumë"
            data-en="Read More">
            Прочитај повеќе
          </a>
        </div>
      </div>

      <!-- Заварување -->
      <div class="group relative h-[250px] md:h-[290px] overflow-hidden rounded-3xl bg-slate-200">
        <img src="{{ asset('images/заваруванје.jpg') }}" alt="Заварување" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-black/50 p-6 flex flex-col justify-end">
          <h3
            class="text-lg font-bold text-white"
            data-mk="Заварување"
            data-sq="Saldim"
            data-en="Welding">
            Заварување
          </h3>
          <p
            class="text-xs text-gray-300 mb-3"
            data-mk="Активности за заварување каде што учесниците учат безбедно..."
            data-sq="Aktivitete saldimi ku pjesëmarrësit mësojnë në mënyrë të sigurt..."
            data-en="Welding activities where participants learn safely...">
            Активности за заварување каде што учесниците учат безбедно...
          </p>
          <a
            href="#"
            class="text-xs font-semibold text-white underline decoration-blue-400"
            data-mk="Прочитај повеќе"
            data-sq="Lexo më shumë"
            data-en="Read More">
            Прочитај повеќе
          </a>
        </div>
      </div>

      <!-- Резба -->
      <div class="group relative h-[250px] md:h-[290px] overflow-hidden rounded-3xl bg-slate-200">
        <img src="{{ asset('images/резба.jpg') }}" alt="Резба" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-black/50 p-6 flex flex-col justify-end">
          <h3
            class="text-lg font-bold text-white"
            data-mk="Резба"
            data-sq="Gdhendje"
            data-en="Carving">
            Резба
          </h3>
          <p
            class="text-xs text-gray-300 mb-3"
            data-mk="Рачно изработени резби создадени со грижа..."
            data-sq="Gdhendje të punuara me dorë dhe me kujdes..."
            data-en="Hand-crafted carvings made with care...">
            Рачно изработени резби создадени со грижа...
          </p>
          <a
            href="#"
            class="text-xs font-semibold text-white underline decoration-blue-400"
            data-mk="Прочитај повеќе"
            data-sq="Lexo më shumë"
            data-en="Read More">
            Прочитај повеќе
          </a>
        </div>
      </div>

      <!-- Столарија -->
      <div class="group relative h-[250px] md:h-[290px] overflow-hidden rounded-3xl bg-slate-200">
        <img src="{{ asset('images/столарија.jpg') }}" alt="Столарија" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-black/50 p-6 flex flex-col justify-end">
          <h3
            class="text-lg font-bold text-white"
            data-mk="Столарија"
            data-sq="Marangozeri"
            data-en="Carpentry">
            Столарија
          </h3>
          <p
            class="text-xs text-gray-300 mb-3"
            data-mk="Занает на работа со дрво за создавање..."
            data-sq="Zejtaria e punimit të drurit për krijim..."
            data-en="The craft of woodworking for creating...">
            Занает на работа со дрво за создавање...
          </p>
          <a
            href="#"
            class="text-xs font-semibold text-white underline decoration-blue-400"
            data-mk="Прочитај повеќе"
            data-sq="Lexo më shumë"
            data-en="Read More">
            Прочитај повеќе
          </a>
        </div>
      </div>

      <!-- Електрика -->
      <div class="group relative h-[250px] md:h-[290px] overflow-hidden rounded-3xl bg-slate-200">
        <img src="{{ asset('images/електрика.jpg') }}" alt="Електрика" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-black/50 p-6 flex flex-col justify-end">
          <h3
            class="text-lg font-bold text-white"
            data-mk="Електрика"
            data-sq="Elektricitet"
            data-en="Electrical Work">
            Електрика
          </h3>
          <p
            class="text-xs text-gray-300 mb-3"
            data-mk="Учење и извршување електрични задачи..."
            data-sq="Mësimi dhe kryerja e detyrave elektrike..."
            data-en="Learning and performing electrical tasks...">
            Учење и извршување електрични задачи...
          </p>
          <a
            href="#"
            class="text-xs font-semibold text-white underline decoration-blue-400"
            data-mk="Прочитај повеќе"
            data-sq="Lexo më shumë"
            data-en="Read More">
            Прочитај повеќе
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- ОСТАНАТИ -->
  <section class="mx-auto max-w-7xl px-6 py-12">
    <h2
      class="mb-8 text-2xl md:text-3xl font-bold text-[#1e293b]"
      data-mk="Останати активности"
      data-sq="Aktivitete të tjera"
      data-en="Other Activities">
      Останати активности
    </h2>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-4">

      <div class="grid grid-cols-1 gap-6 md:col-span-2 sm:grid-cols-2">

        <!-- Везење -->
        <div class="group relative h-[250px] overflow-hidden rounded-3xl bg-gray-100">
          <img src="{{ asset('images/шиење.jpg') }}" class="h-full w-full object-cover" />
          <div class="absolute inset-0 bg-black/40 p-6 flex flex-col justify-end">
            <h3
              class="text-lg font-bold text-white"
              data-mk="Везење"
              data-sq="Qëndisje"
              data-en="Embroidery">
              Везење
            </h3>
            <p
              class="text-[10px] text-gray-200 mb-2"
              data-mk="Везот ги подобрува креативноста..."
              data-sq="Qëndisja përmirëson kreativitetin..."
              data-en="Embroidery improves creativity...">
              Везот ги подобрува креативноста...
            </p>
            <a
              href="#"
              class="text-xs font-semibold text-white underline"
              data-mk="Прочитај повеќе"
              data-sq="Lexo më shumë"
              data-en="Read More">
              Прочитај повеќе
            </a>
          </div>
        </div>

        <!-- Цртање -->
        <div class="group relative h-[250px] overflow-hidden rounded-3xl bg-gray-100">
          <img src="{{ asset('images/цртање.jpg') }}" class="h-full w-full object-cover" />
          <div class="absolute inset-0 bg-black/40 p-6 flex flex-col justify-end">
            <h3
              class="text-lg font-bold text-white"
              data-mk="Цртање"
              data-sq="Vizatim"
              data-en="Drawing">
              Цртање
            </h3>
            <p
              class="text-[10px] text-gray-200 mb-2"
              data-mk="Активности за цртање..."
              data-sq="Aktivitete vizatimi..."
              data-en="Drawing activities...">
              Активности за цртање...
            </p>
            <a
              href="#"
              class="text-xs font-semibold text-white underline"
              data-mk="Прочитај повеќе"
              data-sq="Lexo më shumë"
              data-en="Read More">
              Прочитај повеќе
            </a>
          </div>
        </div>

        <!-- Шиење -->
        <div class="group relative h-[250px] overflow-hidden rounded-3xl bg-gray-100">
          <img src="{{ asset('images/шиење.jpg') }}" class="h-full w-full object-cover" />
          <div class="absolute inset-0 bg-black/40 p-6 flex flex-col justify-end">
            <h3
              class="text-lg font-bold text-white"
              data-mk="Шиење"
              data-sq="Qepje"
              data-en="Sewing">
              Шиење
            </h3>
            <p
              class="text-[10px] text-gray-200 mb-2"
              data-mk="Активности за шиење..."
              data-sq="Aktivitete qepjeje..."
              data-en="Sewing activities...">
              Активности за шиење...
            </p>
            <a
              href="#"
              class="text-xs font-semibold text-white underline"
              data-mk="Прочитај повеќе"
              data-sq="Lexo më shumë"
              data-en="Read More">
              Прочитај повеќе
            </a>
          </div>
        </div>

        <!-- Сликање -->
        <div class="group relative h-[250px] overflow-hidden rounded-3xl bg-gray-100">
          <img src="{{ asset('images/сликанје.png') }}" class="h-full w-full object-cover" />
          <div class="absolute inset-0 bg-black/40 p-6 flex flex-col justify-end">
            <h3
              class="text-lg font-bold text-white"
              data-mk="Сликање"
              data-sq="Pikturë"
              data-en="Painting">
              Сликање
            </h3>
            <p
              class="text-[10px] text-gray-200 mb-2"
              data-mk="Создавање уметнички дела..."
              data-sq="Krijimi i veprave artistike..."
              data-en="Creating works of art...">
              Создавање уметнички дела...
            </p>
            <a
              href="#"
              class="text-xs font-semibold text-white underline"
              data-mk="Прочитај повеќе"
              data-sq="Lexo më shumë"
              data-en="Read More">
              Прочитај повеќе
            </a>
          </div>
        </div>

      </div>

      <!-- Спорт -->
      <div class="group relative overflow-hidden rounded-3xl bg-gray-200 md:col-span-2 h-[400px] md:h-auto md:min-h-[524px]">
        <img src="{{ asset('images/sport2.jpg') }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent p-8 md:p-10 flex flex-col justify-end">
          <h3
            class="mb-3 text-2xl md:text-3xl font-bold text-white"
            data-mk="Спорт"
            data-sq="Sport"
            data-en="Sport">
            Спорт
          </h3>
          <p
            class="mb-6 max-w-md text-sm text-gray-200"
            data-mk="Физички вежби за градење сила, кондиција и целокупна благосостојба."
            data-sq="Ushtrime fizike për ndërtimin e forcës, kushtëzimit dhe mirëqenies së përgjithshme."
            data-en="Physical exercises for building strength, fitness and overall wellbeing.">
            Физички вежби за градење сила, кондиција и целокупна благосостојба.
          </p>
          <a
            href="#"
            class="text-sm font-semibold text-white underline decoration-blue-400 underline-offset-8"
            data-mk="Прочитај повеќе"
            data-sq="Lexo më shumë"
            data-en="Read More">
            Прочитај повеќе
          </a>
        </div>
      </div>

    </div>
  </section>

</body>
</html>

@endsection