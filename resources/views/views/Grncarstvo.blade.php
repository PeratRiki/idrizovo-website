@extends('layouts.app')
@section('title', 'Грнчарство')
@section('content')

<div class="bg-gradient-to-b from-blue-100 to-blue-300 min-h-screen p-6 md:p-10 flex flex-col items-center">

    {{-- HEADER СТРЕЛКА И НАСЛОВ --}}
    <div class="w-full max-w-5xl mb-14 flex items-center gap-5 mt-4">
        {{-- Темно сино заоблено копче за назад --}}
        <a href="{{ url('/Handmade') }}"
           style="background-color: #163b67;"
           class="w-12 h-12 rounded-full text-white transition flex items-center justify-center shadow-lg shrink-0 transform hover:-translate-x-1 hover:opacity-90 duration-200">
            <i class="fa-solid fa-chevron-left text-base"></i>
        </a>

        <h1 class="text-2xl sm:text-3xl font-black text-[#163b67] uppercase tracking-wide"
            data-mk="Грнчарство: Обликување на надежта"
            data-sq="Punë balte: Formësimi i shpresës"
            data-en="Pottery: Shaping Hope">
            Грнчарство: Обликување на надежта
        </h1>
    </div>

    @php
    $products = [
        [
            'image' => 'grnicarstvo1.jpg',
            'title' => 'Глинена вазна',
            'desc' => 'Елегантна рачно изработена вазна од глина со традиционален дезен.',
            'title_sq' => 'Vazo balte',
            'desc_sq' => 'Vazo elegante prej balte e punuar me dorë me dizajn tradicional.',
            'title_en' => 'Clay Vase',
            'desc_en' => 'Elegant handmade clay vase with a traditional pattern.'
        ],
        [
            'image' => 'grnicarstvo2.jpg',
            'title' => 'Грнчарски сад',
            'desc' => 'Уникатен украсен и функционален глинен сад за вашиот дом.',
            'title_sq' => 'Enë balte',
            'desc_sq' => 'Enë balte unike dekorative dhe funksionale për shtëpinë tuaj.',
            'title_en' => 'Pottery Bowl',
            'desc_en' => 'Unique decorative and functional clay bowl for your home.'
        ],
        [
            'image' => 'grnicarstvo3.jpg',
            'title' => 'Традиционално грне',
            'desc' => 'Класично македонско глинено грне изработено на грнчарско тркало.',
            'title_sq' => 'Gjezve tradicionale',
            'desc_sq' => 'Enë tradicionale maqedonase e punuar në rrotën e argjilës.',
            'title_en' => 'Traditional Clay Pot',
            'desc_en' => 'Classic Macedonian clay pot crafted on a pottery wheel.'
        ],
        [
            'image' => 'grnicarstvo4.jpg',
            'title' => 'Декоративна чинија',
            'desc' => 'Рачно обоена глинена чинија со автентични мотиви.',
            'title_sq' => 'Pjatë dekorative',
            'desc_sq' => 'Pjatë balte e lyer me dorë me motive autentike.',
            'title_en' => 'Decorative Plate',
            'desc_en' => 'Hand-painted clay plate with authentic motifs.'
        ],
        [
            'image' => 'grnicarstvo2.jpg',
            'title' => 'Глинена стомна',
            'desc' => 'Прекрасно обликувана стомна која ја чува традицијата на занаетот.',
            'title_sq' => 'Brokë balte',
            'desc_sq' => 'Brokë e modeluar bukur që ruan traditën e këtij zanati.',
            'title_en' => 'Clay Pitcher',
            'desc_en' => 'Beautifully shaped clay pitcher that preserves the tradition of the craft.'
        ],
        [
            'image' => 'grnicarstvo1.jpg',
            'title' => 'Уметнички сувенир',
            'desc' => 'Мал уникатен сувенир изработен со многу внимание и трпение.',
            'title_sq' => 'Suvenir artistik',
            'desc_sq' => 'Suvenir i vogël unik i punuar me shumë kujdes dhe durim.',
            'title_en' => 'Artistic Souvenir',
            'desc_en' => 'Small unique souvenir crafted with high care and patience.'
        ],
    ];
    @endphp

    {{-- GRID СО ИСТОТО СОВРШЕНО РАСТОЈАНИЕ (gap-8) --}}
    <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($products as $product)
        {{-- КАРТИЧКА --}}
        <div class="w-full max-w-[320px] mx-auto bg-white rounded-[24px] border border-[#e2eefc] shadow-[0_8px_30px_rgb(22,59,103,0.06)] hover:shadow-[0_20px_40px_rgb(22,59,103,0.12)] hover:-translate-y-1.5 transition duration-300 flex flex-col h-full">
            
            {{-- ЦЕЛОСНО ОДВОЕНА И ЗАОБЛЕНА СЛИКА --}}
            <div class="p-4 shrink-0">
                <div class="h-[200px] w-full overflow-hidden rounded-[20px] bg-gray-50 relative group shadow-sm">
                    <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 rounded-[20px]">
                    <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition duration-300 rounded-[20px]"></div>
                </div>
            </div>

            {{-- СОДРЖИНА --}}
            <div class="p-6 pt-2 flex flex-col flex-grow text-center justify-between">
                <div>
                    <h2 class="text-[#163b67] text-lg font-bold mb-2.5 leading-snug min-h-[50px] flex items-center justify-center"
                        data-mk="{{ $product['title'] }}"
                        data-sq="{{ $product['title_sq'] }}"
                        data-en="{{ $product['title_en'] }}">
                        {{ $product['title'] }}
                    </h2>
                    <p class="text-gray-500 text-sm leading-relaxed px-2 line-clamp-3"
                        data-mk="{{ $product['desc'] }}"
                        data-sq="{{ $product['desc_sq'] }}"
                        data-en="{{ $product['desc_en'] }}">
                        {{ $product['desc'] }}
                    </p>
                </div>
                <button onclick="openModal()" style="background-color: #163b67;" class="mt-6 w-full text-white py-3 px-6 rounded-xl text-sm font-bold tracking-wide shadow-md hover:opacity-95 transition active:scale-[0.98] h-[48px] flex items-center justify-center shrink-0" data-mk="Резервирај" data-sq="Rezervo" data-en="Reserve">
                    Резервирај
                </button>
            </div>
        </div>
        @endforeach

    </div>

    {{-- MODAL --}}
    <div id="modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-md transition-opacity" onclick="closeModal()"></div>
        
        <div class="relative bg-white rounded-[28px] shadow-2xl p-8 w-full max-w-md text-center z-10 border border-blue-50 transform transition-all">
            <button onclick="closeModal()" class="absolute top-4 right-5 text-gray-400 hover:text-gray-600 text-xl font-medium transition">✕</button>

            <div class="w-16 h-16 bg-blue-50 text-[#163b67] rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                <i class="fa-solid fa-phone-volume"></i>
            </div>

            <h3 class="text-xl font-black text-[#163b67] mb-3">Резервација</h3>

            <div class="text-gray-600 text-base leading-relaxed mb-6">
                <p data-mk="На бројот 07X XXX XXX јавете се за да ја резервирате вашата нарачка."
                   data-sq="Në numrin 07X XXX XXX telefononi për të rezervuar porosinë tuaj."
                   data-en="Call 07X XXX XXX to reserve your order.">
                    Јавете се на бројот <span class="block text-xl font-bold text-[#163b67] mt-2 underline tracking-wider">07X XXX XXX</span> за да ја комплетирате вашата нарачка.
                </p>
            </div>
            
            <p class="text-[#163b67] font-bold text-lg border-t border-gray-100 pt-4"
               data-mk="Ви Благодариме."
               data-sq="Ju Faleminderit."
               data-en="Thank You.">Ви Благодариме.</p>
        </div>
    </div>

</div>

<script>
    function openModal() {
        const modal = document.getElementById('modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
</script>

@endsection
