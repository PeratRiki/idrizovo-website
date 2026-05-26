@extends('layouts.app')
@section('title', 'Рачни изработки во КПУ Идризово')
@section('content')

@php
$fallbackMain = [
    'iglaikonec' => 'images/torba2.jpg',
    'rezba'      => 'images/rezba1.jpg',
    'boja'       => 'images/boja1.jpg',
    'grncarstvo' => 'images/grnicarstvo4.jpg',
];
$fallbackExtras = [
    'iglaikonec' => ['images/mala.jpg', 'images/kosula.jpg', 'images/srce1.jpg'],
    'rezba'      => ['images/rezba4.jpg', 'images/rezba3.jpg', 'images/rezba2.jpg'],
    'boja'       => ['images/boja2.jpg', 'images/boja3.jpg', 'images/boja4.jpg'],
    'grncarstvo' => ['images/grnicarstvo1.jpg', 'images/grnicarstvo2.jpg', 'images/grnicarstvo3.jpg'],
];
@endphp

<style>
    /* ── Base ─────────────────────────────────────────── */
    #racni-izrabotki {
        background: linear-gradient(160deg, #042C53 0%, #0C447C 35%, #185FA5 65%, #378ADD 100%);
        min-height: 100vh;
        color: #fff;
    }

    /* ── Hero ─────────────────────────────────────────── */
    .ri-hero {
    position: relative;
    width: 100%;
    height: 520px;
    overflow: hidden;
    margin-top: 0;
}
    .ri-hero img {
        width: 100%; height: 100%;
        object-fit: cover; object-position: center;
        transition: transform 0.5s ease;
    }
    .ri-hero:hover img { transform: scale(1.04); }
    .ri-hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(4,44,83,0.85) 0%, rgba(4,44,83,0.2) 60%, transparent 100%);
    }
    .ri-hero-content {
        position: absolute;
        bottom: 2.5rem; left: 3rem;
    }
    .ri-hero-badge {
        display: inline-block;
        background: rgba(55,138,221,0.3);
        border: 1px solid rgba(181,212,244,0.35);
        color: #B5D4F4;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 6px 16px;
        border-radius: 20px;
        margin-bottom: 1rem;
    }
    .ri-hero-title {
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 700;
        line-height: 1.1;
        letter-spacing: -1px;
        color: #fff;
    }

    /* ── Layout ───────────────────────────────────────── */
    .ri-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    /* ── Glass card ───────────────────────────────────── */
    .glass {
        background: rgba(255,255,255,0.08);
        border: 0.5px solid rgba(255,255,255,0.18);
        border-radius: 20px;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
    .glass-strong {
        background: rgba(255,255,255,0.13);
        border: 0.5px solid rgba(255,255,255,0.25);
        border-radius: 20px;
    }

    /* ── Section label ────────────────────────────────── */
    .ri-label {
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #85B7EB;
        margin-bottom: 0.5rem;
    }
    .ri-section-title {
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 700;
        color: #fff;
        letter-spacing: -0.5px;
        margin-bottom: 0.5rem;
    }

    /* ── Intro block ──────────────────────────────────── */
    .ri-intro {
        padding: 2.5rem;
        margin-bottom: 3rem;
    }
    .ri-intro p {
        font-size: 1rem;
        line-height: 1.8;
        color: rgba(255,255,255,0.8);
        margin-top: 1rem;
        max-width: 700px;
    }

    /* ── Quote cards ──────────────────────────────────── */
    .ri-quotes {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 3.5rem;
    }
    .ri-quote {
        padding: 1.5rem;
        border-radius: 16px;
        background: rgba(255,255,255,0.07);
        border-left: 3px solid #378ADD;
        font-size: 0.875rem;
        line-height: 1.7;
        color: rgba(255,255,255,0.85);
        font-style: italic;
    }

    /* ── Craft sections ───────────────────────────────── */
    .ri-section {
        display: flex;
        align-items: center;
        gap: 3rem;
        margin-bottom: 5rem;
    }
    .ri-section.reversed { flex-direction: row-reverse; }
    .ri-section-images {
        flex: 1;
        display: flex;
        gap: 8px;
        height: 420px;
        border-radius: 20px;
        overflow: hidden;
    }
    .ri-img-main { flex: 3; overflow: hidden; border-radius: 16px; }
    .ri-img-side  { flex: 1; overflow: hidden; border-radius: 12px; }
    .ri-section-images img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .ri-section-images img:hover { transform: scale(1.05); }
    .ri-section-text { flex: 1; }
    .ri-section-text h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 1rem;
        line-height: 1.3;
    }
    .ri-section-text p {
        font-size: 0.95rem;
        line-height: 1.8;
        color: rgba(255,255,255,0.75);
    }
    .ri-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 1.75rem;
        background: rgba(55,138,221,0.25);
        border: 1px solid rgba(181,212,244,0.35);
        color: #E6F1FB;
        padding: 12px 24px;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s, border-color 0.2s;
    }
    .ri-btn:hover {
        background: rgba(55,138,221,0.45);
        border-color: rgba(181,212,244,0.6);
        color: #fff;
    }

    /* ── ADMIN PANEL ──────────────────────────────────── */
    .ri-admin {
        margin-top: 4rem;
        padding: 2rem;
    }
    .ri-admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .ri-admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1rem;
    }
    .ri-admin-card {
        background: rgba(255,255,255,0.07);
        border: 0.5px solid rgba(255,255,255,0.15);
        border-radius: 14px;
        overflow: hidden;
        transition: transform 0.2s;
    }
    .ri-admin-card:hover { transform: translateY(-2px); }
    .ri-admin-card-body { padding: 1.25rem; }
    .ri-admin-card-cat {
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #85B7EB;
        margin-bottom: 4px;
    }
    .ri-admin-card-title {
        font-size: 1rem;
        font-weight: 600;
        color: #fff;
        margin-bottom: 6px;
    }
    .ri-admin-card-actions {
        display: flex;
        gap: 6px;
        padding: 0.75rem 1.25rem;
        border-top: 0.5px solid rgba(255,255,255,0.1);
    }
    .ri-icon-btn {
        background: rgba(255,255,255,0.1);
        border: none;
        color: rgba(255,255,255,0.7);
        width: 34px; height: 34px;
        border-radius: 8px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
        transition: background 0.15s;
        text-decoration: none;
    }
    .ri-icon-btn:hover { background: rgba(255,255,255,0.2); color: #fff; }
    .ri-icon-btn.delete { }
    .ri-icon-btn.delete:hover { background: rgba(163,45,45,0.4); color: #F7C1C1; }
    .ri-add-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #378ADD;
        border: none;
        color: #fff;
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.2s;
    }
    .ri-add-btn:hover { background: #185FA5; }

    /* ── Responsive ───────────────────────────────────── */
    @media (max-width: 900px) {
        .ri-section, .ri-section.reversed { flex-direction: column; }
        .ri-section-images { height: 300px; }
        .ri-hero { height: 340px; margin-top: 70px; }
    }
    @media (max-width: 600px) {
        .ri-container { padding: 1.5rem 1rem; }
        .ri-intro { padding: 1.5rem; }
        .ri-hero-content { left: 1.5rem; bottom: 1.5rem; }
    }
</style>

<div id="racni-izrabotki">

    {{-- ── HERO ─────────────────────────────────────── --}}
    <div class="ri-hero">
        <img src="{{ asset('images/home.jpg') }}" alt="Рачни изработки">
        <div class="ri-hero-overlay"></div>
        <div class="ri-hero-content">
            <span class="ri-hero-badge">КПУ Идризово</span>
            <h1 class="ri-hero-title"
                data-mk="Рачни Изработки"
                data-sq="Punë Dore"
                data-en="Handmade Crafts">
                Рачни<br>Изработки
            </h1>
        </div>
    </div>

    <div class="ri-container">

        {{-- ── INTRO ──────────────────────────────────── --}}
        <div class="ri-intro glass">
            <p class="ri-label">За програмата</p>
            <h2 class="ri-section-title"
                data-mk="Рачни изработки во КПУ Идризово"
                data-sq="Punë dore në KPU Idrizovo"
                data-en="Handmade Crafts at KPU Idrizovo">
                Рачни изработки во КПУ Идризово
            </h2>
            <p data-mk="Во затворската работилница, конецот и иглата не се само обични алатки – тие се мост кон внатрешна слобода. Со секој бод и секои трпеливи движења плетат ташни и кошули, вежбајќи истовремено дисциплина и самоконтрола."
               data-sq="Në punëtorinë e burgut, peri dhe gjilpëra nuk janë vetëm mjete të zakonshme – ato janë urë drejt lirisë së brendshme."
               data-en="In the prison workshop, thread and needle are not just ordinary tools – they are a bridge to inner freedom.">
                Во затворската работилница, конецот и иглата не се само обични алатки – тие се мост кон
                внатрешна слобода. Со секој бод и секои трпеливи движења плетат ташни и кошули, вежбајќи
                истовремено дисциплина и самоконтрола.
            </p>
        </div>

        {{-- ── QUOTE ──────────────────────────────────── --}}
        <h2 style="font-size:1.4rem;font-weight:700;color:rgba(255,255,255,0.9);margin-bottom:1.5rem;text-align:center;font-style:italic;"
            data-mk="„Секој производ носи своја приказна и допринесува за ресоцијализација.""
            data-sq="„Çdo produkt mbart historinë e vet dhe kontribuon në risocializim.""
            data-en="„Every product carries its own story and contributes to resocialisation."">
            "Секој производ носи своја приказна и допринесува за ресоцијализација."
        </h2>

        {{-- ── QUOTES ──────────────────────────────────── --}}
        <div class="ri-quotes">
            @if(isset($quotes) && $quotes->count())
                @foreach($quotes as $quote)
                    <div class="ri-quote">„{{ $quote->quote }}"</div>
                @endforeach
            @else
                <div class="ri-quote" data-mk="„Во секој бод и секој засек има дел од мојата тишина. Работилницата ми е како терапија."">
                    „Во секој бод и секој засек има дел од мојата тишина. Работилницата ми е како терапија."
                </div>
                <div class="ri-quote" data-mk="„Сликите што ги цртам не се само пејзажи — тие се мојот прозорец кон светот."">
                    „Сликите што ги цртам не се само пејзажи — тие се мојот прозорец кон светот."
                </div>
                <div class="ri-quote" data-mk="„Работилницата ми дава мир и сила да верувам дека можам да бидам подобар човек."">
                    „Работилницата ми дава мир и сила да верувам дека можам да бидам подобар човек."
                </div>
                <div class="ri-quote" data-mk="„Кога плетам, чувствувам дека моите раце зборуваат наместо мене."">
                    „Кога плетам, чувствувам дека моите раце зборуваат наместо мене."
                </div>
            @endif
        </div>

        {{-- ── CRAFT SECTIONS ─────────────────────────── --}}
        @if(isset($items) && $items->count())
            @foreach($items as $index => $item)
            @php
                $mainImg = $item->image_main
                    ? Storage::url($item->image_main)
                    : asset($fallbackMain[$item->category] ?? 'images/home.jpg');
                $extras = ($item->images_extra && count($item->images_extra))
                    ? array_map(fn($e) => Storage::url($e), $item->images_extra)
                    : array_map(fn($e) => asset($e), $fallbackExtras[$item->category] ?? []);
            @endphp
            <div class="ri-section {{ $index % 2 !== 0 ? 'reversed' : '' }}">
                <div class="ri-section-images">
                    <div class="ri-img-main"><img src="{{ $mainImg }}" alt="{{ $item->title }}"></div>
                    @foreach(array_slice($extras, 0, 3) as $extra)
                        <div class="ri-img-side"><img src="{{ $extra }}" alt="{{ $item->title }}"></div>
                    @endforeach
                </div>
                <div class="ri-section-text">
                    <p class="ri-label">Рачна изработка</p>
                    <h2>{{ $item->title }}</h2>
                    <p>{{ $item->description }}</p>
                    @if($item->link_url)
                        <a href="{{ url($item->link_url) }}" class="ri-btn"
                           data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See More">
                            Види повеќе →
                        </a>
                    @endif
                </div>
            </div>
            @endforeach

        @else
        {{-- Fallback static sections --}}

            {{-- ИГЛА И КОНЕЦ --}}
            <div class="ri-section">
                <div class="ri-section-images">
                    <div class="ri-img-main"><img src="{{ asset('images/torba2.jpg') }}" alt="Игла и конец"></div>
                    <div class="ri-img-side"><img src="{{ asset('images/mala.jpg') }}" alt=""></div>
                    <div class="ri-img-side"><img src="{{ asset('images/kosula.jpg') }}" alt=""></div>
                    <div class="ri-img-side"><img src="{{ asset('images/srce1.jpg') }}" alt=""></div>
                </div>
                <div class="ri-section-text">
                    <p class="ri-label">Категорија</p>
                    <h2 data-mk="Уметност со игла и конец" data-sq="Arti me gjilpërë dhe pe" data-en="The Art of Needle and Thread">
                        Уметност со игла и конец
                    </h2>
                    <p data-mk="Во затворската работилница, конецот и иглата не се само обични алатки – тие се мост кон внатрешна слобода.">
                        Во затворската работилница, конецот и иглата не се само обични алатки – тие се мост кон внатрешна слобода.
                    </p>
                    <a href="{{ url('/Iglaikonec') }}" class="ri-btn" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See More">
                        Види повеќе →
                    </a>
                </div>
            </div>

            {{-- РЕЗБИ --}}
            <div class="ri-section reversed">
                <div class="ri-section-images">
                    <div class="ri-img-main"><img src="{{ asset('images/rezba1.jpg') }}" alt="Резба"></div>
                    <div class="ri-img-side"><img src="{{ asset('images/rezba4.jpg') }}" alt=""></div>
                    <div class="ri-img-side"><img src="{{ asset('images/rezba3.jpg') }}" alt=""></div>
                    <div class="ri-img-side"><img src="{{ asset('images/rezba2.jpg') }}" alt=""></div>
                </div>
                <div class="ri-section-text">
                    <p class="ri-label">Категорија</p>
                    <h2 data-mk="Резби од дрво" data-sq="Gdhendje druri" data-en="Wood Carvings">
                        Резби од дрво
                    </h2>
                    <p data-mk="Вештината на обработка на дрво и создавање на уметнички дела преку резба е длабоко вкоренета во нашата култура.">
                        Вештината на обработка на дрво и создавање на уметнички дела преку резба е длабоко вкоренета во нашата култура.
                    </p>
                    <a href="{{ url('/Rezba') }}" class="ri-btn" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See More">
                        Види повеќе →
                    </a>
                </div>
            </div>

            {{-- БОЈА --}}
            <div class="ri-section">
                <div class="ri-section-images">
                    <div class="ri-img-main"><img src="{{ asset('images/boja1.jpg') }}" alt="Боење"></div>
                    <div class="ri-img-side"><img src="{{ asset('images/boja2.jpg') }}" alt=""></div>
                    <div class="ri-img-side"><img src="{{ asset('images/boja3.jpg') }}" alt=""></div>
                    <div class="ri-img-side"><img src="{{ asset('images/boja4.jpg') }}" alt=""></div>
                </div>
                <div class="ri-section-text">
                    <p class="ri-label">Категорија</p>
                    <h2 data-mk="Боја и перспектива: слика од работилницата" data-sq="Ngjyra dhe perspektivë" data-en="Colour and Perspective">
                        Боја и перспектива: слика од работилницата
                    </h2>
                    <p data-mk="Во затворот, хартијата и боите стануваат прозорец кон слобода.">
                        Во затворот, хартијата и боите стануваат прозорец кон слобода.
                    </p>
                    <a href="{{ url('/Color') }}" class="ri-btn" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See More">
                        Види повеќе →
                    </a>
                </div>
            </div>

            {{-- ГРНЧАРСТВО --}}
            <div class="ri-section reversed">
                <div class="ri-section-images">
                    <div class="ri-img-main"><img src="{{ asset('images/grnicarstvo4.jpg') }}" alt="Грнчарство"></div>
                    <div class="ri-img-side"><img src="{{ asset('images/grnicarstvo1.jpg') }}" alt=""></div>
                    <div class="ri-img-side"><img src="{{ asset('images/grnicarstvo2.jpg') }}" alt=""></div>
                    <div class="ri-img-side"><img src="{{ asset('images/grnicarstvo3.jpg') }}" alt=""></div>
                </div>
                <div class="ri-section-text">
                    <p class="ri-label">Категорија</p>
                    <h2 data-mk="Грнчарство: Обликување на надежта" data-sq="Punë balte: Formësimi i shpresës" data-en="Pottery: Shaping Hope">
                        Грнчарство: Обликување на надежта
                    </h2>
                    <p data-mk="Во тишината на затворската работилница, каде времето тече поинаку, глината станува глас.">
                        Во тишината на затворската работилница, каде времето тече поинаку, глината станува глас.
                    </p>
                    <a href="{{ url('/Grncarstvo') }}" class="ri-btn" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See More">
                        Види повеќе →
                    </a>
                </div>
            </div>

        @endif

        {{-- ═══════════════════════════════════════════════
             ADMIN PANEL — видлив само за admin/staff
             Заштити ја оваа секција со @can('admin') или
             @if(Auth::user()?->isAdmin()) во Laravel
        ════════════════════════════════════════════════ --}}
        @can('manage-content')
        <div class="ri-admin glass-strong">
            <div class="ri-admin-header">
                <div>
                    <p class="ri-label">Администрација</p>
                    <h2 class="ri-section-title" style="font-size:1.3rem">Управување со рачни изработки</h2>
                </div>
                <a href="{{ route('admin.racni.create') }}" class="ri-add-btn">
                    + Додај нова изработка
                </a>
            </div>

            @if(isset($items) && $items->count())
            <div class="ri-admin-grid">
                @foreach($items as $item)
                <div class="ri-admin-card">
                    <div class="ri-admin-card-body">
                        <p class="ri-admin-card-cat">{{ $item->category }}</p>
                        <p class="ri-admin-card-title">{{ $item->title }}</p>
                        <p style="font-size:0.8rem;color:rgba(255,255,255,0.5);line-height:1.5">
                            {{ Str::limit($item->description, 80) }}
                        </p>
                    </div>
                    <div class="ri-admin-card-actions">
                        <a href="{{ route('admin.racni.edit', $item->id) }}" class="ri-icon-btn" title="Уреди">✏️</a>
                        <form method="POST" action="{{ route('admin.racni.destroy', $item->id) }}"
                              onsubmit="return confirm('Сигурни сте дека сакате да ја избришете?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="ri-icon-btn delete" title="Избриши">🗑️</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @else
                <p style="color:rgba(255,255,255,0.5);text-align:center;padding:2rem">
                    Нема внесени рачни изработки. Кликни „Додај нова изработка" за да почнеш.
                </p>
            @endif
        </div>
        @endcan

    </div>{{-- /.ri-container --}}
</div>{{-- /#racni-izrabotki --}}

@endsection