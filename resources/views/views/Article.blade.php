@extends('layouts.app')
@section('title', 'Новости и соопштенија')
@section('content')
</head>

<body class="bg-gradient-to-b from-[#e6effa] via-[#7ea4db] to-[#4f78b8] text-white font-sans min-h-screen">

<!-- ARTICLE -->
<main class="w-[85%] max-w-[900px] mx-auto py-20">

  <article class="bg-white/30 border border-white/40 backdrop-blur-md p-10 rounded-xl shadow-lg">

    <h1
      class="text-3xl font-extrabold underline mb-6"
      data-mk="Интерен оглас за пополнување на работно место"
      data-sq="Shpallje e brendshme për plotësimin e një vendi pune"
      data-en="Internal Vacancy Announcement">
      Интерен оглас за пополнување на работно место
    </h1>

    <p
      class="text-sm mb-4 opacity-80"
      data-mk="Објавено на: 15.03.2026"
      data-sq="Publikuar më: 15.03.2026"
      data-en="Published on: 15.03.2026">
      Објавено на: 15.03.2026
    </p>

    <p
      class="text-lg leading-8 mb-6"
      data-mk="Врз основа на член 30 став 1 алинеја 2 и став 3 од Законот за административни службеници, се објавува интерен оглас за пополнување на работно место со унапредување на административен службеник."
      data-sq="Në bazë të nenit 30 paragrafi 1 pika 2 dhe paragrafi 3 të Ligjit për nëpunës administrativë, shpallet shpallje e brendshme për plotësimin e një vendi pune me avancim të nëpunësit administrativ."
      data-en="Based on Article 30, paragraph 1, item 2 and paragraph 3 of the Law on Administrative Servants, an internal vacancy is announced for filling a position through promotion of an administrative servant.">
      Врз основа на член 30 став 1 алинеја 2 и став 3 од Законот за административни службеници,
      се објавува интерен оглас за пополнување на работно место со унапредување на административен службеник.
    </p>

    <p
      class="text-lg leading-8 mb-6"
      data-mk="Кандидатите треба да ги исполнуваат следните услови:"
      data-sq="Kandidatët duhet të plotësojnë kushtet e mëposhtme:"
      data-en="Candidates must meet the following requirements:">
      Кандидатите треба да ги исполнуваат следните услови:
    </p>

    <ul class="list-disc pl-6 mb-6 text-lg leading-8">
      <li
        data-mk="Да се вработени во институцијата"
        data-sq="Të jenë të punësuar në institucion"
        data-en="To be employed at the institution">
        Да се вработени во институцијата
      </li>
      <li
        data-mk="Да имаат најмалку 2 години работно искуство"
        data-sq="Të kenë të paktën 2 vjet përvojë pune"
        data-en="To have at least 2 years of work experience">
        Да имаат најмалку 2 години работно искуство
      </li>
      <li
        data-mk="Да имаат соодветно образование"
        data-sq="Të kenë arsimimin e duhur"
        data-en="To have the appropriate education">
        Да имаат соодветно образование
      </li>
    </ul>

    <p
      class="text-lg leading-8 mb-10"
      data-mk="Рокот за пријавување изнесува 5 работни дена од денот на објавување на огласот. Пријавите се доставуваат до архивата на институцијата."
      data-sq="Afati i aplikimit është 5 ditë pune nga dita e publikimit të shpalljes. Aplikimet dorëzohen në arkivin e institucionit."
      data-en="The application deadline is 5 working days from the date of publication of the announcement. Applications are submitted to the institution's archive.">
      Рокот за пријавување изнесува 5 работни дена од денот на објавување на огласот.
      Пријавите се доставуваат до архивата на институцијата.
    </p>

    <a
      href="{{ url('/Novosti') }}"
      class="inline-block bg-[#071a32] text-white px-5 py-2 rounded font-bold hover:bg-[#17457d] hover:text-white transition"
      data-mk="← Назад кон новости"
      data-sq="← Kthehu te lajmet"
      data-en="← Back to news">
      ← Назад кон новости
    </a>

  </article>

</main>

@endsection
