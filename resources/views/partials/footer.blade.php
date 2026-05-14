<!-- FOOTER -->
    <footer class="bg-gray-100 md:bg-transparent pt-4 md:pt-0">
        <div class="md:hidden mx-4 mb-4 bg-[#315b96] rounded-3xl flex flex-col items-center text-center text-white px-6 py-8 gap-3 shadow-xl">
            <img src="{{ asset('images/logo.png') }}" alt="КПУ Идризово" class="h-16 w-auto brightness-0 invert opacity-90 mb-2">
            <a href="{{ url('/') }}" class="hover:text-blue-200 transition-colors text-sm">Дома</a>
            <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-sm">За нас</a>
            <a href="{{ url('/Activities') }}" class="hover:text-blue-200 transition-colors text-sm text-blue-100">Активности</a>
            <a href="{{ url('/Handmade') }}" class="hover:text-blue-200 transition-colors text-sm">Изработки</a>
            <a href="{{ url('/Contact') }}" class="hover:text-blue-200 transition-colors text-sm">Контакт</a>
            <div class="flex items-center gap-3 text-blue-100 text-sm"><i class="fa-solid fa-phone text-blue-200"></i><span>02 25 80 312</span></div>
            <div class="flex items-center gap-3 text-blue-100 text-sm"><i class="fa-regular fa-envelope text-blue-200"></i><span>kpuidrizovo@kpuidrizovo.gov.mk</span></div>
            <div class="flex items-center gap-2 text-blue-100 text-sm"><i class="fa-solid fa-location-dot text-blue-200"></i><span>ул.1 колонија Идризово бр.4A</span></div>
            <a href="#" class="mt-4 bg-[#0f172a] hover:bg-slate-800 text-white font-bold py-3 px-10 rounded-lg transition shadow-md">Закажи посета</a>
        </div>
        <div class="hidden md:block bg-[#315b96] border-t border-blue-800/30 py-8">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center gap-6 lg:gap-10">
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="КПУ Идризово" class="w-20 h-20 md:w-24 md:h-24 object-contain brightness-0 invert opacity-90">
                </div>
                <div class="flex-grow flex justify-center gap-8 lg:gap-14 text-white text-sm items-start">
                    <div class="flex flex-col space-y-2.5">
                        <a href="{{ url('/') }}" class="hover:text-blue-200 transition-colors">Дома</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors">За нас</a>
                        <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs">Историја</a>
                        <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs">Визија</a>
                        <a href="{{ url('/AboutUs') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs">Мисија</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ url('/Novosti') }}" class="hover:text-blue-200 transition-colors">Новости и соопштенија</a>
                        <a href="{{ url('/Activities') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs">Активности</a>
                        <a href="{{ url('/Novosti') }}" class="hover:text-blue-200 transition-colors text-blue-100/80 text-xs">Соопштенија</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ url('/Handmade') }}" class="hover:text-blue-200 transition-colors">Изработки</a>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ url('/Contact') }}" class="hover:text-blue-200 transition-colors">Контакт</a>
                        <div class="flex items-center space-x-2 text-blue-100/80 text-xs"><i class="fa-solid fa-phone"></i><span>02 25 80 312</span></div>
                        <div class="flex items-start space-x-2 text-blue-100/80 text-xs"><i class="fa-regular fa-envelope mt-0.5"></i><span class="break-all">kpuidrizovo@kpuidrizovo.gov.mk</span></div>
                        <div class="flex items-center space-x-2 text-blue-100/80 text-xs"><i class="fa-solid fa-location-dot"></i><span>ул.1 колонија Идризово бр.4A</span></div>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="#" class="inline-block bg-[#0f172a] hover:bg-slate-800 text-white text-sm py-2.5 px-6 rounded transition shadow-md whitespace-nowrap text-center">Закажи посета</a>
                </div>
            </div>
        </div>
    </footer>