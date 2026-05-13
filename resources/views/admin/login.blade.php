<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пријава - Idrizovo Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-[#c9b07d] font-bold text-2xl text-slate-950 mb-4 shadow-lg shadow-[#c9b07d]/20">
                ID
            </div>
            <h1 class="text-3xl font-bold text-white">Админ Панел</h1>
            <p class="text-slate-400 mt-2">Внесете ги вашите податоци за пристап</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="bg-slate-900/50 border border-slate-800 p-8 rounded-[2.5rem] shadow-2xl backdrop-blur-xl">
            {{-- КЛУЧНАТА ЛИНИЈА Е ТУКА --}}
            @csrf 

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Корисничко име</label>
                    <input type="text" name="username" required autocomplete="username" class="w-full bg-slate-950 border border-slate-800 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#c9b07d] transition-all">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Лозинка</label>
                    <input type="password" name="password" required autocomplete="current-password" class="w-full bg-slate-950 border border-slate-800 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-[#c9b07d] transition-all">
                </div>

                @if($errors->any())
                    <p class="text-red-400 text-sm">{{ $errors->first() }}</p>
                @endif

                <button type="submit" class="w-full bg-[#c9b07d] hover:bg-[#e8d6c2] text-slate-950 font-bold py-4 rounded-2xl transition-all shadow-lg shadow-[#c9b07d]/10 mt-4">
                    Пријави се
                </button>
            </div>
        </form>
    </div>

</body>
</html>