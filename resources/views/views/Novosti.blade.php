@extends('layouts.app')
@section('title', 'Новости')
@section('content')

<style>
    .news-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .card-wide { grid-column: span 2; }
    .card {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 16px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .card-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #fff;
        line-height: 1.4;
    }
    .card-text {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.8);
        line-height: 1.6;
        flex: 1;
    }
    .btn {
        display: inline-block;
        background: rgba(255,255,255,0.2);
        color: #fff;
        font-size: 0.8rem;
        font-weight: 600;
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        width: fit-content;
        border: 1px solid rgba(255,255,255,0.3);
        transition: background 0.2s;
    }
    .btn:hover { background: rgba(255,255,255,0.35); }
    .section-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 20px;
        letter-spacing: -0.5px;
    }
    .hero-img {
        width: 100%;
        height: 320px;
        object-fit: cover;
        object-position: center;
    }
    @media (max-width: 900px) {
        .news-grid { grid-template-columns: repeat(2, 1fr); }
        .card-wide { grid-column: span 2; }
    }
    @media (max-width: 600px) {
        .news-grid { grid-template-columns: 1fr; }
        .card-wide { grid-column: span 1; }
    }
    @media (max-width: 600px) {
    .hero-section {
        height: 220px !important;
        margin-top: 70px !important;
    }
}
</style>

<div class="min-h-screen" style="background: linear-gradient(to bottom, #e6effa, #7ea4db, #4f78b8);">

    {{-- Hero --}}
    <section class="hero-section" style="width:100vw; height:500px; overflow:hidden; margin:100px 0 0 0; padding:0; position:relative; left:50%; transform:translateX(-50%); box-shadow:0 8px 32px rgba(49,91,150,0.25);">
    <img src="{{ asset('images/ChatGPT Image Apr 30, 2026, 04_55_18 PM.png') }}" alt="Новости" 
         style="width:100%; height:100%; object-fit:cover; object-position:center; display:block; transition:transform 0.4s ease;"
         onmouseover="this.style.transform='scale(1.03)'"
         onmouseout="this.style.transform='scale(1)'">
    <div style="position:absolute; inset:0; background:linear-gradient(to bottom, transparent 50%, rgba(49,91,150,0.4) 100%);"></div>
</section>
            <h2 class="section-title" style="margin-top:40px;">🗞️ Најнови новости</h2>
            <div class="news-grid">

                <article class="card card-wide">
                    <h3 class="card-title">Успешно завршена работилница за грнчарство</h3>
                    <p class="card-text">Во рамките на програмата за ресоцијализација, затворениците успешно ја завршија работилницата за грнчарство. Произведените предмети ќе бидат изложени на претстојната изложба.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title">Нова серија на рачни изработки</h3>
                    <p class="card-text">Затворениците создадоа нова колекција на рачно изработени производи кои ќе бидат достапни за јавноста.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title">Изложба на уметнички дела</h3>
                    <p class="card-text">КПУ Идризово организира изложба на сликарски и скулпторски дела изработени од затворениците во текот на годината.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title">Програма за образование</h3>
                    <p class="card-text">Нова образовна програма за стекнување на основни дигитални вештини е воведена за затворениците.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title">Спортски натпревари</h3>
                    <p class="card-text">Одржани се интерни спортски натпревари меѓу затворениците со цел промоција на тимска работа и здрав живот.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card card-wide">
                    <h3 class="card-title">Посета на претставници од Министерството за правда</h3>
                    <p class="card-text">Претставници од Министерството за правда ја посетија КПУ Идризово и ги разгледаа програмите за ресоцијализација и работилниците за рачни изработки.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

            </div>
        </section>

        {{-- Постари новости --}}
        <section>
            <h2 class="section-title">📁 Постари новости</h2>
            <div class="news-grid">

                <article class="card">
                    <h3 class="card-title">Работилница за резба од дрво</h3>
                    <p class="card-text">Затворениците учествуваа во специјализирана работилница за резба и обработка на дрво, создавајќи уникатни уметнички предмети.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title">Донација на рачни изработки</h3>
                    <p class="card-text">Дел од приходите од продажба на рачни изработки беа донирани во локален детски дом.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card card-wide">
                    <h3 class="card-title">Психолошка поддршка за затворениците</h3>
                    <p class="card-text">Во соработка со здравствени институции, воведена е редовна психолошка поддршка за затворениците со цел подобрување на нивната ментална благосостојба и подготовка за реинтеграција во општеството.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card card-wide">
                    <h3 class="card-title">Меѓународна соработка за ресоцијализација</h3>
                    <p class="card-text">КПУ Идризово потпиша договор за соработка со европски пенитенцијарни институции за размена на искуства и добри практики во областа на ресоцијализацијата.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title">Курс за готвење</h3>
                    <p class="card-text">Нов курс за кулинарски вештини е отворен за затворениците, помагајќи им да стекнат практични вештини за идно вработување.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title">Зелена градина во затворот</h3>
                    <p class="card-text">Затворениците засадија зеленчукова градина во рамките на програмата за работна терапија и грижа за животната средина.</p>
                    <a href="{{ route('article.index') }}" class="btn">Прочитај повеќе →</a>
                </article>

            </div>
        </section>

    </main>
</div>

@endsection
