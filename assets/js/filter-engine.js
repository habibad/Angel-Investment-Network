/**
 * Filter Engine Module
 * High-performance client-side filtering for Deal Opportunities
 */

document.addEventListener('DOMContentLoaded', () => {
    const filterPills = document.querySelectorAll('[data-filter-sector]');
    const dealCards = document.querySelectorAll('.opportunity-item');
    const emptyState = document.getElementById('filter-empty-state');
    const searchInput = document.getElementById('opportunity-search-input');

    if (!dealCards.length) return;

    let activeSector = 'all';
    let searchQuery = '';

    function applyFilters() {
        let visibleCount = 0;

        dealCards.forEach(card => {
            const cardSector = card.getAttribute('data-sector') || '';
            const cardTitle = (card.querySelector('.deal-title')?.textContent || '').toLowerCase();
            const cardDesc = (card.querySelector('.deal-desc')?.textContent || '').toLowerCase();
            const cardCompany = (card.querySelector('.deal-company')?.textContent || '').toLowerCase();

            const matchesSector = (activeSector === 'all') || (cardSector.toLowerCase() === activeSector.toLowerCase());
            const matchesSearch = !searchQuery || 
                cardTitle.includes(searchQuery) || 
                cardDesc.includes(searchQuery) || 
                cardCompany.includes(searchQuery);

            if (matchesSector && matchesSearch) {
                card.classList.remove('hidden');
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 20);
                visibleCount++;
            } else {
                card.style.opacity = '0';
                card.style.transform = 'translateY(10px)';
                card.classList.add('hidden');
            }
        });

        // Toggle Empty State
        if (emptyState) {
            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }
    }

    // Sector Filter Pills
    filterPills.forEach(pill => {
        pill.addEventListener('click', (e) => {
            e.preventDefault();
            activeSector = pill.getAttribute('data-filter-sector') || 'all';

            // Update active pill UI state
            filterPills.forEach(p => {
                p.classList.remove('bg-primary', 'text-white', 'border-primary');
                p.classList.add('bg-white', 'text-slate-700', 'border-slate-200');
            });

            pill.classList.remove('bg-white', 'text-slate-700', 'border-slate-200');
            pill.classList.add('bg-primary', 'text-white', 'border-primary');

            applyFilters();
        });
    });

    // Real-time Search Input
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            searchQuery = e.target.value.trim().toLowerCase();
            applyFilters();
        });
    }
});
