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

    // =========================================================================
    // Bidirectional Scroll Motion & Reveal Engine (Scroll Down & Scroll Up)
    // =========================================================================
    let lastScrollY = window.pageYOffset || document.documentElement.scrollTop;
    let scrollDirection = 'down';
    let isTicking = false;

    const siteHeader = document.getElementById('site-header');
    const heroSection = document.getElementById('hero-home') || document.querySelector('section');

    const updateScrollMetrics = () => {
        const currentScrollY = window.pageYOffset || document.documentElement.scrollTop;
        const diff = currentScrollY - lastScrollY;

        // Detect scroll direction with hysteresis
        if (Math.abs(diff) >= 4) {
            scrollDirection = diff > 0 ? 'down' : 'up';
            document.documentElement.setAttribute('data-scroll-dir', scrollDirection);

            // Meaningful Header elevation reaction on scroll up
            if (siteHeader) {
                if (currentScrollY > 70) {
                    if (scrollDirection === 'up') {
                        siteHeader.classList.add('header-scroll-up');
                        siteHeader.classList.remove('header-scroll-down');
                    } else {
                        siteHeader.classList.add('header-scroll-down');
                        siteHeader.classList.remove('header-scroll-up');
                    }
                } else {
                    siteHeader.classList.remove('header-scroll-up', 'header-scroll-down');
                }
            }
        }

        // Re-trigger hero entrance if returning back to top
        if (heroSection) {
            if (currentScrollY <= 60 && scrollDirection === 'up') {
                heroSection.classList.add('hero-re-enter');
            } else if (currentScrollY > 400) {
                heroSection.classList.remove('hero-re-enter');
            }
        }

        lastScrollY = Math.max(0, currentScrollY);
        isTicking = false;
    };

    window.addEventListener('scroll', () => {
        if (!isTicking) {
            window.requestAnimationFrame(updateScrollMetrics);
            isTicking = true;
        }
    }, { passive: true });

    document.documentElement.setAttribute('data-scroll-dir', 'down');

    // Continuous Bidirectional IntersectionObserver
    const revealTargets = document.querySelectorAll('.reveal-on-scroll, .reveal-scale, [data-reveal-group]');

    if ('IntersectionObserver' in window && revealTargets.length > 0) {
        // Initialize children of group containers
        revealTargets.forEach(el => {
            if (el.hasAttribute('data-reveal-group')) {
                Array.from(el.children).forEach(child => {
                    child.classList.add('reveal-on-scroll');
                });
            }
        });

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const el = entry.target;

                if (entry.isIntersecting) {
                    // Mark directional entry class
                    if (scrollDirection === 'up') {
                        el.classList.add('from-top');
                        el.classList.remove('from-bottom');
                    } else {
                        el.classList.add('from-bottom');
                        el.classList.remove('from-top');
                    }

                    if (el.hasAttribute('data-reveal-group')) {
                        const children = Array.from(el.children);
                        children.forEach((child, index) => {
                            const delay = scrollDirection === 'up'
                                ? (children.length - 1 - index) * 50
                                : index * 75;
                            setTimeout(() => {
                                child.classList.add('is-revealed');
                            }, Math.min(delay, 350));
                        });
                        el.classList.add('is-revealed');
                    } else {
                        el.classList.add('is-revealed');
                    }
                } else {
                    // When element scrolls well outside the viewport (120px buffer),
                    // reset so it smoothly re-animates when user scrolls back in either direction!
                    const rect = el.getBoundingClientRect();
                    const viewHeight = window.innerHeight || document.documentElement.clientHeight;

                    if (rect.bottom < -120 || rect.top > viewHeight + 120) {
                        el.classList.remove('is-revealed', 'from-top', 'from-bottom');
                        if (el.hasAttribute('data-reveal-group')) {
                            Array.from(el.children).forEach(child => {
                                child.classList.remove('is-revealed');
                            });
                        }
                    }
                }
            });
        }, {
            threshold: 0.05,
            rootMargin: '20px 0px 20px 0px'
        });

        revealTargets.forEach(el => revealObserver.observe(el));
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

