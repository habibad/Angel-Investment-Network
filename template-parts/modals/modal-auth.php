<?php
/**
 * Authentication Modal (Login / Register with Role Selector)
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div id="auth-modal" class="modal-container fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/70 backdrop-blur-sm" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="modal-backdrop absolute inset-0"></div>

    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden z-10 transition-all duration-300">
        <!-- Close Button -->
        <button 
            type="button" 
            data-close-modal="auth-modal" 
            aria-label="<?php esc_attr_e( 'Close modal', 'angel-network' ); ?>"
            class="absolute top-4 right-4 p-2 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-full transition-colors cursor-pointer"
        >
            <?php echo angel_get_svg_icon( 'close', 'w-5 h-5' ); ?>
        </button>

        <!-- Modal Header with Tab Switcher -->
        <div class="px-6 pt-6 pb-2 border-b border-slate-100">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-white font-extrabold text-sm">
                    <span class="text-accent text-lg">▲</span>
                </div>
                <h3 id="modal-title" class="text-xl font-heading font-bold text-primary">
                    <?php esc_html_e( 'Angel Network Portal', 'angel-network' ); ?>
                </h3>
            </div>

            <!-- Tab Buttons -->
            <div class="flex border-b border-slate-200">
                <button 
                    id="modal-tab-register" 
                    type="button" 
                    onclick="window.AngelModal.switchTab('register')"
                    class="flex-1 py-3 text-sm font-semibold border-b-2 border-primary text-primary transition-colors cursor-pointer"
                >
                    <?php esc_html_e( 'Create Account', 'angel-network' ); ?>
                </button>
                <button 
                    id="modal-tab-login" 
                    type="button" 
                    onclick="window.AngelModal.switchTab('login')"
                    class="flex-1 py-3 text-sm font-semibold border-b-2 border-transparent text-slate-500 hover:text-slate-800 transition-colors cursor-pointer"
                >
                    <?php esc_html_e( 'Log In', 'angel-network' ); ?>
                </button>
            </div>
        </div>

        <div class="p-6 max-h-[80vh] overflow-y-auto">
            <!-- ================= REGISTER FORM ================= -->
            <form id="modal-form-register" action="#" method="POST" class="space-y-4" onsubmit="event.preventDefault(); alert('Demo Mode: Account registration endpoint ready for Phase 2 database integration.');">
                <!-- Role Selector (Investor vs Entrepreneur) -->
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
                        <?php esc_html_e( 'Select Your Role', 'angel-network' ); ?>
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <label id="label-role-investor" class="flex items-center justify-center gap-2 p-3 border-2 border-primary bg-primary-50/50 rounded-xl cursor-pointer text-primary font-semibold text-sm transition-all">
                            <input type="radio" name="account_role" id="role-investor" value="investor" checked class="text-primary focus:ring-primary">
                            <span><?php esc_html_e( 'I’m an Investor', 'angel-network' ); ?></span>
                        </label>
                        <label id="label-role-entrepreneur" class="flex items-center justify-center gap-2 p-3 border-2 border-slate-200 rounded-xl cursor-pointer text-slate-600 font-semibold text-sm transition-all hover:border-slate-300">
                            <input type="radio" name="account_role" id="role-entrepreneur" value="entrepreneur" class="text-primary focus:ring-primary">
                            <span><?php esc_html_e( 'I’m an Entrepreneur', 'angel-network' ); ?></span>
                        </label>
                    </div>
                </div>

                <!-- Name Inputs -->
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'First Name *', 'angel-network' ); ?></label>
                        <input type="text" required placeholder="Elena" class="form-input">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Last Name *', 'angel-network' ); ?></label>
                        <input type="text" required placeholder="Vance" class="form-input">
                    </div>
                </div>

                <!-- Email Input -->
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Work / Business Email *', 'angel-network' ); ?></label>
                    <input type="email" required placeholder="elena@example.com" class="form-input">
                </div>

                <!-- Password Input -->
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Password (min. 8 characters) *', 'angel-network' ); ?></label>
                    <input type="password" required minlength="8" placeholder="••••••••" class="form-input">
                </div>

                <!-- Investor Accreditation Notice -->
                <div id="investor-accreditation-clause" class="p-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-600 space-y-2">
                    <div class="flex items-start gap-2">
                        <input type="checkbox" id="investor-cert" required class="mt-0.5 rounded text-accent focus:ring-accent">
                        <label for="investor-cert" class="cursor-pointer">
                            <?php esc_html_e( 'I certify that I meet accredited / sophisticated investor eligibility criteria for exempt distributions under applicable securities regulations.', 'angel-network' ); ?>
                        </label>
                    </div>
                </div>

                <!-- Terms & Privacy -->
                <div class="flex items-start gap-2 text-xs text-slate-600">
                    <input type="checkbox" id="terms-agree" required class="mt-0.5 rounded text-primary focus:ring-primary">
                    <label for="terms-agree" class="cursor-pointer">
                        <?php esc_html_e( 'I agree to the Terms of Service, Privacy Policy, and platform due diligence guidelines.', 'angel-network' ); ?>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-full btn-lg mt-2">
                    <?php esc_html_e( 'Create Free Account', 'angel-network' ); ?>
                </button>
            </form>

            <!-- ================= LOGIN FORM ================= -->
            <form id="modal-form-login" action="#" method="POST" class="space-y-4 hidden" onsubmit="event.preventDefault(); alert('Demo Mode: User authentication ready for Phase 2 database integration.');">
                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Email Address', 'angel-network' ); ?></label>
                    <input type="email" required placeholder="your.name@example.com" class="form-input">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="text-xs font-medium text-slate-700"><?php esc_html_e( 'Password', 'angel-network' ); ?></label>
                        <a href="#" class="text-xs text-primary font-semibold hover:underline"><?php esc_html_e( 'Forgot password?', 'angel-network' ); ?></a>
                    </div>
                    <input type="password" required placeholder="••••••••" class="form-input">
                </div>

                <div class="flex items-center justify-between text-xs text-slate-600">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="rounded text-primary focus:ring-primary">
                        <span><?php esc_html_e( 'Keep me signed in', 'angel-network' ); ?></span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-full btn-lg mt-2">
                    <?php esc_html_e( 'Sign In to Portal', 'angel-network' ); ?>
                </button>
            </form>
        </div>
    </div>
</div>
