/**
 * Main Application Script
 * Investment Network
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
                heroGetStartedBtn.innerHTML = '<span>Apply for Funding</span>&nbsp;&rarr;';
                heroGetStartedBtn.setAttribute('data-modal-role', 'entrepreneur');
            } else {
                heroGetStartedBtn.href = `${homeUrl}invest/`;
                heroGetStartedBtn.innerHTML = '<span>Explore Opportunities</span>&nbsp;&rarr;';
                heroGetStartedBtn.setAttribute('data-modal-role', 'investor');
            }
        });
    }

    // Scroll Reveal & Motion Engine (IntersectionObserver)
    const revealTargets = document.querySelectorAll('.reveal-on-scroll, .reveal-scale, [data-reveal-group]');

    if ('IntersectionObserver' in window && revealTargets.length > 0) {
        const revealObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    
                    if (el.hasAttribute('data-reveal-group')) {
                        // Stagger reveal each child card/item with a smooth progressive delay
                        const children = el.children;
                        Array.from(children).forEach((child, index) => {
                            setTimeout(() => {
                                child.classList.add('is-revealed');
                            }, index * 90);
                        });
                        el.classList.add('is-revealed');
                    } else {
                        el.classList.add('is-revealed');
                    }

                    obs.unobserve(el);
                }
            });
        }, {
            threshold: 0.08,
            rootMargin: '0px 0px -40px 0px'
        });

        revealTargets.forEach(el => {
            if (el.hasAttribute('data-reveal-group')) {
                // Prepare direct children with reveal-on-scroll
                Array.from(el.children).forEach(child => {
                    child.classList.add('reveal-on-scroll');
                });
            }
            revealObserver.observe(el);
        });
    } else {
        // Fallback for browsers without IntersectionObserver
        document.querySelectorAll('.reveal-on-scroll, .reveal-scale').forEach(el => el.classList.add('is-revealed'));
    }

    // Interactive Testimonial or Stats animation counter if intersection observer is supported
    const statCounters = document.querySelectorAll('[data-counter-target]');
    if ('IntersectionObserver' in window && statCounters.length > 0) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    obs.unobserve(el);
                    el.classList.add('is-revealed');
                }
            });
        }, { threshold: 0.2 });

        statCounters.forEach(el => observer.observe(el));
    }

    // Regulatory Disclaimer Alert Controller (Floating above footer on page load)
    const disclaimerAlert = document.getElementById('regulatory-disclaimer-alert');
    const dismissBtn = document.getElementById('dismiss-disclaimer-btn');
    const ackBtn = document.getElementById('acknowledge-disclaimer-btn');
    const reopenBtn = document.getElementById('reopen-disclaimer-btn');

    if (disclaimerAlert) {
        const isDismissed = sessionStorage.getItem('angel_disclaimer_dismissed');

        // Show alert smoothly 500ms after page load
        if (!isDismissed) {
            setTimeout(() => {
                disclaimerAlert.classList.remove('translate-y-full', 'opacity-0');
                disclaimerAlert.classList.add('translate-y-0', 'opacity-100');
            }, 500);
        } else if (reopenBtn) {
            reopenBtn.classList.remove('hidden');
            reopenBtn.classList.add('inline-flex');
        }

        const hideAlert = () => {
            disclaimerAlert.classList.remove('translate-y-0', 'opacity-100');
            disclaimerAlert.classList.add('translate-y-full', 'opacity-0');
            sessionStorage.setItem('angel_disclaimer_dismissed', 'true');
            if (reopenBtn) {
                setTimeout(() => {
                    reopenBtn.classList.remove('hidden');
                    reopenBtn.classList.add('inline-flex');
                }, 400);
            }
        };

        if (dismissBtn) {
            dismissBtn.addEventListener('click', hideAlert);
        }
        if (ackBtn) {
            ackBtn.addEventListener('click', hideAlert);
        }

        if (reopenBtn) {
            reopenBtn.addEventListener('click', () => {
                reopenBtn.classList.add('hidden');
                reopenBtn.classList.remove('inline-flex');
                disclaimerAlert.classList.remove('translate-y-full', 'opacity-0');
                disclaimerAlert.classList.add('translate-y-0', 'opacity-100');
            });
        }
    }
});

