<!DOCTYPE html>
<html lang="mk">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Уметност со игла и конец</title>
    <script src="https://kit.fontawesome.com/aba845d803.js" crossorigin="anonymous"></script>
</head>
 
<body class="bg-gradient-to-b from-blue-100 to-blue-300 min-h-screen p-4 flex flex-col items-center">
 
    <div class="w-full max-w-2xl mb-6 flex items-center gap-3">
      <a href="./index.html"><i class="fa-solid fa-chevron-left text-3xl text-gray-700 hover:text-black"></i></a>
        <h1 class="text-3xl font-bold text-slate-800 uppercase tracking-tight">Уметност со игла и конец</h1>
    </div>
 
    <div class="w-full max-w-2xl grid grid-cols-2 gap-4 md:gap-6">
 
        <div
            class="bg-white/40 backdrop-blur-sm rounded-[1.5rem] overflow-hidden shadow-sm border border-white/20 flex flex-col">
            <div class="h-40 overflow-hidden">
                <img src="./torba1.jpg" alt="Proizvod" class="w-full h-full object-cover">
            </div>
 
            <div class="p-4 space-y-2 flex-grow">
                <h2 class="text-white font-bold text-sm">Lorem Ipsum</h2>
                <p class="text-white/80 text-[10px] leading-tight line-clamp-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
 
                <button onclick="openModal()"
                    class="mt-2 bg-[#1a2b3c] text-white text-[10px] px-4 py-1.5 rounded-md hover:bg-black transition-colors w-fit">
                    Резервирај
                </button>
            </div>
        </div>
 
        <div
            class="bg-white/40 backdrop-blur-sm rounded-[1.5rem] overflow-hidden shadow-sm border border-white/20 flex flex-col">
            <div class="h-40 overflow-hidden">
                <img src="./torba2.jpg" alt="Proizvod" class="w-full h-full object-cover">
            </div>
            <div class="p-4 space-y-2 flex-grow">
                <h2 class="text-white font-bold text-sm">Lorem Ipsum</h2>
                <p class="text-white/80 text-[10px] leading-tight line-clamp-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                <button onclick="openModal()"
                    class="mt-2 bg-[#1a2b3c] text-white text-[10px] px-4 py-1.5 rounded-md hover:bg-black transition-colors w-fit">
                    Резервирај
                </button>
            </div>
        </div>
 
        <div class="bg-white/40 backdrop-blur-sm rounded-[1.5rem] overflow-hidden shadow-sm border border-white/20 flex flex-col">
            <div class="h-40 overflow-hidden">
                <img src="./kosula.jpg" alt="Proizvod" class="w-full h-full object-cover">
            </div>
            
            <div class="p-4 space-y-2 flex-grow">
                <h2 class="text-white font-bold text-sm">Lorem Ipsum</h2>
                <p class="text-white/80 text-[10px] leading-tight line-clamp-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                
                <button onclick="openModal()" class="mt-2 bg-[#1a2b3c] text-white text-[10px] px-4 py-1.5 rounded-md hover:bg-black transition-colors w-fit">
                    Резервирај
                </button>
            </div>
        </div>
 
        <div class="bg-white/40 backdrop-blur-sm rounded-[1.5rem] overflow-hidden shadow-sm border border-white/20 flex flex-col">
            <div class="h-40 overflow-hidden">
                <img src="./mala.jpg" alt="Proizvod" class="w-full h-full object-cover">
            </div>
            <div class="p-4 space-y-2 flex-grow">
                <h2 class="text-white font-bold text-sm">Lorem Ipsum</h2>
                <p class="text-white/80 text-[10px] leading-tight line-clamp-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                <button onclick="openModal()" class="mt-2 bg-[#1a2b3c] text-white text-[10px] px-4 py-1.5 rounded-md hover:bg-black transition-colors w-fit">
                    Резервирај
                </button>
            </div>
        </div>
 
        <div class="bg-white/40 backdrop-blur-sm rounded-[1.5rem] overflow-hidden shadow-sm border border-white/20 flex flex-col">
            <div class="h-40 overflow-hidden">
                <img src="./pernica.jpg" alt="Proizvod" class="w-full h-full object-cover">
            </div>
            
            <div class="p-4 space-y-2 flex-grow">
                <h2 class="text-white font-bold text-sm">Lorem Ipsum</h2>
                <p class="text-white/80 text-[10px] leading-tight line-clamp-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                
                <button onclick="openModal()" class="mt-2 bg-[#1a2b3c] text-white text-[10px] px-4 py-1.5 rounded-md hover:bg-black transition-colors w-fit">
                    Резервирај
                </button>
            </div>
        </div>
 
        <div class="bg-white/40 backdrop-blur-sm rounded-[1.5rem] overflow-hidden shadow-sm border border-white/20 flex flex-col">
            <div class="h-40 overflow-hidden">
                <img src="./srce1.jpg" alt="Proizvod" class="w-full h-full object-cover">
            </div>
            <div class="p-4 space-y-2 flex-grow">
                <h2 class="text-white font-bold text-sm">Lorem Ipsum</h2>
                <p class="text-white/80 text-[10px] leading-tight line-clamp-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
                <button onclick="openModal()" class="mt-2 bg-[#1a2b3c] text-white text-[10px] px-4 py-1.5 rounded-md hover:bg-black transition-colors w-fit">
                    Резервирај
                </button>
            </div>
        </div>
 
    </div>
 
    <!-- MODAL -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm" onclick="closeModal()"></div>
 
        <!-- Modal box -->
        <div class="relative bg-[#7fa8d4] rounded-2xl shadow-xl p-8 mx-4 max-w-sm w-full text-center">
            <!-- X копче -->
            <button onclick="closeModal()" class="absolute top-3 right-4 text-white text-xl font-bold hover:opacity-70 transition-opacity">✕</button>
 
            <p class="text-white font-bold text-lg leading-snug">
                На бројот 07X XXX XXX јавете се за да ја резервирате вашата нарачка.
            </p>
            <p class="text-white font-bold text-lg mt-4">
                Ви Благодариме.
            </p>
        </div>
    </div>
 
    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
 
</body>
 
</html>

