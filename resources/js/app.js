import './bootstrap';

window.setLang = function (lang) {
    localStorage.setItem('lang', lang);

    document.querySelectorAll('[data-mk]').forEach(function (el) {
        if (el.id === 'lang-label') return;
        const text = el.getAttribute('data-' + lang) || el.getAttribute('data-mk');
        el.innerHTML = text;
    });

    document.querySelectorAll('[data-placeholder-mk]').forEach(function (el) {
        const placeholder = el.getAttribute('data-placeholder-' + lang)
            || el.getAttribute('data-placeholder-mk');
        el.setAttribute('placeholder', placeholder);
    });

    document.documentElement.lang = lang;

    const langLabel = document.getElementById('lang-label');
    if (langLabel) {
        const labels = { mk: 'МК', sq: 'ALB', en: 'EN' };
        langLabel.textContent = labels[lang] || 'МК';
    }

    const dropdown = document.getElementById('lang-dropdown');
    if (dropdown) dropdown.classList.add('hidden');
};

window.toggleMobileMenu = function () {
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerBtn = document.getElementById('hamburger-btn');
    if (mobileMenu) {
        const isOpen = !mobileMenu.classList.toggle('hidden');
        if (hamburgerBtn) {
            hamburgerBtn.setAttribute('aria-expanded', String(isOpen));
        }
    }
};

window.toggleNovosti = function (event) {
    event.stopPropagation();
    const dropdown = document.getElementById('novosti-dropdown');
    const icon = document.getElementById('novosti-icon');
    if (dropdown) dropdown.classList.toggle('hidden');
    if (icon) {
        icon.style.transform = dropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }
};

window.toggleLangDropdown = function () {
    const dropdown = document.getElementById('lang-dropdown');
    const langBtn = document.getElementById('lang-btn');
    if (dropdown) {
        const isOpen = !dropdown.classList.toggle('hidden');
        if (langBtn) langBtn.setAttribute('aria-expanded', String(isOpen));
    }
};

function initLanguageDropdown() {
    // Hamburger
    const hamburgerBtn = document.getElementById('hamburger-btn');
    if (hamburgerBtn) hamburgerBtn.addEventListener('click', toggleMobileMenu);

    // Lang dropdown
    const langBtn = document.getElementById('lang-btn');
    if (langBtn) langBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        toggleLangDropdown();
    });

    // Prevent clicks inside the lang dropdown from closing it
    const langDropdown = document.getElementById('lang-dropdown');
    if (langDropdown) {
        langDropdown.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    }

    // Close dropdowns on outside click
    document.addEventListener('click', function (e) {
        const langDropdown = document.getElementById('lang-dropdown');
        const langBtn = document.getElementById('lang-btn');
        if (langDropdown && langBtn && !langBtn.contains(e.target) && !langDropdown.contains(e.target)) {
            langDropdown.classList.add('hidden');
        }

        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerBtn = document.getElementById('hamburger-btn');
        if (mobileMenu && hamburgerBtn && !hamburgerBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                hamburgerBtn.setAttribute('aria-expanded', 'false');
            }
        }

        const novostiDropdown = document.getElementById('novosti-dropdown');
        const novostiBtn = document.getElementById('novosti-btn');
        if (novostiDropdown && novostiBtn && !novostiBtn.contains(e.target) && !novostiDropdown.contains(e.target)) {
            novostiDropdown.classList.add('hidden');
            const icon = document.getElementById('novosti-icon');
            if (icon) icon.style.transform = 'rotate(0deg)';
        }
    });

    // Apply saved language on load
    const saved = localStorage.getItem('lang') || 'mk';
    const langLabel = document.getElementById('lang-label');
    const labels = { mk: 'МК', sq: 'ALB', en: 'EN' };
    if (langLabel) langLabel.textContent = labels[saved];
    if (saved !== 'mk') window.setLang(saved);
}

document.addEventListener('DOMContentLoaded', initLanguageDropdown);
if (document.readyState !== 'loading') {
    initLanguageDropdown();
}