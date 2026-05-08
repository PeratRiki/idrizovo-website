import './bootstrap';

// Language switching functionality
window.setLang = function(lang) {
    // Save language preference
    localStorage.setItem('lang', lang);

    // Update all elements with data attributes
    document.querySelectorAll('[data-' + lang + ']').forEach(function(el) {
        // Update text content
        if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
            el.placeholder = el.getAttribute('data-' + lang);
        } else {
            el.textContent = el.getAttribute('data-' + lang);
        }
    });

    // Update HTML lang attribute
    document.documentElement.lang = lang;

    // Update language dropdown button text
    const currentLangBtn = document.querySelector('#current-lang-btn');
    if (currentLangBtn) {
        const flagSrc = lang === 'en' ? 'https://flagcdn.com/w20/gb.png' :
                       lang === 'sq' ? 'https://flagcdn.com/w20/al.png' :
                       'https://flagcdn.com/w20/mk.png';
        const langText = lang === 'en' ? 'English' :
                        lang === 'sq' ? 'Albanian' : 'Македонски';

        currentLangBtn.innerHTML = `
            <img src="${flagSrc}" srcset="${flagSrc.replace('w20', 'w40')} 2x" width="20" alt="${langText} Flag">
            ${langText}
            <i class="fa-solid fa-chevron-down text-[10px]"></i>
        `;
    }

    // Hide language dropdown
    const dropdown = document.getElementById('lang-dropdown');
    if (dropdown) {
        dropdown.classList.add('hidden');
    }
};

// Mobile menu toggle functionality
window.toggleMobileMenu = function() {
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenu) {
        mobileMenu.classList.toggle('hidden');
    }
};

// Novosti dropdown toggle functionality
window.toggleNovosti = function(event) {
    event.preventDefault();
    const dropdown = document.getElementById('novosti-dropdown');
    const icon = document.getElementById('novosti-icon');

    if (dropdown && icon) {
        const isVisible = dropdown.style.display !== 'none';
        dropdown.style.display = isVisible ? 'none' : 'block';

        // Rotate icon
        icon.style.transform = isVisible ? 'rotate(0deg)' : 'rotate(180deg)';
    }
};

// Language dropdown toggle
window.toggleLangDropdown = function() {
    const dropdown = document.getElementById('lang-dropdown');
    if (dropdown) {
        dropdown.classList.toggle('hidden');
    }
};

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Hamburger menu functionality
    const hamburgerBtn = document.getElementById('hamburger-btn');
    if (hamburgerBtn) {
        hamburgerBtn.addEventListener('click', toggleMobileMenu);
    }

    // Language dropdown functionality
    const currentLangBtn = document.querySelector('#current-lang-btn');
    if (currentLangBtn) {
        currentLangBtn.addEventListener('click', function(e) {
            e.preventDefault();
            toggleLangDropdown();
        });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        const langDropdown = document.getElementById('lang-dropdown');
        const currentLangBtn = document.querySelector('#current-lang-btn');

        if (langDropdown && currentLangBtn && !currentLangBtn.contains(e.target) && !langDropdown.contains(e.target)) {
            langDropdown.classList.add('hidden');
        }

        const novostiDropdown = document.getElementById('novosti-dropdown');
        const novostiBtn = document.getElementById('novosti-btn');

        if (novostiDropdown && novostiBtn && !novostiBtn.contains(e.target) && !novostiDropdown.contains(e.target)) {
            novostiDropdown.style.display = 'none';
            const icon = document.getElementById('novosti-icon');
            if (icon) icon.style.transform = 'rotate(0deg)';
        }
    });

    // Apply saved language on page load
    const savedLang = localStorage.getItem('lang');
    if (savedLang && savedLang !== 'mk') {
        setLang(savedLang);
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
