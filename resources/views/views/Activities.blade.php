@extends('layouts.app')
@section('title', 'Активности')
@section('content')
</head>
<body>
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

</body>
</html>

@endsection
