<?php
/**
 * Authentication Modal (Login / Register with Role Selector: Investor vs Fundraiser/Business Owner)
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div id="auth-modal" class="modal-container fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/75 backdrop-blur-sm" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="modal-backdrop absolute inset-0 cursor-pointer"></div>

    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden z-10 transition-all duration-300">
        <!-- Close Button -->
        <button 
            type="button" 
            data-close-modal="auth-modal" 
            aria-label="<?php esc_attr_e( 'Close modal', 'angel-network' ); ?>"
            class="absolute top-4 right-4 p-2 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-full transition-colors cursor-pointer z-20"
        >
            <?php echo angel_get_svg_icon( 'close', 'w-5 h-5' ); ?>
        </button>

        <!-- Modal Header with Tab Switcher -->
        <div class="px-6 pt-6 pb-2 border-b border-slate-100 bg-white">
            <div class="flex items-center justify-between gap-3 mb-4">
                <img 
                    src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" 
                    alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
                    class="h-9 w-auto object-contain"
                >
                <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 bg-slate-100 px-2.5 py-1 rounded-md">
                    <?php esc_html_e( 'Opportunity Portal', 'angel-network' ); ?>
                </span>
            </div>

            <!-- Tab Buttons -->
            <div class="flex border-b border-slate-200">
                <button 
                    id="modal-tab-register" 
                    type="button" 
                    onclick="window.AngelModal.switchTab('register')"
                    class="flex-1 py-3 text-sm font-semibold border-b-2 border-primary text-primary transition-colors cursor-pointer text-center"
                >
                    <?php esc_html_e( 'Create Account', 'angel-network' ); ?>
                </button>
                <button 
                    id="modal-tab-login" 
                    type="button" 
                    onclick="window.AngelModal.switchTab('login')"
                    class="flex-1 py-3 text-sm font-semibold border-b-2 border-transparent text-slate-500 hover:text-slate-800 transition-colors cursor-pointer text-center"
                >
                    <?php esc_html_e( 'Log In', 'angel-network' ); ?>
                </button>
            </div>
        </div>

        <div class="p-6 max-h-[80vh] overflow-y-auto">
            <!-- Informational Notice (Feedback for Pre-Launch) -->
            <div id="modal-demo-notice" class="hidden mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs flex items-start gap-2.5">
                <span class="font-bold text-accent mt-0.5">ℹ</span>
                <div>
                    <span id="modal-demo-message" class="leading-relaxed">
                        <?php esc_html_e( 'Account functionality will be enabled in the upcoming launch phase. Inquiries and applications can be submitted directly through our contact and application pages.', 'angel-network' ); ?>
                    </span>
                </div>
            </div>

            <!-- ================= REGISTER FORM ================= -->
            <form id="modal-form-register" action="#" method="POST" class="space-y-4" onsubmit="event.preventDefault(); var n = document.getElementById('modal-demo-notice'); if(n) { n.classList.remove('hidden'); document.getElementById('modal-demo-message').innerText = 'Thank you for your interest. Automated account self-registration will be activated in the next release. Business owners can submit profiles directly via the For Business Owners section.'; }">
                <!-- Role Selector (Investor vs Fundraiser / Business Owner) -->
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
                        <?php esc_html_e( 'Select Your Objective', 'angel-network' ); ?>
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <label id="label-role-investor" class="flex items-center justify-center gap-2 p-3 border-2 border-primary bg-primary-50/50 rounded-xl cursor-pointer text-primary font-semibold text-xs sm:text-sm transition-all shadow-xs">
                            <input type="radio" name="account_role" id="role-investor" value="investor" checked class="text-primary focus:ring-primary">
                            <span><?php esc_html_e( 'Join as an Investor', 'angel-network' ); ?></span>
                        </label>
                        <label id="label-role-entrepreneur" class="flex items-center justify-center gap-2 p-3 border-2 border-slate-200 rounded-xl cursor-pointer text-slate-600 font-semibold text-xs sm:text-sm transition-all hover:border-slate-300">
                            <input type="radio" name="account_role" id="role-entrepreneur" value="entrepreneur" class="text-primary focus:ring-primary">
                            <span><?php esc_html_e( 'Join as a Fundraiser', 'angel-network' ); ?></span>
                        </label>
                    </div>
                </div>

                <!-- Name Inputs -->
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'First Name *', 'angel-network' ); ?></label>
                        <input type="text" required placeholder="Elena" class="form-input text-xs sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Last Name *', 'angel-network' ); ?></label>
                        <input type="text" required placeholder="Vance" class="form-input text-xs sm:text-sm">
                    </div>
                </div>

                <!-- Email Input -->
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Work / Business Email *', 'angel-network' ); ?></label>
                    <input type="email" required placeholder="elena@example.com" class="form-input text-xs sm:text-sm">
                </div>

                <!-- Password Input -->
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Password (min. 8 characters) *', 'angel-network' ); ?></label>
                    <input type="password" required minlength="8" placeholder="••••••••" class="form-input text-xs sm:text-sm">
                </div>

                <!-- Investor Jurisdiction & Responsibility Clause -->
                <div id="investor-accreditation-clause" class="p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-600 space-y-1.5">
                    <div class="flex items-start gap-2">
                        <input type="checkbox" id="investor-cert" required class="mt-0.5 rounded text-accent focus:ring-accent">
                        <label for="investor-cert" class="cursor-pointer text-[11px] leading-relaxed text-slate-600">
                            <?php esc_html_e( 'I confirm that I am an adult legally permitted to explore private business opportunities in my jurisdiction and understand that the platform provides general information only, not investment advice.', 'angel-network' ); ?>
                        </label>
                    </div>
                </div>

                <!-- Terms & Privacy -->
                <div class="flex items-start gap-2 text-xs text-slate-600">
                    <input type="checkbox" id="terms-agree" required class="mt-0.5 rounded text-primary focus:ring-primary">
                    <label for="terms-agree" class="cursor-pointer text-[11px] leading-relaxed text-slate-600">
                        <?php esc_html_e( 'I agree to the Terms of Service, Privacy Policy, and General Risk Disclosure.', 'angel-network' ); ?>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-full btn-lg mt-2 font-bold shadow-md cursor-pointer">
                    <?php esc_html_e( 'Create Free Account', 'angel-network' ); ?>
                </button>

                <!-- Quick Switch to Login -->
                <p class="text-xs text-center text-slate-500 pt-1">
                    <?php esc_html_e( 'Already registered?', 'angel-network' ); ?> 
                    <button type="button" onclick="window.AngelModal.switchTab('login')" class="text-primary font-bold hover:underline cursor-pointer ml-1">
                        <?php esc_html_e( 'Log In', 'angel-network' ); ?> &rarr;
                    </button>
                </p>
            </form>

            <!-- ================= LOGIN FORM ================= -->
            <form id="modal-form-login" action="#" method="POST" class="space-y-4 hidden" onsubmit="event.preventDefault(); var n = document.getElementById('modal-demo-notice'); if(n) { n.classList.remove('hidden'); document.getElementById('modal-demo-message').innerText = 'Notice: Member login authentication is scheduled for activation in the next release. In the meantime, all public opportunities and guides are freely accessible.'; }">
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Email Address *', 'angel-network' ); ?></label>
                    <input type="email" required placeholder="your.name@example.com" class="form-input text-xs sm:text-sm">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="text-xs font-medium text-slate-700"><?php esc_html_e( 'Password *', 'angel-network' ); ?></label>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-xs text-primary font-semibold hover:underline"><?php esc_html_e( 'Need help?', 'angel-network' ); ?></a>
                    </div>
                    <input type="password" required placeholder="••••••••" class="form-input text-xs sm:text-sm">
                </div>

                <div class="flex items-center justify-between text-xs text-slate-600">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="rounded text-primary focus:ring-primary">
                        <span><?php esc_html_e( 'Keep me signed in', 'angel-network' ); ?></span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-full btn-lg mt-2 font-bold shadow-md cursor-pointer">
                    <?php esc_html_e( 'Sign In to Portal', 'angel-network' ); ?>
                </button>

                <!-- Quick Switch to Register -->
                <p class="text-xs text-center text-slate-500 pt-1">
                    <?php esc_html_e( 'New to the network?', 'angel-network' ); ?> 
                    <button type="button" onclick="window.AngelModal.switchTab('register')" class="text-accent font-bold hover:underline cursor-pointer ml-1">
                        <?php esc_html_e( 'Join Network', 'angel-network' ); ?> &rarr;
                    </button>
                </p>
            </form>
        </div>
    </div>
</div>

<!-- Fallback Alias for choice-modal -->
<div id="choice-modal" class="hidden"></div>
