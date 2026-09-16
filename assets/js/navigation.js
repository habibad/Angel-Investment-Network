/**
 * Navigation Module
 * Handles mobile drawer toggle, sub-menu toggling, and sticky header elevation.
 */

document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const header = document.getElementById('site-header');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            const isExpanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
            mobileMenuBtn.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Header scroll shadow elevation
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                header.classList.add('shadow-md', 'bg-white/95', 'backdrop-blur-sm');
                header.classList.remove('bg-white');
            } else {
                header.classList.remove('shadow-md', 'bg-white/95', 'backdrop-blur-sm');
                header.classList.add('bg-white');
            }
        }, { passive: true });
    }

    // Dropdown handling for desktop
    const dropdownToggles = document.querySelectorAll('.nav-dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        const parent = toggle.closest('.nav-item-dropdown');
        if (!parent) return;

        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            const isOpen = parent.classList.contains('is-open');
            // Close other open menus
            document.querySelectorAll('.nav-item-dropdown.is-open').forEach(item => {
                if (item !== parent) item.classList.remove('is-open');
            });
            parent.classList.toggle('is-open', !isOpen);
        });
    });

    // Close dropdowns on click outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.nav-item-dropdown')) {
            document.querySelectorAll('.nav-item-dropdown.is-open').forEach(item => {
                item.classList.remove('is-open');
            });
        }
    });
});
