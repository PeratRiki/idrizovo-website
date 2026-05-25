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

            <h2 class="section-title" style="margin-top:40px;"
                data-mk="🗞️ Најнови новости"
                data-sq="🗞️ Lajmet më të fundit"
                data-en="🗞️ Latest News">🗞️ Најнови новости</h2>
            <div class="news-grid">

                <article class="card card-wide">
                    <h3 class="card-title"
                        data-mk="Успешно завршена работилница за грнчарство"
                        data-sq="Punëtoria e qeramikës përfundoi me sukses"
                        data-en="Pottery Workshop Successfully Completed">Успешно завршена работилница за грнчарство</h3>
                    <p class="card-text"
                       data-mk="Во рамките на програмата за ресоцијализација, затворениците успешно ја завршија работилницата за грнчарство. Произведените предмети ќе бидат изложени на претстојната изложба."
                       data-sq="Në kuadër të programit të risocializimit, të burgosurit e përfunduan me sukses punëtorinë e qeramikës. Objektet e prodhuara do të ekspozohen në ekspozitën e ardhshme."
                       data-en="As part of the resocialization program, inmates successfully completed the pottery workshop. The produced items will be displayed at the upcoming exhibition.">Во рамките на програмата за ресоцијализација, затворениците успешно ја завршија работилницата за грнчарство. Произведените предмети ќе бидат изложени на претстојната изложба.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title"
                        data-mk="Нова серија на рачни изработки"
                        data-sq="Seri e re e punimeve me dorë"
                        data-en="New Series of Handmade Crafts">Нова серија на рачни изработки</h3>
                    <p class="card-text"
                       data-mk="Затворениците создадоа нова колекција на рачно изработени производи кои ќе бидат достапни за јавноста."
                       data-sq="Të burgosurit krijuan një koleksion të ri të produkteve të bëra me dorë, të cilat do të jenë të disponueshme për publikun."
                       data-en="Inmates created a new collection of handmade products that will be available to the public.">Затворениците создадоа нова колекција на рачно изработени производи кои ќе бидат достапни за јавноста.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title"
                        data-mk="Изложба на уметнички дела"
                        data-sq="Ekspozitë e veprave artistike"
                        data-en="Exhibition of Artworks">Изложба на уметнички дела</h3>
                    <p class="card-text"
                       data-mk="КПУ Идризово организира изложба на сликарски и скулпторски дела изработени од затворениците во текот на годината."
                       data-sq="KPU Idrizovë organizon një ekspozitë të veprave pikturale dhe skulpturale të krijuara nga të burgosurit gjatë vitit."
                       data-en="KPU Idrizovo is organizing an exhibition of paintings and sculptures created by inmates throughout the year.">КПУ Идризово организира изложба на сликарски и скулпторски дела изработени од затворениците во текот на годината.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title"
                        data-mk="Програма за образование"
                        data-sq="Program arsimor"
                        data-en="Education Program">Програма за образование</h3>
                    <p class="card-text"
                       data-mk="Нова образовна програма за стекнување на основни дигитални вештини е воведена за затворениците."
                       data-sq="Një program i ri arsimor për përvetësimin e aftësive bazë dixhitale është prezantuar për të burgosurit."
                       data-en="A new educational program for acquiring basic digital skills has been introduced for inmates.">Нова образовна програма за стекнување на основни дигитални вештини е воведена за затворениците.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title"
                        data-mk="Спортски натпревари"
                        data-sq="Gara sportive"
                        data-en="Sports Competitions">Спортски натпревари</h3>
                    <p class="card-text"
                       data-mk="Одржани се интерни спортски натпревари меѓу затворениците со цел промоција на тимска работа и здрав живот."
                       data-sq="Janë mbajtur gara sportive të brendshme ndërmjet të burgosurve me qëllim promovimin e punës ekipore dhe jetesës së shëndetshme."
                       data-en="Internal sports competitions were held among inmates to promote teamwork and a healthy lifestyle.">Одржани се интерни спортски натпревари меѓу затворениците со цел промоција на тимска работа и здрав живот.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card card-wide">
                    <h3 class="card-title"
                        data-mk="Посета на претставници од Министерството за правда"
                        data-sq="Vizitë e përfaqësuesve nga Ministria e Drejtësisë"
                        data-en="Visit by Representatives from the Ministry of Justice">Посета на претставници од Министерството за правда</h3>
                    <p class="card-text"
                       data-mk="Претставници од Министерството за правда ја посетија КПУ Идризово и ги разгледаа програмите за ресоцијализација и работилниците за рачни изработки."
                       data-sq="Përfaqësues nga Ministria e Drejtësisë vizituan KPU Idrizovë dhe shqyrtuan programet e risocializimit dhe punëtoritë e punimeve me dorë."
                       data-en="Representatives from the Ministry of Justice visited KPU Idrizovo and reviewed the resocialization programs and handicraft workshops.">Претставници од Министерството за правда ја посетија КПУ Идризово и ги разгледаа програмите за ресоцијализација и работилниците за рачни изработки.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

            </div>
        </section>

        {{-- Постари новости --}}
        <section>
            <h2 class="section-title"
                data-mk="📁 Постари новости"
                data-sq="📁 Lajme të vjetra"
                data-en="📁 Older News">📁 Постари новости</h2>
            <div class="news-grid">

                <article class="card">
                    <h3 class="card-title"
                        data-mk="Работилница за резба од дрво"
                        data-sq="Punëtori e gdhendjes në dru"
                        data-en="Wood Carving Workshop">Работилница за резба од дрво</h3>
                    <p class="card-text"
                       data-mk="Затворениците учествуваа во специјализирана работилница за резба и обработка на дрво, создавајќи уникатни уметнички предмети."
                       data-sq="Të burgosurit morën pjesë në një punëtori të specializuar të gdhendjes dhe përpunimit të drurit, duke krijuar objekte artistike unike."
                       data-en="Inmates participated in a specialized workshop for wood carving and processing, creating unique artistic objects.">Затворениците учествуваа во специјализирана работилница за резба и обработка на дрво, создавајќи уникатни уметнички предмети.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title"
                        data-mk="Донација на рачни изработки"
                        data-sq="Donacion i punimeve me dorë"
                        data-en="Donation of Handmade Crafts">Донација на рачни изработки</h3>
                    <p class="card-text"
                       data-mk="Дел од приходите од продажба на рачни изработки беа донирани во локален детски дом."
                       data-sq="Një pjesë e të ardhurave nga shitja e punimeve me dorë u donua në një shtëpi lokale për fëmijë."
                       data-en="Part of the proceeds from the sale of handmade crafts were donated to a local children's home.">Дел од приходите од продажба на рачни изработки беа донирани во локален детски дом.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card card-wide">
                    <h3 class="card-title"
                        data-mk="Психолошка поддршка за затворениците"
                        data-sq="Mbështetje psikologjike për të burgosurit"
                        data-en="Psychological Support for Inmates">Психолошка поддршка за затворениците</h3>
                    <p class="card-text"
                       data-mk="Во соработка со здравствени институции, воведена е редовна психолошка поддршка за затворениците со цел подобрување на нивната ментална благосостојба и подготовка за реинтеграција во општеството."
                       data-sq="Në bashkëpunim me institucionet shëndetësore, është futur mbështetje e rregullt psikologjike për të burgosurit me qëllim të përmirësimit të mirëqenies së tyre mendore dhe përgatitjes për riintegrim në shoqëri."
                       data-en="In cooperation with health institutions, regular psychological support has been introduced for inmates to improve their mental well-being and prepare for reintegration into society.">Во соработка со здравствени институции, воведена е редовна психолошка поддршка за затворениците со цел подобрување на нивната ментална благосостојба и подготовка за реинтеграција во општеството.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card card-wide">
                    <h3 class="card-title"
                        data-mk="Меѓународна соработка за ресоцијализација"
                        data-sq="Bashkëpunim ndërkombëtar për risocializim"
                        data-en="International Cooperation for Resocialization">Меѓународна соработка за ресоцијализација</h3>
                    <p class="card-text"
                       data-mk="КПУ Идризово потпиша договор за соработка со европски пенитенцијарни институции за размена на искуства и добри практики во областа на ресоцијализацијата."
                       data-sq="KPU Idrizovë nënshkroi një marrëveshje bashkëpunimi me institucione penale evropiane për shkëmbim përvojash dhe praktikash të mira në fushën e risocializimit."
                       data-en="KPU Idrizovo signed a cooperation agreement with European penitentiary institutions for the exchange of experiences and best practices in the field of resocialization.">КПУ Идризово потпиша договор за соработка со европски пенитенцијарни институции за размена на искуства и добри практики во областа на ресоцијализацијата.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title"
                        data-mk="Курс за готвење"
                        data-sq="Kurs gatimi"
                        data-en="Cooking Course">Курс за готвење</h3>
                    <p class="card-text"
                       data-mk="Нов курс за кулинарски вештини е отворен за затворениците, помагајќи им да стекнат практични вештини за идно вработување."
                       data-sq="Një kurs i ri për aftësi kulinare është hapur për të burgosurit, duke i ndihmuar ata të fitojnë aftësi praktike për punësim në të ardhmen."
                       data-en="A new culinary skills course has been opened for inmates, helping them acquire practical skills for future employment.">Нов курс за кулинарски вештини е отворен за затворениците, помагајќи им да стекнат практични вештини за идно вработување.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më сhumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

                <article class="card">
                    <h3 class="card-title"
                        data-mk="Зелена градина во затворот"
                        data-sq="Kopshti i gjelbër në burg"
                        data-en="Green Garden in the Prison">Зелена градина во затворот</h3>
                    <p class="card-text"
                       data-mk="Затворениците засадија зеленчукова градина во рамките на програмата за работна терапија и грижа за животната средина."
                       data-sq="Të burgosurit mbollën një kopsht perimesh në kuadër të programit të terapisë me punë dhe kujdesit ndaj mjedisit."
                       data-en="Inmates planted a vegetable garden as part of the work therapy program and environmental care.">Затворениците засадија зеленчукова градина во рамките на програмата за работна терапија и грижа за животната средина.</p>
                    <a href="{{ route('article.index') }}" class="btn"
                       data-mk="Прочитај повеќе →"
                       data-sq="Lexo më shumë →"
                       data-en="Read more →">Прочитај повеќе →</a>
                </article>

            </div>
        </section>

    </main>
</div>

@endsection