<<<<<<< HEAD
        // HAMBURGER
        document.getElementById('hamburger-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('open');
        });
        document.getElementById('mobile-menu').querySelectorAll('a').forEach(l =>
            l.addEventListener('click', () => document.getElementById('mobile-menu').classList.remove('open'))
        );

        // SCROLL TO TOP
        const scrollBtn = document.getElementById('scrollTopBtn');
        window.addEventListener('scroll', () => {
            scrollBtn.style.display = window.scrollY > 300 ? 'flex' : 'none';
        });

        // NOVOSTI DROPDOWN
        function toggleNovosti(e) {
            e.stopPropagation();
            const dd = document.getElementById('novosti-dropdown');
            const isOpen = dd.style.display === 'block';
            // close all dropdowns first
            document.getElementById('lang-dropdown').classList.remove('open');
            dd.style.display = isOpen ? 'none' : 'block';
        }
        document.addEventListener('click', () => {
            const dd = document.getElementById('novosti-dropdown');
            if (dd) dd.style.display = 'none';
        });

        // LANG DROPDOWN
        const langBtn = document.getElementById('lang-btn');
        const langDropdown = document.getElementById('lang-dropdown');
        langBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            langDropdown.classList.toggle('open');
        });
        document.addEventListener('click', () => langDropdown.classList.remove('open'));

        // LANGUAGE SWITCHER
        const langLabels = { mk: 'МК', sq: 'SQ', en: 'EN' };

        function setLang(lang) {
            localStorage.setItem('kpu-lang', lang);
            document.getElementById('lang-label').textContent = langLabels[lang];
            document.documentElement.lang = lang;

            document.querySelectorAll('[data-mk]').forEach(el => {
                const val = el.dataset[lang];
                if (!val) return;
                if (el.tagName === 'INPUT') {
                    el.value = val;
                } else {
                    el.textContent = val;
                }
            });

            langDropdown.classList.remove('open');
        }

        // Apply saved language on load
        const saved = localStorage.getItem('kpu-lang') || 'mk';
        if (saved !== 'mk') setLang(saved);
=======
const t = {
  mk: {
    new: "Нови соопштенија",
    old: "Постари соопштенија",
    more: "Види повеќе",

    n1: "ИНТЕРЕН ОГЛАС за пополнување на работно место со унапредување на административен службеник",
    n1t: "Врз основа на член 30 став 1 алинеја 2 став 3 и став 5...",
    n2: "Одлука",
    n2t: "КПУ-КПД Идризово со Отворено одделение Велес го продолжува рокот...",
    n3: "ИНТЕРЕН ОГЛАС за пополнување на работни места со унапредување",
    n3t: "Врз основа на член 67 став 1 алинеја 2...",
    n4: "Предлог на одлука за избор на кандидати за унапредување",
    n4t: "Врз основа на член 52 став 1...",
    n5: "Одлука за поништување на оглас за вработување",
    n5t: "Врз основа на член 31 од Законот...",
    n6: "Одлука за избор на кандидати за унапредување",
    n6t: "Врз основа на член 52 од Законот за административни службеници...",

    o1: "Интерен оглас за вработување во затворска полиција",
    o1t: "Врз основа на член 78 и член 79...",
    o2: "Интерен оглас за вработување во администрација",
    o2t: "Врз основа на член 30 став 1...",
    o3: "Оглас за вработување на 18 лица на неопределено време",
    o3t: "Казнено-поправната установа објавува јавен оглас...",
    o4: "ЈАВЕН ОГЛАС за вработување на 70 лица",
    o4t: "Врз основа на член 67 став 1...",
    o5: "ЈАВЕН ОГЛАС за вработување на 30 лица",
    o5t: "Врз основа на член 67 став...",
    o6: "ОГЛАС за пополнување на работно место",
    o6t: "Врз основа на член 78..."
  },

  sq: {
    new: "Njoftime të reja",
    old: "Njoftime të vjetra",
    more: "Shiko më shumë"
  },

  en: {
    new: "New announcements",
    old: "Older announcements",
    more: "Read more"
  }
};

function setLanguage(lang) {
  document.querySelectorAll("[data-key]").forEach(el => {
    const key = el.dataset.key;
    el.textContent = t[lang][key] || t.mk[key];
  });

  localStorage.setItem("lang", lang);
}

setLanguage(localStorage.getItem("lang") || "mk");
>>>>>>> origin/tatjana
