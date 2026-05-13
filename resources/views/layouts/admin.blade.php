<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ Панел | Idrizovo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Дефинираме фиксна ширина за да нема поместување */
        :root {
            --sidebar-width: 256px;
        }

        body {
            background-color: #050505;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Sidebar-от е фиксиран и не зафаќа простор во протокот */
        .admin-sidebar {
            width: var(--sidebar-width);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            z-index: 50;
        }

        /* Главниот дел е турнат точно колку што е широк Sidebar-от */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-area {
            padding: 2rem;
            flex: 1;
        }
    </style>
</head>
<body class="text-white antialiased">

    <div class="admin-sidebar">
        @include('partials.admin-sidebar')
    </div>

    <div class="main-wrapper">
        
        @include('partials.admin-topbar')

        <main class="content-area">
            @yield('content')
        </main>
        
    </div>

</body>
</html>