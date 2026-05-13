<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idrizovo - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-beige-gradient { background: linear-gradient(135deg, #f5f1ed 0%, #e8d6c2 100%); }
        .gold-accent { color: #c9b07d; }
    </style>
</head>
<body class="bg-slate-950 text-slate-200">

    <div class="flex h-screen overflow-hidden">
        {{-- SIDEBAR --}}
        @include('partials.admin-sidebar')

        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            {{-- TOPBAR --}}
            @include('partials.admin-topbar')

            {{-- MAIN CONTENT --}}
            <main class="p-4 md:p-8">
                <div class="mx-auto max-w-[1400px]">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

</body>
</html>