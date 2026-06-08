@extends('layouts.app')
@section('title', 'За нас')
@section('content')

    <style>
        #about_us {
            position: relative;
            width: 100%;
            height: 650px;
        }

        @media (max-width: 767px) {
            #about_us {
                height: auto;
                min-height: 420px;
            }

            #about_us h1 {
                font-size: 2rem !important;
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        .sector-icon-placeholder {
            height: 10rem;
            display: flex;
            align-items: flex-end;
            margin-bottom: 1rem;
        }

        @media (max-width: 767px) {
            .sector-icon-placeholder {
                height: 5rem;
                margin-bottom: 0.75rem;
            }
        }

        @media (max-width: 480px) {
            .staff-card {
                min-height: 180px !important;
            }
        }

        @media (max-width: 639px) {
            .sectors-grid {
                grid-template-columns: 1fr !important;
            }
        }

        @media (max-width: 767px) {
            .pravilnik-section {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }
        }
    </style>

    <!-- About Hero -->
    <div id="about_us" class="relative w-full" style="height:650px;">
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/Messenger_creation_1ADAC9BC-9BF5-494E-B7B5-AC6B7B26CBF1.jpeg') }}"
                alt="Hero"
                class="w-full h-full object-cover brightness-110"
            />
        </div>
        <div class="absolute inset-0 bg-black/20"></div>

        <div class="relative z-10 h-full flex flex-col justify-between pt-8 md:pt-36 pb-20 md:pb-12 px-4 md:px-6">
            <h1 class="text-8xl md:text-7xl font-black text-[#101e3d] uppercase tracking-tighter md:px-16 py-24 md:py-0" data-mk="За нас" data-sq="Rreth nesh" data-en="About us">
                За нас
            </h1>

            <div class="flex flex-col gap-4 md:gap-4 w-full md:w-auto">
                <div class="flex flex-col gap-4 md:hidden w-[320px] max-w-full">
                    <a href="javascript:void(0)" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3 px-8 rounded-2xl text-center text-sm uppercase tracking-wider transition-all" data-mk="Историја" data-sq="Historia" data-en="History">Историја</a>
                    <a href="javascript:void(0)" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3 px-8 rounded-2xl text-center text-sm uppercase tracking-wider transition-all" data-mk="Визија" data-sq="Vizioni" data-en="Vision">Визија</a>
                    <a href="javascript:void(0)" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3 px-8 rounded-2xl text-center text-sm uppercase tracking-wider transition-all" data-mk="Мисија" data-sq="Misioni" data-en="Mission">Мисија</a>
                </div>

                <div class="hidden md:flex flex-row gap-4 justify-around">
                    <a href="javascript:void(0)" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3.5 px-14 rounded-lg text-center text-[12px] uppercase tracking-widest transition-all" data-mk="Историја" data-sq="Historia" data-en="History">Историја</a>
                    <a href="javascript:void(0)" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3.5 px-14 rounded-lg text-center text-[12px] uppercase tracking-widest transition-all" data-mk="Визија" data-sq="Vizioni" data-en="Vision">Визија</a>
                    <a href="javascript:void(0)" class="bg-[#3862a8] hover:bg-[#2b5292] text-white font-bold py-3.5 px-14 rounded-lg text-center text-[12px] uppercase tracking-widest transition-all" data-mk="Мисија" data-sq="Misioni" data-en="Mission">Мисија</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Историја Section -->
    <section class="relative bg-white py-12 md:py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-16 items-center">
                <div class="w-full order-2 lg:order-1">
                    <img
                        src="{{ asset('images/Messenger_creation_B317B5D7-CA3E-4593-A061-699FE4B79381.jpeg') }}"
                        alt="Историја"
                        class="rounded-2xl md:rounded-[3rem] w-full h-auto object-cover grayscale shadow-sm"
                    >
                </div>
                <div class="order-1 lg:order-2">
                    <h2 class="text-2xl md:text-4xl font-black text-[#101e3d] mb-6 md:mb-8" data-mk="Историја" data-sq="Historia" data-en="History">Историја</h2>
                    <div class="space-y-4 md:space-y-6 text-sm md:text-[16px] text-gray-700 leading-relaxed font-medium">
                        <p data-mk="Казнено-Поправниот Дом Идризово е најголемата затворска установа во Република С. Македонија. Таа се наоѓа околу 10 километри југоисточно од Скопје и претставува централна установа за издржување затворски казни." data-sq="Shtëpia e Punës Penale Idrizovo është institucion më i madh i burgimit në Republikën e Maqedonisë. Ndodhet rreth 10 kilometra në jugolindje të Shkupit dhe përfaqëson institucionin qendror për ekzekutimin e dënimeve me burg." data-en="The Penal Prison House Idrizovo is the largest correctional facility in the Republic of Macedonia. It is located about 10 kilometers southeast of Skopje and represents the central facility for serving prison sentences.">
                            Казнено-Поправниот Дом Идризово е најголемата затворска установа
                            во Република С. Македонија. Таа се наоѓа околу 10 километри
                            југоисточно од Скопје и претставува централна установа за
                            издржување затворски казни.
                        </p>
                        <p data-mk="Историјата на КПД Идризово започнува во текот на Втората светска војна, кога е изграден војни камп од страна на бугарската окупаторска војска. Веднаш по завршувањето на Втората светска војна продолжува да функционира како затвор – работна колонија." data-sq="Histori i KPD Idrizovo fillon gjatë Luftës së Dytë Botërore, kur një kampi ushtarak ishte ndërtuar nga ushtria okupuese bullgare. Menjëherë pas përfundimit të Luftës së Dytë Botërore, ajo vazhdoi të funksionojë si burg - koloni pune." data-en="The history of KPD Idrizovo began during World War II, when a military camp was built by the Bulgarian occupying army. Immediately after the end of World War II, it continued to function as a prison - a labor colony.">
                            Историјата на КПД Идризово започнува во текот на Втората светска
                            војна, кога е изграден војни камп од страна на бугарската окупаторска
                            војска. Веднаш по завршувањето на Втората светска војна продолжува
                            да функционира како затвор – работна колонија.
                        </p>
                    </div>
                    <button class="mt-6 md:mt-8 text-[#101e3d] font-bold text-sm md:text-[15px] underline underline-offset-8 decoration-2 hover:opacity-60 transition" data-mk="Прочитај повеќе" data-sq="Lexo më shumë" data-en="Read more">
                        Прочитај повеќе
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Управа Section -->
    <section class="relative bg-white pb-12 md:pb-24">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <h2 class="text-2xl md:text-4xl font-black text-[#101e3d] mb-8 md:mb-16" data-mk="Управа" data-sq="Administrata" data-en="Administration">Управа</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 md:gap-12 lg:gap-24 max-w-5xl mx-auto">
                <div class="text-center group">
                    <div class="relative rounded-2xl md:rounded-[2.5rem] overflow-hidden bg-gradient-to-b from-[#6b96d3] to-[#2b5292] aspect-[4/3] mb-4 md:mb-6">
                        <img src="{{ asset('images/Messenger_creation_6F31227D-9604-426B-8046-C10830AC0462.jpeg') }}" alt="Директор" class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[90%] h-auto object-cover">
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-[#101e3d]">М-р. Зоран Јовановски</h3>
                    <p class="text-[10px] md:text-[11px] uppercase tracking-[0.2em] text-gray-400 font-black mt-2" data-mk="Директор" data-sq="Drejtori" data-en="Director">Директор</p>
                </div>
                <div class="text-center group">
                    <div class="relative rounded-2xl md:rounded-[2.5rem] overflow-hidden bg-gradient-to-b from-[#6b96d3] to-[#2b5292] aspect-[4/3] mb-4 md:mb-6">
                        <img src="" alt="Заменик Директор" class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[90%] h-auto object-contain">
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-[#101e3d]">Наим Љамалари</h3>
                    <p class="text-[10px] md:text-[11px] uppercase tracking-[0.2em] text-gray-400 font-black mt-2" data-mk="Заменик директор" data-sq="Zëvendësdrejtori" data-en="Deputy Director">Заменик директор</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Одговорни Службени Лица Section -->
    <section class="bg-white py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <h2 class="text-2xl md:text-4xl font-black text-[#101e3d] text-center mb-8 md:mb-16" data-mk="Одговорни службени лица" data-sq="Persona zyrtar përgjegjës" data-en="Responsible officials">
                Одговорни службени лица
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold mb-3">Разије Osmanи Хоџа</h3>
                        <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Лице за посредување со информации" data-sq="Person për ndërmjetësimin e informacionit" data-en="Person for intermediating information">Лице за посредување со информации</p>
                    </div>
                    <a href="mailto:razije@kpuidrizovo.gov.mk" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                        <i class="fa-regular fa-envelope text-sm"></i>
                        <span class="break-all">razije@kpuidrizovo.gov.mk</span>
                    </a>
                </div>
                <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold mb-3">Горан Јовчевски</h3>
                        <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Лице за заштитено внатрешно пријавување" data-sq="Person për raportime të mbrojtur të brendshme" data-en="Person for protected internal reporting">Лице за заштитено внатрешно пријавување</p>
                    </div>
                    <a href="mailto:prijava@kpuidrizovo.gov.mk" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                        <i class="fa-regular fa-envelope text-sm"></i>
                        <span class="break-all">prijava@kpuidrizovo.gov.mk</span>
                    </a>
                </div>
                <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold mb-3">Виолета Тепеѓозова</h3>
                        <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Раководител на одделение за човечки ресурси" data-sq="Drejtori i departamentit të burimeve njerëzore" data-en="Head of human resources department">Раководител на одделение за човечки ресурси</p>
                    </div>
                    <a href="mailto:violeta.tepegozova@kpuidrizovo.gov.mk" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                        <i class="fa-regular fa-envelope text-sm"></i>
                        <span class="break-all">violeta.tepegozova@kpuidrizovo.gov.mk</span>
                    </a>
                </div>
                <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold mb-3">Владимир Арсковски</h3>
                        <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Раководител на сектор за општо-правни работи и јавни набавки" data-sq="Drejtori i sektorit për punë të përgjithshme ligjore dhe prokurimit publik" data-en="Head of general legal affairs and public procurement sector">Раководител на сектор за општо-правни работи и јавни набавки</p>
                    </div>
                    <a href="mailto:vladimirarsovski@gmail.com" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                        <i class="fa-regular fa-envelope text-sm"></i>
                        <span class="break-all">vladimirarsovski@gmail.com</span>
                    </a>
                </div>
                <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold mb-3">Африм Незири</h3>
                        <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Раководител на сектор за ресоцијализација" data-sq="Drejtori i sektorit për riintegrimin" data-en="Head of rehabilitation sector">Раководител на сектор за ресоцијализација</p>
                    </div>
                    <a href="mailto:kpuidrizovo@kpuidrizovo.gov.mk" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                        <i class="fa-regular fa-envelope text-sm"></i>
                        <span class="break-all">kpuidrizovo@kpuidrizovo.gov.mk</span>
                    </a>
                </div>
                <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold mb-3">Цветков Љупчо</h3>
                        <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Помошник раководител во сектор за ресоцијализација" data-sq="Zëvendës-drejtori në sektorin e riintegrimit" data-en="Deputy head in rehabilitation sector">Помошник раководител во сектор за ресоцијализација</p>
                    </div>
                    <a href="mailto:ljupco.cvetkov73@gmail.com" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                        <i class="fa-regular fa-envelope text-sm"></i>
                        <span class="break-all">ljupco.cvetkov73@gmail.com</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 max-w-2xl mx-auto mt-8 md:mt-12">
                <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold mb-3">Марија Цветкова</h3>
                        <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Раководител во отворено одделение Велес" data-sq="Drejtore në degën e hapë të Veles" data-en="Head of open section in Veles">Раководител во отворено одделение Велес</p>
                    </div>
                    <a href="mailto:otvorenooddelenieveles@yahoo.com" class="flex items-center justify-center gap-2 text-[11px] md:text-[12px] hover:underline mt-4">
                        <i class="fa-regular fa-envelope text-sm"></i>
                        <span class="break-all">otvorenooddelenieveles@yahoo.com</span>
                    </a>
                </div>
                <div class="staff-card bg-[#6A92D4] text-white rounded-2xl md:rounded-3xl p-6 md:p-8 text-center flex flex-col justify-between min-h-[220px] md:min-h-[280px] shadow-md hover:shadow-lg transition">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold mb-3">Игор Кокалински</h3>
                        <p class="text-[11px] md:text-[12px] uppercase tracking-wider font-semibold opacity-95 leading-tight" data-mk="Заповедник во затворска полиција" data-sq="Komandant në policinë e burgut" data-en="Commander in prison police">Заповедник во затворска полиција</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Правилник Section -->
    <section class="pravilnik-section bg-white py-12 md:py-20">
        <div class="max-w-4xl mx-auto px-4 md:px-6 text-center">
            <h2 class="text-2xl md:text-[32px] font-black text-[#101e3d] uppercase tracking-wider mb-4 md:mb-6" data-mk="Правилник" data-sq="Rregullore" data-en="Regulations">Правилник</h2>
            <h3 class="text-lg md:text-2xl font-bold text-[#101e3d] leading-snug mb-6 md:mb-10" data-mk="за внатрешна организација и работа на Казнено-поправната установа - Казнено-поправен дом Идризово со Отворено одделение во Велес" data-sq="për organizimin e brendshëm dhe funksionimin e Institucioni Penal - Shtëpia e Punës Penale Idrizovo me degën e hapur në Veles" data-en="on internal organization and operation of the Penal Institution - Penal Prison House Idrizovo with Open Section in Veles">
                за внатрешна организација и работа на Казнено-поправната установа - <br class="hidden md:block">
                Казнено-поправен дом Идризово со Отворено одделение во Велес
            </h3>
            <p class="text-gray-600 text-sm md:text-[15px] leading-relaxed font-medium mb-8 md:mb-12 px-4 md:px-10" data-mk="Со овој Правилник се уредува организацијата и работата на Казнено-поправната установа - Казнено-поправниот дом Идризово - со отворено одделение во Велес (во понатамошниот текст: Установата), се утврдуваат внатрешната организација, видот на организационите единици и нивниот делокруг на работење, раководење во Установата и во организационите единици, програмирањето и извршувањето на работите и задачите во установата." data-sq="Me këtë Rregullore rregullohet organizimi dhe funksionimi i Institucioni Penal - Shtëpia e Punës Penale Idrizovo - me degën e hapur në Veles (në tekstin e mëtejshëm: Institucioni), përcaktohet organizimi i brendshëm, lloji i njësive organizative dhe rreth i tyre punës, drejtimi në Institucioni dhe në njësitë organizative, planifikimi dhe ekzekutimi i punëve dhe detyrave në institucioni." data-en="This Regulation governs the organization and operation of the Penal Institution - Penal Prison House Idrizovo - with an open section in Veles (hereinafter: the Institution), establishes internal organization, the type of organizational units and their scope of work, management in the Institution and in organizational units, planning and execution of work and tasks in the institution.">
                Со овој Правилник се уредува организацијата и работата на Казнено-поправната установа - Казнено-поправниот дом Идризово - со отворено одделение во Велес (во понатамошниот текст: Установата), се утврдуваат внатрешната организација, видот на организационите единици и нивниот делokруг на работење, раководење во Установата и во организационите единици, програмирањето и извршувањето на работите и задачите во установата.
            </p>
            <a href="{{ asset('storage/pravilnik/pravilnik-za-vnatresna-organizacija.pdf') }}" download  class="inline-block bg-[#101e3d] text-white font-bold px-8 md:px-12 py-3 md:py-4 rounded-xl hover:bg-[#1a2e5a] transition-all duration-300 shadow-md uppercase tracking-widest text-xs md:text-sm" data-mk="Превземи" data-sq="Shkarko" data-en="Download">Превземи</a>
        </div>
    </section>

    <!-- Сектори Section -->
    <section class="relative py-12 md:py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-white via-[#7195d1]/40 to-white -z-10"></div>
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <h2 class="text-2xl md:text-4xl font-black text-[#101e3d] mb-8 md:mb-20" data-mk="Сектори" data-sq="Sektore" data-en="Sectors">Сектори</h2>
            <div class="sectors-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-x-10 md:gap-y-24">
                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder"></div>
                    <div class="bg-[#7195d1]/40 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[200px] md:min-h-[220px] shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider mb-3 md:mb-5 leading-tight" data-mk="Сектор за ресоцијализација" data-sq="Sektori i riintegrimit" data-en="Rehabilitation Sector">Сектор за ресоцијализација</h3>
                        <ul class="text-[11px] md:text-[12px] space-y-1 md:space-y-2 opacity-95 font-medium leading-relaxed">
                            <li data-mk="1. Одделение за прием" data-sq="1. Departamenti i pranimit" data-en="1. Reception Department">1. Одделение за прием</li>
                            <li data-mk="2. Одделение за третман" data-sq="2. Departamenti i trajtimit" data-en="2. Treatment Department">2. Одделение за третман</li>
                            <li data-mk="3. Одделение за стручно инструкторски работи" data-sq="3. Departamenti për punë instruksioni në specialitet" data-en="3. Specialized Instructional Work Department">3. Одделение за стручно инструкторски работи</li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder"></div>
                    <div class="bg-[#7195d1]/40 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[200px] md:min-h-[220px] shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider mb-3 md:mb-5 leading-tight" data-mk="Сектор за општи-правни работи и јавни набавки" data-sq="Sektori për punë të përgjithshme ligjore dhe prokurimit publik" data-en="General Legal Affairs and Public Procurement Sector">Сектор за општи-правни работи и јавни набавки</h3>
                        <ul class="text-[11px] md:text-[12px] space-y-1 md:space-y-2 opacity-95 font-medium leading-relaxed">
                            <li data-mk="1. Одделение за општи-правни работи" data-sq="1. Departamenti për punë të përgjithshme ligjore" data-en="1. General Legal Affairs Department">1. Одделение за општи-правни работи</li>
                            <li data-mk="2. Одделение за јавни набавки" data-sq="2. Departamenti i prokurimit publik" data-en="2. Public Procurement Department">2. Одделение за јавни набавки</li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder"></div>
                    <div class="bg-[#7195d1]/40 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[200px] md:min-h-[220px] shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider mb-3 md:mb-5 leading-tight" data-mk="Сектор за финансиски прашања" data-sq="Sektori për çështje financiare" data-en="Financial Affairs Sector">Сектор за финансиски прашања</h3>
                        <ul class="text-[11px] md:text-[12px] space-y-1 md:space-y-2 opacity-95 font-medium leading-relaxed">
                            <li data-mk="1. Одделение за буџетска координација и контрола" data-sq="1. Departamenti i koordinimit dhe kontrollit buxhetor" data-en="1. Budget Coordination and Control Department">1. Одделение за буџетска координација и контрола</li>
                            <li data-mk="2. Одделение за сметководство и плаќање" data-sq="2. Departamenti i kontabilitetit dhe pagesave" data-en="2. Accounting and Payments Department">2. Одделение за сметководство и плаќање</li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder"></div>
                    <div class="bg-[#7195d1]/20 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[160px] flex items-center justify-center text-center shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider leading-tight" data-mk="Одделение за управување со човечки ресурси" data-sq="Departamenti për menaxhimin e burimeve njerëzore" data-en="Human Resources Management Department">Одделение за управување со човечки ресурси</h3>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder"></div>
                    <div class="bg-[#7195d1]/20 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[160px] flex items-center justify-center text-center shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider leading-tight" data-mk="Отворено одделение Велес" data-sq="Degë e hapur në Veles" data-en="Open Section Veles">Отворено одделение Велес</h3>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="sector-icon-placeholder"></div>
                    <div class="bg-[#7195d1]/20 backdrop-blur-md text-white rounded-xl md:rounded-[2.5rem] p-4 md:p-8 w-full min-h-[160px] flex items-center justify-center text-center shadow-lg border border-white/20">
                        <h3 class="text-[13px] md:text-[15px] font-black uppercase tracking-wider leading-tight" data-mk="Сектор на затворска полиција" data-sq="Sektori i policisë burgjake" data-en="Prison Police Sector">Сектор на затворска полиција</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
