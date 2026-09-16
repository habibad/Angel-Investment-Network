/**
 * Main Application Script
 * Angel Investment Network
 */

document.addEventListener('DOMContentLoaded', () => {
    // Hero Objective Dropdown Selector (Invest vs Fundraise)
    const heroObjectiveSelector = document.getElementById('hero-objective-select');
    const heroGetStartedBtn = document.getElementById('hero-get-started-btn');

    if (heroObjectiveSelector && heroGetStartedBtn) {
        const homeUrl = window.angelNetworkConfig?.homeUrl || '/';
        heroObjectiveSelector.addEventListener('change', (e) => {
            const val = e.target.value;
            if (val === 'fundraise') {
                heroGetStartedBtn.href = `${homeUrl}fundraise/`;
                heroGetStartedBtn.textContent = 'Apply for Funding →';
                heroGetStartedBtn.setAttribute('data-modal-role', 'entrepreneur');
            } else {
                heroGetStartedBtn.href = `${homeUrl}invest/`;
                heroGetStartedBtn.textContent = 'Explore Opportunities →';
                heroGetStartedBtn.setAttribute('data-modal-role', 'investor');
            }
        });
    }

    // Interactive Testimonial or Stats animation counter if intersection observer is supported
    const statCounters = document.querySelectorAll('[data-counter-target]');
    if ('IntersectionObserver' in window && statCounters.length > 0) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    obs.unobserve(el);
                    // Element is now visible
                    el.classList.add('is-revealed');
                }
            });
        }, { threshold: 0.2 });

        statCounters.forEach(el => observer.observe(el));
    }
});
