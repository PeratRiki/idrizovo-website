@extends('layouts.app')
@section('title', 'Новости и соопштенија')
@section('content')


  <style>
    body { font-family: 'Inter', sans-serif; }
    #mobile-menu { display: none; }
    #mobile-menu.open { display: block; }
    #lang-dropdown { display: none; }
    #lang-dropdown.open { display: block; }
  </style>
</head>
<body class="bg-gradient-to-b from-[#e6effa] via-[#7ea4db] to-[#4f78b8] text-white font-sans">


<!-- HERO -->
<section class="hero">
  <img src="{{ asset('images/ChatGPT Image Apr 30, 2026, 04_55_18 PM.png') }}" alt="Новости" class="hero-img">
</section>

<!-- CONTENT -->
<main class="w-[86%] max-w-[1200px] mx-auto pt-16 pb-20">

  <section class="mb-20">
    <h2 class="section-title" data-mk="Нови соопштенија" data-sq="Njoftime të reja" data-en="New announcements">Нови соопштенија</h2>
    <div class="news-grid">
      <article class="card card-wide">
        <h3 class="card-title">ИНТЕРЕН ОГЛАС за пополнување на работно место со унапредување на административен службеник</h3>
        <p class="card-text">Врз основа на член 30 став 1 алинеја 2 став 3 и став 5...</p>
        <a href="{{ route('article.index') }}?id=1" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card card-tall">
        <h3 class="card-title">Одлука</h3>
        <p class="card-text">КПУ-КПД Идризово со Отворено одделение Велес го продолжува рокот...</p>
        <a href="{{ route('article.index') }}?id=2" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card card-tall">
        <h3 class="card-title">ИНТЕРЕН ОГЛАС за пополнување на работни места со унапредување</h3>
        <p class="card-text">Врз основа на член 67 став 1 алинеја 2...</p>
        <a href="{{ route('article.index') }}?id=3" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card">
        <h3 class="card-title">Предлог на одлука за избор на кандидати за унапредување</h3>
        <p class="card-text">Врз основа на член 52 став 1...</p>
        <a href="{{ route('article.index') }}?id=4" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card">
        <h3 class="card-title">Одлука за поништување на оглас за вработување</h3>
        <p class="card-text">Врз основа на член 31 од Законот...</p>
        <a href="{{ route('article.index') }}?id=5" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card card-wide">
        <h3 class="card-title">Одлука за избор на кандидати за унапредување на административни службеници</h3>
        <p class="card-text">Врз основа на член 52 од Законот за административни службеници...</p>
        <a href="{{ route('article.index') }}?id=6" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
    </div>
  </section>

  <section>
    <h2 class="section-title" data-mk="Постари соопштенија" data-sq="Njoftime më të vjetra" data-en="Older announcements">Постари соопштенија</h2>
    <div class="news-grid">
      <article class="card card-tall">
        <h3 class="card-title">Интерен оглас за вработување во затворска полиција</h3>
        <p class="card-text">Врз основа на член 78 и член 79...</p>
        <a href="{{ route('article.index') }}?id=7" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card card-tall">
        <h3 class="card-title">Интерен оглас за вработување во администрација</h3>
        <p class="card-text">Врз основа на член 30 став 1...</p>
        <a href="{{ route('article.index') }}?id=8" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card card-wide">
        <h3 class="card-title">Оглас за вработување на 18 лица на неопределено време</h3>
        <p class="card-text">Казнено-поправната установа објавува јавен оглас...</p>
        <a href="{{ route('article.index') }}?id=9" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card card-wide">
        <h3 class="card-title">ЈАВЕН ОГЛАС за вработување на 70 лица</h3>
        <p class="card-text">Врз основа на член 67 став 1...</p>
        <a href="{{ route('article.index') }}?id=10" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card card-tall">
        <h3 class="card-title">ЈАВЕН ОГЛАС за вработување на 30 лица</h3>
        <p class="card-text">Врз основа на член 67 став...</p>
        <a href="{{ route('article.index') }}?id=11" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
      <article class="card card-tall">
        <h3 class="card-title">ОГЛАС за пополнување на работно место</h3>
        <p class="card-text">Врз основа на член 78...</p>
        <a href="{{ route('article.index') }}?id=12" class="btn" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">Прочитај повеќе</a>
      </article>
    </div>
  </section>

</main>


@endsection