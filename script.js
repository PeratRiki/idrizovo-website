// HAMBURGER MENU
document.addEventListener('DOMContentLoaded', function () {
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (hamburgerBtn && mobileMenu) {
        hamburgerBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            mobileMenu.classList.toggle('open');
        });
        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                mobileMenu.classList.remove('open');
            });
        });
    }

    // NOVOSTI DROPDOWN
    document.addEventListener('click', function () {
        const dd = document.getElementById('novosti-dropdown');
        if (dd) dd.style.display = 'none';
        const ld = document.getElementById('lang-dropdown');
        if (ld) ld.classList.remove('open');
        if (mobileMenu) mobileMenu.classList.remove('open');
    });

    // LANG DROPDOWN
    const langBtn = document.getElementById('lang-btn');
    const langDropdown = document.getElementById('lang-dropdown');
    if (langBtn && langDropdown) {
        langBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            langDropdown.classList.toggle('open');
            const dd = document.getElementById('novosti-dropdown');
            if (dd) dd.style.display = 'none';
        });
    }

    // Apply saved language on load
    const saved = localStorage.getItem('kpu-lang') || 'mk';
    setLang(saved, true);
});

// NOVOSTI DROPDOWN TOGGLE
function toggleNovosti(e) {
    e.stopPropagation();
    const dd = document.getElementById('novosti-dropdown');
    if (!dd) return;
    const isOpen = dd.style.display === 'block';
    const langDropdown = document.getElementById('lang-dropdown');
    if (langDropdown) langDropdown.classList.remove('open');
    dd.style.display = isOpen ? 'none' : 'block';
}

// LANGUAGE SWITCHER
const langLabels = { mk: 'МК', sq: 'ALB', en: 'EN' };

function setLang(lang, silent) {
    localStorage.setItem('kpu-lang', lang);
    document.documentElement.lang = lang;

    const langLabel = document.getElementById('lang-label');
    if (langLabel) langLabel.textContent = langLabels[lang];

    document.querySelectorAll('[data-mk]').forEach(function (el) {
        const val = el.dataset[lang];
        if (!val) return;
        if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
            el.placeholder = val;
        } else {
            el.textContent = val;
        }
    });

    const langDropdown = document.getElementById('lang-dropdown');
    if (langDropdown && !silent) langDropdown.classList.remove('open');
}
