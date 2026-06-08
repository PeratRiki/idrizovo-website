@extends('layouts.app')
@section('title', 'Контакт')
@section('content')

    <!-- CONTACT SECTION -->
    <div id="kontakti"
        class="min-h-screen bg-linear-to-b from-white via-[#2E589E] to-white flex flex-col md:flex-row items-center justify-between p-4 md:p-8 space-y-10 md:space-y-0 md:space-x-10 mx-4 md:m-14">
        <div class="md:w-1/2 space-y-5">
            <h1 class="text-4xl font-extrabold mb-4" data-mk="Контакт" data-sq="Kontakt" data-en="Contact">Контакт</h1>
            <p class="text-sm text-white mb-8"
                data-mk="Доколку имате прашања, потреба од дополнителни информации или сакате да закажете официјална посета, нашиот тим е тука за вас. Секогаш сме достапни за да ви помогнеме околу процедурите, програмите за ресоцијализација или административни прашања."
                data-sq="Nëse keni pyetje, nevojë për informacion shtesë ose dëshironi të caktoni një vizitë zyrtare, ekipi ynë është këtu për ju. Jemi gjithmonë të disponueshëm për t'ju ndihmuar me procedurat, programet e risocializimit ose çështjet administrative."
                data-en="If you have questions, need additional information or want to schedule an official visit, our team is here for you. We are always available to help you with procedures, resocialization programs or administrative matters.">
                Доколку имате прашања, потреба од дополнителни информации или сакате да закажете официјална посета,
                нашиот тим е тука за вас. Секогаш сме достапни за да ви помогнеме околу процедурите, програмите за
                ресоцијализација или административни прашања.
            </p>

            <div class="flex flex-col gap-4 mb-8">
                <div class="bg-white rounded-lg p-4 flex items-center gap-3 shadow-md">
                    <i class="fa-solid fa-phone text-[#315b96]"></i>
                    <span class="text-sm font-medium text-gray-800" data-mk="Телефонски број: 02 25 80 312"
                        data-sq="Numri i telefonit: 02 25 80 312" data-en="Phone number: 02 25 80 312">Телефонски број:
                        02 25 80 312</span>
                </div>
                <div class="bg-white rounded-lg p-4 flex items-center gap-3 shadow-md">
                    <i class="fa-regular fa-envelope text-[#315b96]"></i>
                    <span class="text-sm font-medium text-gray-800" data-mk="Е-пошта: kpuidrizovo@kpuidrizovo.gov.mk"
                        data-sq="Email: kpuidrizovo@kpuidrizovo.gov.mk"
                        data-en="Email: kpuidrizovo@kpuidrizovo.gov.mk">Е-пошта: kpuidrizovo@kpuidrizovo.gov.mk</span>
                </div>
                <div class="bg-white rounded-lg p-4 flex items-center gap-3 shadow-md">
                    <i class="fa-solid fa-location-dot text-[#315b96]"></i>
                    <span class="text-sm font-medium text-gray-800" data-mk="Ул.1 Колонија Идризово бр. 4А"
                        data-sq="Rr.1 Kolonia Idrizovë nr. 4А" data-en="St.1 Idrizovo Colony no. 4А">Ул.1 Колонија
                        Идризово бр. 4А</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-10 shadow-md text-center">
                <h2 class="font-semibold text-gray-900 text-base mb-6" data-mk="Работно време" data-sq="Orari i punës"
                    data-en="Working hours">Работно време</h2>
                <div class="space-y-3 text-sm text-gray-800">
                    <p data-mk="Понеделник - Недела: 08:00 - 16:00"
   data-sq="E hënë - E diel: 08:00 - 16:00"
   data-en="Monday - Sunday: 08:00 - 16:00">
   Понеделник - Недела: 08:00 - 16:00
</p>
                </div>
            </div>
        </div>

        <!-- CONTACT FORM -->
        <div class="bg-white rounded-2xl p-8 md:p-10 shadow-2xl w-full md:w-1/2">
            <h2 class="text-xl font-bold text-center text-gray-900 mb-8" data-mk="Испрати порака" data-sq="Dërgo mesazh"
                data-en="Send a message">Испрати порака</h2>
            <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
                @csrf
                <input type="text" name="name" id="input-name" placeholder="Име и презиме" data-placeholder-mk="Име и презиме"
                    data-placeholder-sq="Emri dhe mbiemri" data-placeholder-en="Full name"
                    class="w-full border border-gray-400 rounded-lg px-4 py-2 text-sm placeholder-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="text" name="prisoner_number" id="input-prison" placeholder="Затворенички број:"
                    data-placeholder-mk="Затворенички број:" data-placeholder-sq="Numri i të burgosurit:"
                    data-placeholder-en="Prisoner number:"
                    class="w-full border border-gray-400 rounded-lg px-4 py-2 text-sm placeholder-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <input type="email" name="email" id="input-email" placeholder="Е-пошта:" data-placeholder-mk="Е-пошта:"
                    data-placeholder-sq="Email:" data-placeholder-en="Email:"
                    class="w-full border border-gray-400 rounded-lg px-4 py-2 text-sm placeholder-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <textarea name="message" id="input-message" rows="10" placeholder="Остави порака.."
                    data-placeholder-mk="Остави порака.." data-placeholder-sq="Lër një mesazh.."
                    data-placeholder-en="Leave a message.."
                    class="w-full border border-gray-400 rounded-xl px-4 py-4 text-sm placeholder-gray-900 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>
                <div class="flex justify-center pt-4">
                    <button type="submit"
                        class="bg-[#0E1B2F] text-white font-semibold rounded-lg px-12 py-3 hover:bg-gray-800 transition-colors duration-200"
                        data-mk="Испрати" data-sq="Dërgo" data-en="Send">Испрати</button>
                </div>
            </form>
        </div>
    </div>

    <!-- BOOK A VISIT -->
    <section class="py-16 px-6 font-sans flex justify-center bg-white">
        <div class="max-w-6xl w-full">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#0a1930] mb-12" data-mk="Закажи посета"
                data-sq="Cakto vizitë" data-en="Book a visit">Закажи посета</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">

                <div class="bg-[#6A92D4] text-white rounded-3xl p-8 flex flex-col items-center text-center shadow-md">
                    <h3 class="text-xl font-bold mb-6" data-mk="Преку телефон" data-sq="Nëpërmjet telefonit"
                        data-en="By phone">Преку телефон</h3>
                    <p class="text-sm font-medium mb-4" data-mk="Понеделник-Четврток" data-sq="E hënë-E enjte"
                        data-en="Monday-Thursday">Понеделник-Четврток</p>
                    <div class="flex gap-6 justify-center text-xs mb-6 w-full">
                        <div>
                            <span class="block mb-1 font-medium" data-mk="Прва смена" data-sq="Turni i parë"
                                data-en="First shift">Прва смена</span>
                            <span class="flex items-center justify-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                08:30-10:30
                            </span>
                        </div>
                        <div>
                            <span class="block mb-1 font-medium" data-mk="Втора смена" data-sq="Turni i dytë"
                                data-en="Second shift">Втора смена</span>
                            <span class="flex items-center justify-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                14:00-18:00
                            </span>
                        </div>
                    </div>
                    <p class="text-sm font-medium mb-1" data-mk="Петок" data-sq="E premte" data-en="Friday">Петок</p>
                    <span class="flex items-center justify-center gap-1 text-xs mb-8">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        8:30-18:00
                    </span>
                    <div class="mt-auto">
                        <button class="bg-[#0E1B2F] text-white text-sm font-bold py-2.5 px-8 rounded-lg hover:bg-gray-800 transition">02 25 80365</button>
                    </div>
                </div>

                <div class="bg-[#6A92D4] text-white rounded-3xl p-8 flex flex-col items-center text-center shadow-md">
                    <h3 class="text-xl font-bold mb-6" data-mk="Закажи Online" data-sq="Cakto Online"
                        data-en="Book Online">Закажи Online</h3>
                    <p class="text-sm leading-relaxed mb-8 font-medium max-w-[16rem]"
                        data-mk="Пополнете го онлајн формуларот за закажување посета и ќе ве контактираме за потврда."
                        data-sq="Plotësoni formularin online për të caktuar vizitën dhe do t'ju kontaktojmë për konfirmim."
                        data-en="Fill in the online form to schedule a visit and we will contact you for confirmation.">
                        Пополнете го онлајн формуларот за закажување посета и ќе ве контактираме за потврда.
                    </p>
                    <div class="mt-auto">
                        <button class="bg-[#0b132b] text-white text-sm font-bold py-2.5 px-6 rounded-lg hover:bg-gray-800 transition"
                            data-mk="Кликни за календар" data-sq="Kliko për kalendar"
                            data-en="Click for calendar">Кликни за календар</button>
                    </div>
                </div>

                <div class="bg-[#6A92D4] text-white rounded-3xl p-8 flex flex-col items-center text-center shadow-md">
                    <h3 class="text-xl font-bold mb-6" data-mk="Преку портирница" data-sq="Nëpërmjet portierës"
                        data-en="Via reception">Преку<br>портирница</h3>
                    <p class="text-sm font-medium mb-2" data-mk="Понеделник-Четврток" data-sq="E hënë-E enjte"
                        data-en="Monday-Thursday">Понеделник-Четврток</p>
                    <p class="text-xs mb-6" data-mk="13:00-14:00 часот" data-sq="13:00-14:00 orë" data-en="13:00-14:00">
                        13:00-14:00 часот</p>
                    <p class="text-sm font-medium mb-3" data-mk="Сабота и недела" data-sq="E shtunë dhe e diel"
                        data-en="Saturday and Sunday">Сабота и недела</p>
                    <div class="space-y-1.5 text-xs">
                        <p data-mk="1 Група: 08:30-09:30" data-sq="1 Grup: 08:30-09:30" data-en="1 Group: 08:30-09:30">1 Група: 08:30-09:30</p>
                        <p data-mk="2 Група: 10:30-11:30" data-sq="2 Grup: 10:30-11:30" data-en="2 Group: 10:30-11:30">2 Група: 10:30-11:30</p>
                        <p data-mk="3 Група: 12:30-13:30" data-sq="3 Grup: 12:30-13:30" data-en="3 Group: 12:30-13:30">3 Група: 12:30-13:30</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- MAP -->
    <section class="py-16 px-6 font-sans bg-white flex justify-center">
        <div class="max-w-5xl w-full">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-[#0a1930] mb-10" data-mk="Мапа" data-sq="Harta"
                data-en="Map">Мапа</h2>
            <div class="w-full bg-gray-200 shadow-md rounded-2xl overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2966.971798067837!2d21.564919600000003!3d41.957940799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13543f300cf6f5ab%3A0xc775d2423b8cd12c!2sPP%20Skopje%20-%20Idrizovo%20Prison!5e0!3m2!1sen!2smk!4v1778111983735!5m2!1sen!2smk"
                    width="100%" height="600" style="border:0; display:block;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

@endsection
