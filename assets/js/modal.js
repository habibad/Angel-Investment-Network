/**
 * Accessible Modal Controller & Authentication Engine
 * Handles Auth Modal (Login / Register / Forgot Password) with Role-Switching
 * and Live AJAX Authentication via Cuba Investment Core REST API.
 *
 * @package InvestmentNetwork
 */

window.AngelModal = {
    currentPendingEmail: '',

    openModal(modalId, initialTab = 'register', initialRole = 'investor') {
        // If user is already logged in, auth modal should never open
        if (modalId === 'auth-modal' || modalId === 'choice-modal') {
            const isLoggedIn = document.body.classList.contains('logged-in') || 
                               (window.angelNetworkConfig && window.angelNetworkConfig.isLoggedIn);
            if (isLoggedIn) {
                const targetUrl = window.angelNetworkConfig?.dashboardUrl || '/dashboard/';
                window.location.href = targetUrl;
                return;
            }
        }

        let modal = document.getElementById(modalId);
        if (!modal && (modalId === 'auth-modal' || modalId === 'choice-modal')) {
            modal = document.getElementById('choice-modal') || document.getElementById('auth-modal');
        }
        if (!modal) return;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');

        // Reset alerts & views
        this.resetAlerts();

        // Set Tab (login or register)
        this.switchTab(initialTab);

        // Set Role (investor or entrepreneur)
        this.switchRole(initialRole);

        // Focus first interactive element or input
        const firstFocusable = modal.querySelector('button:not([data-close-modal]), a, input:not([type="hidden"])');
        if (firstFocusable) {
            setTimeout(() => firstFocusable.focus(), 50);
        }
    },

    closeModal(modalId) {
        let modal = document.getElementById(modalId);
        if (!modal && (modalId === 'auth-modal' || modalId === 'choice-modal')) {
            modal = document.getElementById('choice-modal') || document.getElementById('auth-modal');
        }
        if (!modal) return;

        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    },

    switchTab(tabName) {
        const loginTabBtn = document.getElementById('modal-tab-login');
        const registerTabBtn = document.getElementById('modal-tab-register');
        const registerView = document.getElementById('modal-view-register');
        const loginView = document.getElementById('modal-view-login');
        const forgotView = document.getElementById('modal-view-forgot');
        const tabNav = document.getElementById('modal-tab-nav');

        if (!loginTabBtn || !registerTabBtn || !registerView || !loginView) return;

        this.resetAlerts();

        if (tabNav) tabNav.classList.remove('hidden');
        if (forgotView) forgotView.classList.add('hidden');

        if (tabName === 'login') {
            loginTabBtn.classList.add('border-primary', 'text-primary');
            loginTabBtn.classList.remove('border-transparent', 'text-slate-500');
            registerTabBtn.classList.remove('border-primary', 'text-primary');
            registerTabBtn.classList.add('border-transparent', 'text-slate-500');
            loginView.classList.remove('hidden');
            registerView.classList.add('hidden');
        } else {
            registerTabBtn.classList.add('border-primary', 'text-primary');
            registerTabBtn.classList.remove('border-transparent', 'text-slate-500');
            loginTabBtn.classList.remove('border-primary', 'text-primary');
            loginTabBtn.classList.add('border-transparent', 'text-slate-500');
            registerView.classList.remove('hidden');
            loginView.classList.add('hidden');
        }
    },

    switchRole(role) {
        const isInvestor = role === 'investor';
        const investorRadio = document.getElementById('role-investor');
        const entrepreneurRadio = document.getElementById('role-entrepreneur');
        const investorLabel = document.getElementById('label-role-investor');
        const entrepreneurLabel = document.getElementById('label-role-entrepreneur');
        const investorFields = document.getElementById('modal-investor-fields');
        const businessFields = document.getElementById('modal-business-fields');
        const submitBtnText = document.getElementById('modal-reg-btn-text');

        if (investorRadio && entrepreneurRadio) {
            if (isInvestor) {
                investorRadio.checked = true;
                if (investorLabel) investorLabel.classList.add('border-primary', 'bg-primary-50/50', 'text-primary');
                if (entrepreneurLabel) entrepreneurLabel.classList.remove('border-primary', 'bg-primary-50/50', 'text-primary');
                if (investorFields) investorFields.classList.remove('hidden');
                if (businessFields) businessFields.classList.add('hidden');
                if (submitBtnText) submitBtnText.innerText = 'Create Free Investor Account';
            } else {
                entrepreneurRadio.checked = true;
                if (entrepreneurLabel) entrepreneurLabel.classList.add('border-primary', 'bg-primary-50/50', 'text-primary');
                if (investorLabel) investorLabel.classList.remove('border-primary', 'bg-primary-50/50', 'text-primary');
                if (businessFields) businessFields.classList.remove('hidden');
                if (investorFields) investorFields.classList.add('hidden');
                if (submitBtnText) submitBtnText.innerText = 'Create Free Business Owner Account';
            }
        }
    },

    showForgotPassword() {
        const tabNav = document.getElementById('modal-tab-nav');
        const registerView = document.getElementById('modal-view-register');
        const loginView = document.getElementById('modal-view-login');
        const forgotView = document.getElementById('modal-view-forgot');

        if (tabNav) tabNav.classList.add('hidden');
        if (registerView) registerView.classList.add('hidden');
        if (loginView) loginView.classList.add('hidden');
        if (forgotView) {
            forgotView.classList.remove('hidden');
            const forgotEmail = document.getElementById('forgot-email');
            if (forgotEmail) setTimeout(() => forgotEmail.focus(), 50);
        }
    },

    resetAlerts() {
        const regErr = document.getElementById('modal-register-error');
        const regSuccess = document.getElementById('modal-register-success');
        const regForm = document.getElementById('modal-form-register');
        const loginErr = document.getElementById('modal-login-error');
        const loginSuccess = document.getElementById('modal-login-success');
        const forgotFeedback = document.getElementById('modal-forgot-feedback');
        const resendBox = document.getElementById('modal-resend-box');

        if (regErr) regErr.classList.add('hidden');
        if (regSuccess) regSuccess.classList.add('hidden');
        if (regForm) regForm.classList.remove('hidden');
        if (loginErr) loginErr.classList.add('hidden');
        if (loginSuccess) loginSuccess.classList.add('hidden');
        if (forgotFeedback) forgotFeedback.classList.add('hidden');
        if (resendBox) resendBox.classList.add('hidden');
    },

    getApiBase() {
        if (window.angelNetworkConfig && window.angelNetworkConfig.cinRestUrl) {
            return window.angelNetworkConfig.cinRestUrl.replace(/\/+$/, '');
        }
        return '/wp-json/cin/v1';
    },

    getHeaders() {
        const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        };
        if (window.angelNetworkConfig && window.angelNetworkConfig.restNonce) {
            headers['X-WP-Nonce'] = window.angelNetworkConfig.restNonce;
        }
        return headers;
    }
};

document.addEventListener('DOMContentLoaded', () => {
    // -------------------------------------------------------------
    // Modal Open / Close Event Listeners
    // -------------------------------------------------------------
    document.querySelectorAll('[data-open-modal]').forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            const modalId = trigger.getAttribute('data-open-modal');
            const isLoggedIn = document.body.classList.contains('logged-in') || 
                               (window.angelNetworkConfig && window.angelNetworkConfig.isLoggedIn);

            if (isLoggedIn && (modalId === 'auth-modal' || modalId === 'choice-modal')) {
                e.preventDefault();
                const href = trigger.getAttribute('href');
                const targetUrl = (href && !href.startsWith('#')) ? href : (window.angelNetworkConfig?.dashboardUrl || '/dashboard/');
                window.location.href = targetUrl;
                return;
            }

            e.preventDefault();
            const initialTab = trigger.getAttribute('data-modal-tab') || 'register';
            let initialRole = trigger.getAttribute('data-modal-role') || 'investor';
            if (initialRole === 'business_owner') initialRole = 'entrepreneur';
            window.AngelModal.openModal(modalId, initialTab, initialRole);
        });
    });

    document.querySelectorAll('[data-close-modal]').forEach(btn => {
        btn.addEventListener('click', () => {
            const modalId = btn.getAttribute('data-close-modal');
            window.AngelModal.closeModal(modalId);
        });
    });

    document.querySelectorAll('.modal-backdrop').forEach(backdrop => {
        backdrop.addEventListener('click', (e) => {
            if (e.target === backdrop) {
                const modal = backdrop.closest('.modal-container');
                if (modal) window.AngelModal.closeModal(modal.id);
            }
        });
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-container:not(.hidden)').forEach(modal => {
                window.AngelModal.closeModal(modal.id);
            });
        }
    });

    // Role radio buttons
    const roleInvestor = document.getElementById('role-investor');
    const roleEntrepreneur = document.getElementById('role-entrepreneur');

    if (roleInvestor) {
        roleInvestor.addEventListener('change', () => window.AngelModal.switchRole('investor'));
    }
    if (roleEntrepreneur) {
        roleEntrepreneur.addEventListener('change', () => window.AngelModal.switchRole('entrepreneur'));
    }

    // Forgot Password Trigger & Back
    const forgotTrigger = document.getElementById('modal-trigger-forgot');
    const backLoginBtn = document.getElementById('modal-back-login');

    if (forgotTrigger) {
        forgotTrigger.addEventListener('click', (e) => {
            e.preventDefault();
            window.AngelModal.showForgotPassword();
        });
    }

    if (backLoginBtn) {
        backLoginBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.AngelModal.switchTab('login');
        });
    }

    // -------------------------------------------------------------
    // Live AJAX Registration Form Submission
    // -------------------------------------------------------------
    const regForm = document.getElementById('modal-form-register');
    const regSubmitBtn = document.getElementById('modal-reg-submit');
    const regSpinner = document.getElementById('modal-reg-spinner');
    const regErrorBox = document.getElementById('modal-register-error');
    const regErrorMsg = document.getElementById('modal-register-error-msg');
    const regSuccessBox = document.getElementById('modal-register-success');
    const regSuccessMsg = document.getElementById('modal-register-success-msg');

    if (regForm) {
        regForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            if (regErrorBox) regErrorBox.classList.add('hidden');

            const isInvestor = document.getElementById('role-investor')?.checked ?? true;
            const firstName = document.getElementById('reg-first-name')?.value.trim();
            const lastName = document.getElementById('reg-last-name')?.value.trim();
            const email = document.getElementById('reg-email')?.value.trim();
            const password = document.getElementById('reg-password')?.value;
            const confirmPassword = document.getElementById('reg-password-confirm')?.value;
            const termsAgreed = document.getElementById('terms-agree')?.checked;

            // Client Validation Checks
            if (!firstName || !lastName) {
                showRegError('Please provide your first and last name.');
                return;
            }
            if (!email) {
                showRegError('Please provide a valid email address.');
                return;
            }
            if (!password || password.length < 8) {
                showRegError('Password must be at least 8 characters long.');
                return;
            }
            if (password !== confirmPassword) {
                showRegError('Passwords do not match. Please verify your entries.');
                return;
            }
            if (!termsAgreed) {
                showRegError('You must agree to the Terms of Service and Privacy Policy to create an account.');
                return;
            }

            const payload = {
                first_name: firstName,
                last_name: lastName,
                email: email,
                password: password,
                password_confirm: confirmPassword,
                terms_agree: 1,
                privacy_agree: 1
            };

            let endpoint = `${window.AngelModal.getApiBase()}/auth/register-investor`;

            if (isInvestor) {
                const country = document.getElementById('reg-country')?.value;
                if (!country) {
                    showRegError('Please select your country of residence.');
                    return;
                }
                payload.country = country;
            } else {
                const businessName = document.getElementById('reg-business-name')?.value.trim();
                const businessLocation = document.getElementById('reg-business-location')?.value;
                if (!businessName) {
                    showRegError('Please provide your business or enterprise name.');
                    return;
                }
                if (!businessLocation) {
                    showRegError('Please select your business location or province.');
                    return;
                }
                payload.business_name = businessName;
                payload.business_location = businessLocation;
                endpoint = `${window.AngelModal.getApiBase()}/auth/register-business-owner`;
            }

            // UI Loading state
            if (regSubmitBtn) regSubmitBtn.disabled = true;
            if (regSpinner) regSpinner.classList.remove('hidden');

            try {
                const response = await fetch(endpoint, {
                    method: 'POST',
                    headers: window.AngelModal.getHeaders(),
                    body: JSON.stringify(payload)
                });

                const data = await response.json();

                if (!response.ok || data.code) {
                    const message = data.message || 'Registration error. Please check your data and try again.';
                    showRegError(message);
                } else {
                    // Success! Show confirmation screen
                    regForm.classList.add('hidden');
                    if (regSuccessBox) regSuccessBox.classList.remove('hidden');
                    if (regSuccessMsg) {
                        regSuccessMsg.innerText = `A verification email has been dispatched to ${email}. Please check your inbox and verify your email to activate your account.`;
                    }
                    window.AngelModal.currentPendingEmail = email;
                }
            } catch (err) {
                showRegError('Connection error. Please try again or contact support.');
            } finally {
                if (regSubmitBtn) regSubmitBtn.disabled = false;
                if (regSpinner) regSpinner.classList.add('hidden');
            }
        });
    }

    function showRegError(msg) {
        if (regErrorBox && regErrorMsg) {
            regErrorMsg.innerText = msg;
            regErrorBox.classList.remove('hidden');
        }
    }

    // -------------------------------------------------------------
    // Live AJAX Login Form Submission
    // -------------------------------------------------------------
    const loginForm = document.getElementById('modal-form-login');
    const loginSubmitBtn = document.getElementById('modal-login-submit');
    const loginSpinner = document.getElementById('modal-login-spinner');
    const loginErrorBox = document.getElementById('modal-login-error');
    const loginErrorMsg = document.getElementById('modal-login-error-msg');
    const loginSuccessBox = document.getElementById('modal-login-success');
    const resendBox = document.getElementById('modal-resend-box');
    const resendBtn = document.getElementById('modal-resend-btn');
    const resendFeedback = document.getElementById('modal-resend-feedback');

    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            if (loginErrorBox) loginErrorBox.classList.add('hidden');
            if (loginSuccessBox) loginSuccessBox.classList.add('hidden');
            if (resendBox) resendBox.classList.add('hidden');

            const username = document.getElementById('login-username')?.value.trim();
            const password = document.getElementById('login-password')?.value;
            const remember = document.getElementById('login-remember')?.checked;

            if (!username || !password) {
                showLoginError('Please enter both your email/username and password.');
                return;
            }

            if (loginSubmitBtn) loginSubmitBtn.disabled = true;
            if (loginSpinner) loginSpinner.classList.remove('hidden');

            try {
                const response = await fetch(`${window.AngelModal.getApiBase()}/auth/login`, {
                    method: 'POST',
                    headers: window.AngelModal.getHeaders(),
                    body: JSON.stringify({ username, password, remember })
                });

                const data = await response.json();

                if (!response.ok || data.code) {
                    const message = data.message || 'Invalid login credentials.';
                    showLoginError(message);

                    // Check if pending verification
                    if (data.code === 'pending_verification' || (data.data && data.data.status === 403)) {
                        window.AngelModal.currentPendingEmail = data.data?.email || username;
                        if (resendBox) resendBox.classList.remove('hidden');
                    }
                } else {
                    // Success!
                    if (loginSuccessBox) loginSuccessBox.classList.remove('hidden');
                    setTimeout(() => {
                        window.location.href = data.redirect || '/dashboard/';
                    }, 500);
                }
            } catch (err) {
                showLoginError('Connection error. Please try again.');
            } finally {
                if (loginSubmitBtn) loginSubmitBtn.disabled = false;
                if (loginSpinner) loginSpinner.classList.add('hidden');
            }
        });
    }

    function showLoginError(msg) {
        if (loginErrorBox && loginErrorMsg) {
            loginErrorMsg.innerText = msg;
            loginErrorBox.classList.remove('hidden');
        }
    }

    // Resend verification trigger in login modal
    if (resendBtn) {
        resendBtn.addEventListener('click', async (e) => {
            e.preventDefault();
            const email = window.AngelModal.currentPendingEmail;
            if (!email) return;

            resendBtn.disabled = true;
            resendBtn.innerText = 'Dispatching verification link...';

            try {
                const response = await fetch(`${window.AngelModal.getApiBase()}/auth/resend-verification`, {
                    method: 'POST',
                    headers: window.AngelModal.getHeaders(),
                    body: JSON.stringify({ email })
                });
                const data = await response.json();

                if (resendFeedback) {
                    resendFeedback.innerText = data.message || 'Verification email resent! Please check your inbox.';
                    resendFeedback.classList.remove('hidden');
                }
            } catch (err) {
                if (resendFeedback) {
                    resendFeedback.innerText = 'Could not resend email at this time.';
                    resendFeedback.classList.remove('hidden');
                }
            } finally {
                resendBtn.innerText = 'Resend verification link to my email →';
                resendBtn.disabled = false;
            }
        });
    }

    // -------------------------------------------------------------
    // Live Forgot Password Submission
    // -------------------------------------------------------------
    const forgotForm = document.getElementById('modal-form-forgot');
    const forgotSubmitBtn = document.getElementById('modal-forgot-submit');
    const forgotSpinner = document.getElementById('modal-forgot-spinner');
    const forgotFeedback = document.getElementById('modal-forgot-feedback');

    if (forgotForm) {
        forgotForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const email = document.getElementById('forgot-email')?.value.trim();
            if (!email) return;

            if (forgotSubmitBtn) forgotSubmitBtn.disabled = true;
            if (forgotSpinner) forgotSpinner.classList.remove('hidden');

            try {
                const response = await fetch(`${window.AngelModal.getApiBase()}/auth/forgot-password`, {
                    method: 'POST',
                    headers: window.AngelModal.getHeaders(),
                    body: JSON.stringify({ email })
                });

                const data = await response.json();

                if (forgotFeedback) {
                    forgotFeedback.innerText = data.message || 'If an account exists for this email address, password reset instructions have been sent.';
                    forgotFeedback.classList.remove('hidden');
                }
            } catch (err) {
                if (forgotFeedback) {
                    forgotFeedback.innerText = 'If an account exists for this email address, password reset instructions have been sent.';
                    forgotFeedback.classList.remove('hidden');
                }
            } finally {
                if (forgotSubmitBtn) forgotSubmitBtn.disabled = false;
                if (forgotSpinner) forgotSpinner.classList.add('hidden');
            }
        });
    }
});
