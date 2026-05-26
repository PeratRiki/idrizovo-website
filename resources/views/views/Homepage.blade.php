@extends('layouts.app')
@section('title', 'Homepage')
@section('content')

    <!-- HERO -->
    <section class="hero-section relative h-[600px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0"><img src="{{ asset('images/homebg.png') }}" alt="Building" class="w-full h-full object-cover"></div>
        <div class="container mx-auto px-4 md:px-20 z-10">
            <div class="max-w-2xl p-3 md:p-8 rounded-lg">
                <h1 class="text-5xl md:text-7xl font-extrabold text-[#1e3a8a] leading-tight"
                    data-mk="КПУ ИДРИЗОВО"
                    data-sq="IEPN Idrizovë"
                    data-en="Idrizovo Prison"
                >КПУ<br>ИДРИЗОВО</h1>
                <p
                    class="text-base md:text-xl font-bold text-gray-800 mt-3 mb-8"
                    data-mk="со отворено одделение Велес"
                    data-sq="me degën e hapur Veles"
                    data-en="with open department Veles"
                >со отворено одделение Велес</p>
                <a href="{{ url('/AboutUs') }}"
                    class="bg-[#3b71ca] mt-10 text-white px-6 md:px-8 py-3 rounded-md font-bold text-base md:text-lg hover:bg-[#2b5a9e] transition shadow-lg inline-block"
                    data-mk="Повеќе за нас"
                    data-sq="Më shumë rreth nesh"
                    data-en="About us"
                >Повеќе за нас</a>
            </div>
        </div>
    </section>

    <!-- AKTIVNOSTI -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col px-4 md:flex-row justify-between md:items-center gap-4 mb-10 md:w-full">
                <h2
                    class="text-3xl md:text-4xl font-bold text-[#0f172a]"
                    data-mk="Активности"
                    data-sq="Aktivitete"
                    data-en="Activities"
                >Активности</h2>
                <a href="{{ url('/Activities') }}"
                    class="bg-[#3b71ca] self-start hover:bg-[#2b5a9e] text-white px-6 md:px-8 py-3 rounded-md text-base md:text-lg font-bold transition shadow-lg flex items-center gap-2 w-fit"
                    data-mk="Прочитај повеќе"
                    data-sq="Lexo më shumë"
                    data-en="Read more"
                >Прочитај повеќе</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative h-[320px] md:h-[380px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/sport.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 w-full p-6 md:p-8 flex flex-col justify-end">
                        <h3
                            class="text-white text-xl font-bold mb-3 underline decoration-2 underline-offset-4"
                            data-mk="Натпревар во шах"
                            data-sq="Gara e shahut"
                            data-en="Chess competition"
                        >Натпревар во шах</h3>
                        <p
                            class="text-gray-200 text-sm leading-relaxed"
                            data-mk="Шаховски натпревар што поттикнува фокус, стратешко размислување и позитивна интеракција меѓу учесниците во рамките на поправната средина."
                            data-sq="Gara e shahut që nxit fokusin, të menduarin strategjik dhe ndërveprimin pozitiv mes pjesëmarrësve brenda mjedisit korrigjues."
                            data-en="A chess competition that encourages focus, strategic thinking and positive interaction among participants within the correctional environment."
                        >Шаховски натпревар што поттикнува фокус, стратешко размислување и позитивна интеракција меѓу учесниците во рамките на поправната средина.</p>
                    </div>
                </div>
                <div class="relative h-[320px] md:h-[380px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/шиење.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 w-full p-6 md:p-8 flex flex-col justify-end">
                        <h3
                            class="text-white text-xl font-bold mb-3 underline decoration-2 underline-offset-4"
                            data-mk="Везење"
                            data-sq="Qëndisje"
                            data-en="Embroidery"
                        >Везење</h3>
                        <p
                            class="text-gray-200 text-sm leading-relaxed"
                            data-mk="Везот ги подобрува креативноста, фокусот и фините моторни вештини."
                            data-sq="Qëndisja përmirëson kreativitetin, fokusin dhe aftësitë fine motorike."
                            data-en="Embroidery improves creativity, focus and fine motor skills."
                        >Везот ги подобрува креативноста, фокусот и фините моторни вештини.</p>
                    </div>
                </div>
                <div class="relative h-[320px] md:h-[380px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/rezba1.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 w-full p-6 md:p-8 flex flex-col justify-end">
                        <h3
                            class="text-white text-xl font-bold mb-3 underline decoration-2 underline-offset-4"
                            data-mk="Резба"
                            data-sq="Gdhendja"
                            data-en="Wood carving"
                        >Резба</h3>
                        <p
                            class="text-gray-200 text-sm leading-relaxed"
                            data-mk="Рачно изработени резби создадени со грижа, вештина и претворајќи ги едноставните материјали во значајни уметнички дела."
                            data-sq="Gdhendje të punuara me dorë, të krijuara me kujdes, aftësi dhe duke i kthyer materialet e thjeshta në vepra arti të rëndësishme."
                            data-en="Hand-crafted carvings created with care, skill and transforming simple materials into meaningful works of art."
                        >Рачно изработени резби создадени со грижа, вештина и претворајќи ги едноставните материјали во значајни уметнички дела.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- E-VESNIK -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center mb-10">
                <h2
                    class="text-2xl md:text-3xl font-bold text-[#0f172a]"
                    data-mk="Е-весник"
                    data-sq="E-gazetë"
                    data-en="E-newspaper"
                >Е-весник</h2>
                <a href="#"
                    class="bg-[#315b96] hover:bg-blue-800 text-white px-4 md:px-6 py-2.5 rounded-md text-xs md:text-sm font-medium transition shadow-sm flex items-center gap-2"
                    data-mk="Превземи Е-весник"
                    data-sq="Shkarko E-gazetën"
                    data-en="Download E-newspaper"
                >Превземи Е-весник</a>
            </div>
            <div class="flex flex-row bg-white shadow-2xl rounded-sm overflow-hidden max-w-5xl mx-auto">
                <div class="vesnik-img w-1/2 relative bg-black min-h-[200px] md:min-h-[500px]">
                    <img src="https://images.unsplash.com/photo-1518049362265-f5b249d01f18?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Typewriter" class="absolute inset-0 w-full h-full object-cover grayscale opacity-70">
                    <div class="absolute top-0 bottom-0 left-2 md:left-6 w-4 md:w-12 bg-red-600"></div>
                    <div class="absolute top-8 md:top-16 left-1/2 -translate-x-1/2 bg-gray-100 px-3 md:px-8 py-1 md:py-2 border border-gray-300 shadow-md whitespace-nowrap">
                        <h3 class="text-2xl md:text-5xl font-serif font-bold italic tracking-widest text-black">ИСКРА</h3>
                    </div>
                </div>
                <div class="w-1/2 p-3 md:p-10 text-[9px] md:text-xs text-gray-800 relative overflow-hidden">
                    <p
                        class="mb-4 md:mb-8 text-justify leading-relaxed"
                        data-mk="Осуденичкиот весник „Искра" е периодично списание изготвувано од страна на вработени во затворските установи, во соработка со лица кои издржуваат затворска казна."
                        data-sq="Gazeta e të dënuarve \"Iskra\" është një revistë periodike e përgatitur nga punonjësit e institucioneve burgu, në bashkëpunim me personat që vuajnë dënimin me burgim."
                        data-en="The prisoner newspaper \"Iskra\" is a periodical magazine prepared by employees of prison institutions, in cooperation with persons serving prison sentences."
                    >Осуденичкиот весник „Искра" е периодично списание изготвувано од страна на вработени во затворските установи, во соработка со лица кои издржуваат затворска казна.</p>
                    <div class="mb-4 md:mb-8 relative pr-14 md:pr-28">
                        <h4
                            class="font-bold mb-1 text-black"
                            data-mk="Автор и уредник:"
                            data-sq="Autor dhe redaktor:"
                            data-en="Author and editor:"
                        >Автор и уредник:</h4>
                        <p
                            data-mk="М-р Александар Ковилоски (сектор за ресоцијализација во КПД Идризово)"
                            data-sq="M-r Aleksandar Koviloski (sektori i risocializimit në KPD Idrizovo)"
                            data-en="M.Sc. Aleksandar Koviloski (resocialisation sector at KPD Idrizovo)"
                        >М-р Александар Ковилоски (сектор за ресоцијализација во КПД Идризово)</p>
                        <div class="absolute right-1 md:right-4 top-0 w-10 md:w-20 flex flex-col gap-1">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Profile" class="w-full h-8 md:h-16 object-cover border border-gray-300">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Profile" class="w-full h-8 md:h-16 object-cover border border-gray-300">
                        </div>
                        <div class="absolute right-0 top-0 bottom-0 w-1 bg-red-600"></div>
                    </div>
                    <div class="relative pl-6">
                        <div class="absolute left-0 top-0 bottom-0 w-4 bg-red-600"></div>
                        <h4
                            class="font-bold mb-1 text-black"
                            data-mk="В. Д. директор на КПД Идризово:"
                            data-sq="Drejtor i përkohshëm i KPD Idrizovo:"
                            data-en="Acting director of KPD Idrizovo:"
                        >В. Д. директор на КПД Идризово:</h4>
                        <p
                            class="mb-4"
                            data-mk="М-р Зоран Јовановски"
                            data-sq="M-r Zoran Jovanovski"
                            data-en="M.Sc. Zoran Jovanovski"
                        >М-р Зоран Јовановски</p>
                        <h4
                            class="font-bold mb-1 text-black"
                            data-mk="Својот придонес во овој број го дадоа:"
                            data-sq="Kontribuan në këtë numër:"
                            data-en="Contributors to this issue:"
                        >Својот придонес во овој број го дадоа:</h4>
                        <ul class="space-y-1 mb-6 text-gray-700">
                            <li
                                data-mk="Ф. (осудено лице во женскиот дел од КПД Идризово)"
                                data-sq="F. (person i dënuar në seksionin femëror të KPD Idrizovo)"
                                data-en="F. (convicted person in the female section of KPD Idrizovo)"
                            >Ф. (осудено лице во женскиот дел од КПД Идризово)</li>
                            <li
                                data-mk="Осуденички од женскиот дел на КПД Идризово"
                                data-sq="Të dënuara nga seksioni femëror i KPD Idrizovo"
                                data-en="Convicted women from the female section of KPD Idrizovo"
                            >Осуденички од женскиот дел на КПД Идризово</li>
                            <li
                                data-mk="С.Н. (осудено лице во КПД Идризово)"
                                data-sq="S.N. (person i dënuar në KPD Idrizovo)"
                                data-en="S.N. (convicted person in KPD Idrizovo)"
                            >С.Н. (осудено лице во КПД Идризово)</li>
                            <li
                                data-mk="М.М. (осудено лице во КПД Идризово)"
                                data-sq="M.M. (person i dënuar në KPD Idrizovo)"
                                data-en="M.M. (convicted person in KPD Idrizovo)"
                            >М.М. (осудено лице во КПД Идризово)</li>
                            <li
                                data-mk="Д.Т. (осудено лице во КПД Идризово)"
                                data-sq="D.T. (person i dënuar në KPD Idrizovo)"
                                data-en="D.T. (convicted person in KPD Idrizovo)"
                            >Д.Т. (осудено лице во КПД Идризово)</li>
                            <li
                                data-mk="Ч.Д. (осудено лице во КПД Идризово)"
                                data-sq="Ch.D. (person i dënuar në KPD Idrizovo)"
                                data-en="Ch.D. (convicted person in KPD Idrizovo)"
                            >Ч.Д. (осудено лице во КПД Идризово)</li>
                        </ul>
                        <h4
                            class="font-bold mb-1 text-black"
                            data-mk="Техничка обработка:"
                            data-sq="Përpunim teknik:"
                            data-en="Technical processing:"
                        >Техничка обработка:</h4>
                        <p
                            data-mk="Александар Ковилоски (сектор за ресоцијализација во КПД Идризово)"
                            data-sq="Aleksandar Koviloski (sektori i risocializimit në KPD Idrizovo)"
                            data-en="Aleksandar Koviloski (resocialisation sector at KPD Idrizovo)"
                        >Александар Ковилоски (сектор за ресоцијализација во КПД Идризово)</p>
                    </div>
                    <p
                        class="text-right font-bold text-[10px] mt-10 text-black"
                        data-mk="Првиот број од весникот излезе во 2019 година."
                        data-sq="Numri i parë i gazetës doli në vitin 2019."
                        data-en="The first issue of the newspaper was published in 2019."
                    >Првиот број од весникот излезе во 2019 година.</p>
                </div>
            </div>
        </div>
    </section>

<section class="py-16 bg-gradient-to-br from-[#c8dcf0] via-[#85a8d0] to-[#517bb2]">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- ГЛАВЕН НАСЛОВ И КОПЧЕ НАЈГОРЕ --}}
        <div class="flex justify-between items-center mb-12">
            <h2
                class="text-2xl md:text-3xl font-bold text-[#0f172a]"
                data-mk="Новости и соопштенија"
                data-sq="Lajme dhe njoftime"
                data-en="News and announcements"
            >Новости и соопштенија</h2>
            <a href="{{ url('/Novosti') }}"
                class="bg-[#1d4ed8] text-white px-4 md:px-6 py-2.5 rounded-md text-xs md:text-sm font-bold transition-all duration-300 transform hover:scale-105 shadow-md tracking-wide uppercase"
                data-mk="Прочитај повеќе"
                data-sq="Lexo më shumë"
                data-en="Read more"
            >Прочитај повеќе</a>
        </div>
        
        {{-- НОВИ СООПШТЕНИЈА --}}
        <div class="mb-14">
            <h3
                class="text-[#0f172a] text-xl font-bold mb-8 border-b border-[#0f172a]/10 pb-2 uppercase tracking-wide"
                data-mk="Нови соопштенија"
                data-sq="Njoftime të reja"
                data-en="New announcements"
            >Нови соопштенија</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                {{-- Картичка 1: Административен службеник --}}
                <div class="relative bg-slate-900 rounded-[24px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 h-[380px] group border border-white/10 flex flex-col justify-end">
                    <div class="absolute inset-0 w-full h-full z-0">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 opacity-80">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/90 to-transparent z-10 pointer-events-none"></div>
                    <div class="relative z-20 p-6 flex flex-col justify-end w-full">
                        <div class="space-y-2 mb-5">
                            <h4 class="text-white font-black text-sm uppercase line-clamp-2 leading-snug tracking-tight"
                                data-mk="ИНТЕРЕН ОГЛАС за пополнување на работно место со унапредување на административен службеник"
                                data-sq="SHPALLJE E BRENDSHME për plotësimin e vendit të punës med avancimin e nëpunësit administrativ"
                                data-en="INTERNAL NOTICE for filling a position by promotion of an administrative employee"
                            >ИНТЕРЕН ОГЛАС за пополнување на работно место со унапредување на административен службеник</h4>
                            <p class="text-white text-[11px] leading-relaxed line-clamp-2 text-justify"
                                data-mk="Врз основа на член 30 став 1 алинеја 2 став 3 и став 5, член 48 и член 49 од Законот за административни службеници.."
                                data-sq="Në bazë të nenit 30 paragrafi 1 pika 2 paragrafi 3 dhe paragrafi 5, neni 48 dhen neni 49 të Ligjit për nëpunësit administrativë.."
                                data-en="Based on article 30 paragraph 1 subparagraph 2 paragraph 3 and paragraph 5, article 48 and article 49 of the Law on Administrative Employees.."
                            >Врз основа на член 30 став 1 алинеја 2 став 3 и став 5, член 48 и член 49 од Законот за административни службеници..</p>
                        </div>
<a href="#" class="relative z-50 bg-[#1d4ed8] text-white text-xs font-bold px-5 py-2.5 rounded-lg self-start transition-all duration-300 transform hover:scale-105 shadow-md uppercase tracking-wider block" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>                    </div>
                </div>

                {{-- Картичка 2: Одлука за избор --}}
                <div class="relative bg-slate-900 rounded-[24px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 h-[380px] group border border-white/10 flex flex-col justify-end">
                    <div class="absolute inset-0 w-full h-full z-0">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 opacity-80">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/90 to-transparent z-10 pointer-events-none"></div>
                    <div class="relative z-20 p-6 flex flex-col justify-end w-full">
                        <div class="space-y-2 mb-5">
                            <h4 class="text-white font-black text-sm uppercase line-clamp-2 leading-snug tracking-tight"
                                data-mk="Одлука за избор на кандидати за унапредување на административни службеници"
                                data-sq="Vendim për zgjedhjen e kandidatëve për avancimin e nëpunësve administrativë"
                                data-en="Decision on selection of candidates for promotion of administrative employees"
                            >Одлука за избор на кандидати за унапредување на административни службеници</h4>
                            <p class="text-white text-[11px] leading-relaxed line-clamp-2 text-justify"
                                data-mk="Врз основа на чл. 52 ст.1 од Законот за Административни службеници.."
                                data-sq="Në bazë të nenit 52 par.1 të Ligjit за Nëpunësit Administrativë.."
                                data-en="Based on art. 52 par.1 of the Law on Administrative Employees.."
                            >Врз основа на чл. 52 ст.1 од Законот за Административни службеници..</p>
                        </div>
                        <a href="#" class="bg-[#1d4ed8] text-white text-xs font-bold px-5 py-2.5 rounded-lg self-start transition-all duration-300 transform hover:scale-105 shadow-md uppercase tracking-wider block" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                </div>

                {{-- Картичка 3: Предлог одлука --}}
                <div class="relative bg-slate-900 rounded-[24px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 h-[380px] group border border-white/10 flex flex-col justify-end">
                    <div class="absolute inset-0 w-full h-full z-0">
                        <img src="https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 opacity-80">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/90 to-transparent z-10 pointer-events-none"></div>
                    <div class="relative z-20 p-6 flex flex-col justify-end w-full">
                        <div class="space-y-2 mb-5">
                            <h4 class="text-white font-black text-sm uppercase line-clamp-2 leading-snug tracking-tight"
                                data-mk="Предлог на одлука за избор на кандидати за унапредување на административни службеници"
                                data-sq="Propozim vendimi për zgjedhjen e kandidatëve për avancimin e nëpunësve administrativë"
                                data-en="Draft decision on selection of candidates for promotion of administrative employees"
                            >Предлог на одлука за избор на кандидати за унапредување на административни службеници</h4>
                            <p class="text-white text-[11px] leading-relaxed line-clamp-2 text-justify"
                                data-mk="Врз основа на чл.52 ст.1 од Законот за Административни службеници.."
                                data-sq="Në bazë të nenit 52 par.1 të Ligjit për Nëpunësit Administrativë.."
                                data-en="Based on art.52 par.1 of the Law on Administrative Employees.."
                            >Врз основа на чл.52 ст.1 од Законот за Административни службеници..</p>
                        </div>
                        <a href="#" class="bg-[#1d4ed8] text-white text-xs font-bold px-5 py-2.5 rounded-lg self-start transition-all duration-300 transform hover:scale-105 shadow-md uppercase tracking-wider block" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ПОСТАРИ СООПШТЕНИЈА --}}
        <div>
            <h3
                class="text-[#0f172a] text-xl font-bold mb-8 border-b border-[#0f172a]/10 pb-2 uppercase tracking-wide"
                data-mk="Постари соопштенија"
                data-sq="Njoftime të mëparshme"
                data-en="Older announcements"
            >Постари соопштенија</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                {{-- Картичка 4: Постари огласи --}}
                <div class="relative bg-slate-900 rounded-[24px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 h-[380px] group border border-white/10 flex flex-col justify-end">
                    <div class="absolute inset-0 w-full h-full z-0">
                        <img src="https://images.unsplash.com/photo-1606857521015-7f9fcf423740?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 opacity-80">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/90 to-transparent z-10 pointer-events-none"></div>
                    <div class="relative z-20 p-6 flex flex-col justify-end w-full">
                        <div class="space-y-2 mb-5">
                            <h4 class="text-white font-black text-sm uppercase line-clamp-2 leading-snug tracking-tight"
                                data-mk="ИНТЕРЕН ОГЛАС за пополнување на работни места со унапредување на административни службеници"
                                data-sq="SHPALLJE E BRENDSHME për plotësimin e vendeve të punës me avancimin e nëpunësve administrativë"
                                data-en="INTERNAL NOTICE for filling positions by promotion of administrative employees"
                            >ИНТЕРЕН ОГЛАС за пополнување на работни места со унапредување на административни службеници</h4>
                            <p class="text-white text-[11px] leading-relaxed line-clamp-2 text-justify"
                                data-mk="Врз основа на член 30 став 1 алинеја 2 став 3 и став 5, член 48 и член 49 од Законот за административни службеници.."
                                data-sq="Në bazë të nenit 30 paragrafi 1 pika 2 paragrafi 3 dhe paragrafi 5, neni 48 dhen neni 49 të Ligjit për nëpunësit administrativë.."
                                data-en="Based on article 30 paragraph 1 subparagraph 2 paragraph 3 and paragraph 5, article 48 and article 49 of the Law on Administrative Employees.."
                            >Врз основа на член 30 став 1 алинеја 2 став 3 и став 5, член 48 i член 49 од Законот за административни службеници..</p>
                        </div>
                        <a href="#" class="bg-[#1d4ed8] text-white text-xs font-bold px-5 py-2.5 rounded-lg self-start transition-all duration-300 transform hover:scale-105 shadow-md uppercase tracking-wider block" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                </div>

                {{-- Картичка 5: Затворска полиција --}}
                <div class="relative bg-slate-900 rounded-[24px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 h-[380px] group border border-white/10 flex flex-col justify-end">
                    <div class="absolute inset-0 w-full h-full z-0">
                        <img src="https://images.unsplash.com/photo-1541872703-74c5e44368f9?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 opacity-80">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/90 to-transparent z-10 pointer-events-none"></div>
                    <div class="relative z-20 p-6 flex flex-col justify-end w-full">
                        <div class="space-y-2 mb-5">
                            <h4 class="text-white font-black text-sm uppercase line-clamp-2 leading-snug tracking-tight"
                                data-mk="ИНТЕРЕН ОГЛАС за пополнување на работни места со унапредување на припадници на затворска полиција"
                                data-sq="SHPALLJE E BRENDSHME për plotësimin e vendeve të punës me avancimin e anëtarëve të policisë burgu"
                                data-en="INTERNAL NOTICE for filling positions by promotion of prison police members"
                            >ИНТЕРЕН ОГЛАС за пополнување на работни места со унапредување на припадници на затворска полиција</h4>
                            <p class="text-white  text-[11px] leading-relaxed line-clamp-2 text-justify"
                                data-mk="Врз основа на член 67 став 1 алинеја 2 од Законот за извршување на санкции.."
                                data-sq="Në bazë të nenit 67 paragrafi 1 pika 2 të Ligjit për ekzekutimin e sanksioneve.."
                                data-en="Based on article 67 paragraph 1 subparagraph 2 of the Law on Execution of Sanctions.."
                            >Врз основа на член 67 став 1 алинеја 2 од Законот за извршување на санкции..</p>
                        </div>
                        <a href="#" class="bg-[#1d4ed8] text-white text-xs font-bold px-5 py-2.5 rounded-lg self-start transition-all duration-300 transform hover:scale-105 shadow-md uppercase tracking-wider block" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                </div>

                {{-- Картичка 6: Јавен оглас --}}
                <div class="relative bg-slate-900 rounded-[24px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 h-[380px] group border border-white/10 flex flex-col justify-end">
                    <div class="absolute inset-0 w-full h-full z-0">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 opacity-80">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/90 to-transparent z-10 pointer-events-none"></div>
                    <div class="relative z-20 p-6 flex flex-col justify-end w-full">
                        <div class="space-y-2 mb-5">
                            <h4 class="text-white font-black text-sm uppercase line-clamp-2 leading-snug tracking-tight"
                                data-mk="Рок за поднесување пријави по Јавниот оглас за вработување на неопределено време бр.1/2025"
                                data-sq="Afati për dorëzimin e aplikacioneve sipas Konkursit Publik për punësim të përhershëm nr.1/2025"
                                data-en="Deadline for submitting applications for the Public Notice for permanent employment no.1/2025"
                            >Рок за поднесување пријави по Јавниот оглас за вработување на неопределено време бр.1/2025</h4>
                            <p class="text-white text-[11px] leading-relaxed line-clamp-2 text-justify"
                                data-mk="Пријавите заедно со документите по Јавниот оглас за вработување на неопределено време на 2025 година..."
                                data-sq="Aplikimet së bashku me dokumentet sipas Konkursit Publik për punësim të përhershëm të vitit 2025..."
                                data-en="Applications together with documents for the Public Notice for permanent employment of 2025..."
                            >Пријавите заедно со документите по Јавниот оглас за вработување на неопределено време на 2025 година...</p>
                        </div>
                        <a href="#" class="bg-[#1d4ed8] text-white text-xs font-bold px-5 py-2.5 rounded-lg self-start transition-all duration-300 transform hover:scale-105 shadow-md uppercase tracking-wider block" data-mk="Види повеќе" data-sq="Shiko më shumë" data-en="See more">Види повеќе</a>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</section>
    <!-- RACNI IZRABOTKI -->
    <section class="py-16 bg-gradient-to-b from-blue-50/50 to-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-6 mb-10">
                <h2
                    class="text-2xl md:text-3xl font-bold text-[#0f172a]"
                    data-mk="Рачни изработки"
                    data-sq="Punë dore"
                    data-en="Handmade crafts"
                >Рачни изработки</h2>
                <a href="{{ url('/Handmade') }}"
                    class="bg-[#315b96] hover:bg-blue-800 text-white px-5 py-4 rounded-md text-xl md:text-2xl font-bold transition shadow-sm flex items-center justify-center w-full md:flex-1 md:ml-10"
                    data-mk="Прочитај повеќе"
                    data-sq="Lexo më shumë"
                    data-en="Read more"
                >Прочитај повеќе</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="relative h-[360px] md:h-[420px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/torba1.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 w-full h-[45%] bg-black/40 backdrop-blur-md p-7 border-t border-white/10 flex flex-col justify-center">
                        <h3 class="text-white text-lg font-bold mb-3 underline decoration-2 underline-offset-4">Lorem Ipsum</h3>
                        <p class="text-gray-200 text-xs leading-relaxed text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="relative h-[360px] md:h-[420px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/pernica.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 w-full h-[45%] bg-black/40 backdrop-blur-md p-7 border-t border-white/10 flex flex-col justify-center">
                        <h3 class="text-white text-lg font-bold mb-3 underline decoration-2 underline-offset-4">Lorem Ipsum</h3>
                        <p class="text-gray-200 text-xs leading-relaxed text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <div class="relative h-[360px] md:h-[420px] rounded-3xl overflow-hidden group cursor-pointer shadow-md">
                    <img src="{{ asset('images/roba.jpg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 w-full h-[45%] bg-black/40 backdrop-blur-md p-7 border-t border-white/10 flex flex-col justify-center">
                        <h3 class="text-white text-lg font-bold mb-3 underline decoration-2 underline-offset-4">Lorem Ipsum</h3>
                        <p class="text-gray-200 text-xs leading-relaxed text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERIJA -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2
                class="text-2xl md:text-3xl font-bold text-[#0f172a] mb-10"
                data-mk="Галерија"
                data-sq="Galeria"
                data-en="Gallery"
            >Галерија</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 mb-4">
                <div class="relative h-[160px] md:h-[220px] rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image1.jpeg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 w-full h-1/3 bg-black/50 backdrop-blur-md flex items-center justify-center">
                        <h3
                            class="text-white text-xs md:text-sm font-bold tracking-wide uppercase"
                            data-mk="Рачни изработки"
                            data-sq="Punë dore"
                            data-en="Handmade crafts"
                        >Рачни изработки</h3>
                    </div>
                </div>
                <div class="relative h-[160px] md:h-[220px] rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image2.jpeg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 w-full h-1/3 bg-black/50 backdrop-blur-md flex items-center justify-center">
                        <h3
                            class="text-white text-xs md:text-sm font-bold tracking-wide uppercase"
                            data-mk="Активности"
                            data-sq="Aktivitete"
                            data-en="Activities"
                        >Активности</h3>
                    </div>
                </div>
                <div class="relative h-[160px] md:h-[220px] rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image3.jpeg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 w-full h-1/3 bg-black/50 backdrop-blur-md flex items-center justify-center">
                        <h3
                            class="text-white text-xs md:text-sm font-bold tracking-wide uppercase"
                            data-mk="Настани"
                            data-sq="Ngjarje"
                            data-en="Events"
                        >Настани</h3>
                    </div>
                </div>
                <div class="relative h-[160px] md:h-[220px] rounded-2xl md:rounded-3xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/image4.jpeg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 w-full h-1/3 bg-black/50 backdrop-blur-md flex items-center justify-center">
                        <h3
                            class="text-white text-xs md:text-sm font-bold tracking-wide uppercase"
                            data-mk="Установа"
                            data-sq="Institucioni"
                            data-en="Institution"
                        >Установа</h3>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-6 gap-3 md:gap-4">
                @foreach(['image5','image6','image7','image8','image9','image10'] as $img)
                <div class="relative h-[120px] md:h-[280px] rounded-xl md:rounded-2xl overflow-hidden group cursor-pointer shadow-sm">
                    <img src="{{ asset('images/'.$img.'.jpeg') }}" alt="" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- RESURSI -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="resources-grid grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-8 lg:gap-12">
                <div class="flex flex-col items-center">
                    <div class="h-36 md:h-48 mb-6 flex items-end justify-center w-full">
                        <img src="{{ asset('images/regulativa.png') }}" alt="" class="max-h-full object-contain opacity-80 hover:-translate-y-2 transition-transform duration-300">
                    </div>
                    <div class="bg-[#6a8bce] w-full rounded-2xl p-8 text-center text-white shadow-md flex-grow">
                        <h3
                            class="text-lg font-bold uppercase tracking-wider mb-6"
                            data-mk="Регулатива"
                            data-sq="Rregullore"
                            data-en="Regulations"
                        >Регулатива</h3>
                        <ul class="space-y-3 text-xs md:text-sm font-semibold uppercase tracking-wide">
                            <li><a href="#"
                                class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                data-mk="Закони"
                                data-sq="Ligje"
                                data-en="Laws"
                            >Закони</a></li>
                            <li><a href="#"
                                class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                data-mk="Правилници"
                                data-sq="Rregullore"
                                data-en="Rulebooks"
                            >Правилници</a></li>
                            <li><a href="#"
                                class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                data-mk="Упатство и протоколи"
                                data-sq="Udhëzime dhe protokolle"
                                data-en="Instructions and protocols"
                            >Упатство и протоколи</a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="h-36 md:h-48 mb-6 flex items-end justify-center w-full">
                        <img src="{{ asset('images/resursi.png') }}" alt="" class="max-h-full object-contain opacity-80 hover:-translate-y-2 transition-transform duration-300">
                    </div>
                    <div class="bg-[#6a8bce] w-full rounded-2xl p-8 text-center text-white shadow-md flex-grow">
                        <h3
                            class="text-lg font-bold uppercase tracking-wider mb-6"
                            data-mk="Ресурси"
                            data-sq="Burime"
                            data-en="Resources"
                        >Ресурси</h3>
                        <ul class="space-y-3 text-xs md:text-sm font-semibold uppercase tracking-wide">
                            <li><a href="#"
                                class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                data-mk="Јавни набавки"
                                data-sq="Prokurime publike"
                                data-en="Public procurement"
                            >Јавни набавки</a></li>
                            <li><a href="#"
                                class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                data-mk="Буџет"
                                data-sq="Buxheti"
                                data-en="Budget"
                            >Буџет</a></li>
                            <li><a href="#"
                                class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                data-mk="Извештаи"
                                data-sq="Raporte"
                                data-en="Reports"
                            >Извештаи</a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="h-36 md:h-48 mb-6 flex items-end justify-center w-full">
                        <img src="{{ asset('images/odnosi.png') }}" alt="" class="max-h-full object-contain opacity-80 hover:-translate-y-2 transition-transform duration-300">
                    </div>
                    <div class="bg-[#6a8bce] w-full rounded-2xl p-8 text-center text-white shadow-md flex-grow">
                        <h3
                            class="text-lg font-bold uppercase tracking-wider mb-6"
                            data-mk="Односи со јавноста"
                            data-sq="Marrëdhëniet me publikun"
                            data-en="Public relations"
                        >Односи со јавноста</h3>
                        <ul class="space-y-3 text-xs md:text-sm font-semibold uppercase tracking-wide">
                            <li><a href="#"
                                class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                data-mk="Информации од јавен карактер"
                                data-sq="Informacione me karakter publik"
                                data-en="Public information"
                            >Информации од јавен карактер</a></li>
                            <li><a href="#"
                                class="underline decoration-1 underline-offset-4 hover:text-blue-100 transition"
                                data-mk="Огласи"
                                data-sq="Shpalljet"
                                data-en="Notices"
                            >Огласи</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DVE KOCKI -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-6 bottom-boxes flex flex-col md:flex-row justify-center items-stretch gap-6">
            <a href="tel:022580312" class="bg-[#0f172a] hover:bg-slate-800 text-white rounded-xl px-6 md:px-8 py-6 flex justify-between items-center w-full md:w-[450px] shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <span
                    class="font-bold text-sm md:text-base"
                    data-mk="Пријави корупција"
                    data-sq="Raporto korrupsionin"
                    data-en="Report corruption"
                >Пријави корупција</span>
                <span class="font-bold text-sm md:text-base tracking-wide">02 25 80 312</span>
            </a>
            <a href="#" class="bg-[#0f172a] hover:bg-slate-800 text-white rounded-xl px-6 md:px-8 py-6 flex items-center w-full md:w-[450px] shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <span
                    class="font-bold text-sm md:text-base leading-snug"
                    data-mk="Годишен план за спречување на корупција"
                    data-sq="Plani vjetor për parandalimin e korrupsionit"
                    data-en="Annual plan for prevention of corruption"
                >Годишен план за спречување на<br>корупција</span>
            </a>
        </div>
    </section>

@endsection