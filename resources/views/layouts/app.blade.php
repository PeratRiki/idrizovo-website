<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-50 text-gray-900">

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script>
        // ── Lang dropdown (desktop) ──────────────────────────
        document.getElementById('lang-btn').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('lang-dropdown').classList.toggle('hidden');
        });

        // ── Novosti dropdown ─────────────────────────────────
        function toggleNovosti(e) {
            e.stopPropagation();
            document.getElementById('novosti-dropdown').classList.toggle('hidden');
        }

        // ── Hamburger menu ───────────────────────────────────
        document.getElementById('hamburger-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // ── Close dropdowns само кога кликаш надвор ──────────
        document.addEventListener('click', function(e) {
            const langDropdown = document.getElementById('lang-dropdown');
            const langBtn = document.getElementById('lang-btn');
            const novostiDropdown = document.getElementById('novosti-dropdown');
            const novostiBtn = document.getElementById('novosti-btn');

            if (!langBtn.contains(e.target) && !langDropdown.contains(e.target)) {
                langDropdown.classList.add('hidden');
            }
            if (!novostiBtn.contains(e.target) && !novostiDropdown.contains(e.target)) {
                novostiDropdown.classList.add('hidden');
            }
        });

        // ── Language switcher ────────────────────────────────
        const langLabels = { mk: 'МК', sq: 'ALB', en: 'EN' };

        function setLang(lang) {
            localStorage.setItem('lang', lang);
            applyLang(lang);
            document.getElementById('lang-dropdown').classList.add('hidden');
            document.getElementById('lang-label').textContent = langLabels[lang];
        }

        function applyLang(lang) {
            // ── Текстови со data-mk ──
            document.querySelectorAll('[data-mk]').forEach(function(el) {
                const text = el.getAttribute('data-' + lang) || el.getAttribute('data-mk');
                if (el.childNodes.length === 1 && el.childNodes[0].nodeType === 3) {
                    el.textContent = text;
                } else {
                    el.childNodes.forEach(function(node) {
                        if (node.nodeType === 3 && node.textContent.trim() !== '') {
                            node.textContent = text;
                        }
                    });
                }
            });

            // ── Placeholder атрибути (Contact форма) ──
            document.querySelectorAll('[data-placeholder-mk]').forEach(function(el) {
                const placeholder = el.getAttribute('data-placeholder-' + lang)
                    || el.getAttribute('data-placeholder-mk');
                el.setAttribute('placeholder', placeholder);
            });
        }

        // ── Apply saved language on load ─────────────────────
        (function() {
            const saved = localStorage.getItem('lang') || 'mk';
            document.getElementById('lang-label').textContent = langLabels[saved];
            applyLang(saved);
        })();
    </script>

</body>
</html>