/**
 * Accessible Modal Controller
 * Handles Auth Modal (Login / Register) with Role-Switching (Investor vs Entrepreneur)
 */

window.AngelModal = {
    openModal(modalId, initialTab = 'register', initialRole = 'investor') {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');

        // Set Tab (login or register)
        this.switchTab(initialTab);

        // Set Role (investor or entrepreneur)
        this.switchRole(initialRole);

        // Focus first input
        const firstInput = modal.querySelector('input:not([type="hidden"])');
        if (firstInput) {
            setTimeout(() => firstInput.focus(), 50);
        }
    },

    closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    },

    switchTab(tabName) {
        const loginTabBtn = document.getElementById('modal-tab-login');
        const registerTabBtn = document.getElementById('modal-tab-register');
        const loginForm = document.getElementById('modal-form-login');
        const registerForm = document.getElementById('modal-form-register');

        if (!loginTabBtn || !registerTabBtn || !loginForm || !registerForm) return;

        if (tabName === 'login') {
            loginTabBtn.classList.add('border-primary', 'text-primary');
            loginTabBtn.classList.remove('border-transparent', 'text-slate-500');
            registerTabBtn.classList.remove('border-primary', 'text-primary');
            registerTabBtn.classList.add('border-transparent', 'text-slate-500');
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
        } else {
            registerTabBtn.classList.add('border-primary', 'text-primary');
            registerTabBtn.classList.remove('border-transparent', 'text-slate-500');
            loginTabBtn.classList.remove('border-primary', 'text-primary');
            loginTabBtn.classList.add('border-transparent', 'text-slate-500');
            registerForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
        }
    },

    switchRole(role) {
        const investorRadio = document.getElementById('role-investor');
        const entrepreneurRadio = document.getElementById('role-entrepreneur');
        const investorLabel = document.getElementById('label-role-investor');
        const entrepreneurLabel = document.getElementById('label-role-entrepreneur');
        const investorDisclaimer = document.getElementById('investor-accreditation-clause');

        if (investorRadio && entrepreneurRadio) {
            if (role === 'investor') {
                investorRadio.checked = true;
                if (investorLabel) investorLabel.classList.add('border-primary', 'bg-primary-50/50', 'text-primary');
                if (entrepreneurLabel) entrepreneurLabel.classList.remove('border-primary', 'bg-primary-50/50', 'text-primary');
                if (investorDisclaimer) investorDisclaimer.classList.remove('hidden');
            } else {
                entrepreneurRadio.checked = true;
                if (entrepreneurLabel) entrepreneurLabel.classList.add('border-primary', 'bg-primary-50/50', 'text-primary');
                if (investorLabel) investorLabel.classList.remove('border-primary', 'bg-primary-50/50', 'text-primary');
                if (investorDisclaimer) investorDisclaimer.classList.add('hidden');
            }
        }
    }
};

document.addEventListener('DOMContentLoaded', () => {
    // Global Modal Triggers
    document.querySelectorAll('[data-open-modal]').forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            const modalId = trigger.getAttribute('data-open-modal');
            const initialTab = trigger.getAttribute('data-modal-tab') || 'register';
            const initialRole = trigger.getAttribute('data-modal-role') || 'investor';
            window.AngelModal.openModal(modalId, initialTab, initialRole);
        });
    });

    // Close buttons inside modal
    document.querySelectorAll('[data-close-modal]').forEach(btn => {
        btn.addEventListener('click', () => {
            const modalId = btn.getAttribute('data-close-modal');
            window.AngelModal.closeModal(modalId);
        });
    });

    // Close on backdrop click
    document.querySelectorAll('.modal-backdrop').forEach(backdrop => {
        backdrop.addEventListener('click', (e) => {
            if (e.target === backdrop) {
                const modal = backdrop.closest('.modal-container');
                if (modal) window.AngelModal.closeModal(modal.id);
            }
        });
    });

    // Close on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-container:not(.hidden)').forEach(modal => {
                window.AngelModal.closeModal(modal.id);
            });
        }
    });

    // Role radio button event listeners
    const roleInvestor = document.getElementById('role-investor');
    const roleEntrepreneur = document.getElementById('role-entrepreneur');

    if (roleInvestor) {
        roleInvestor.addEventListener('change', () => window.AngelModal.switchRole('investor'));
    }
    if (roleEntrepreneur) {
        roleEntrepreneur.addEventListener('change', () => window.AngelModal.switchRole('entrepreneur'));
    }
});
