<?php
/**
 * Authentication Modal - Editorial Design
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div id="auth-modal" class="modal-container fixed inset-0 z-50 hidden items-center justify-center p-4 bg-brand-dark/60 backdrop-blur-xs" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="modal-backdrop absolute inset-0"></div>

    <div class="relative w-full max-w-lg bg-white rounded border border-brand-border shadow-float-quiet overflow-hidden z-10 transition-all duration-300">
        <!-- Close Button -->
        <button 
            type="button" 
            data-close-modal="auth-modal" 
            aria-label="<?php esc_attr_e( 'Close modal', 'angel-network' ); ?>"
            class="absolute top-4 right-4 p-2 text-brand-light hover:text-brand-dark rounded transition-colors cursor-pointer"
        >
            <?php echo angel_get_svg_icon( 'close', 'w-5 h-5' ); ?>
        </button>

        <!-- Modal Header with Tab Switcher -->
        <div class="px-8 pt-8 pb-4 border-b border-brand-border">
            <div class="mb-4">
                <span class="font-serif text-2xl font-bold tracking-tight text-brand-dark">
                    Angel<span class="font-sans font-light text-brand-muted text-lg ml-1">Network</span>
                </span>
                <p id="modal-title" class="text-xs font-sans text-brand-muted mt-1">
                    <?php esc_html_e( 'Private Syndicate & Opportunity Portal', 'angel-network' ); ?>
                </p>
            </div>

            <!-- Tab Buttons -->
            <div class="flex border-b border-brand-border">
                <button 
                    id="modal-tab-register" 
                    type="button" 
                    onclick="window.AngelModal.switchTab('register')"
                    class="flex-1 py-3 text-xs font-sans font-semibold uppercase tracking-wider border-b-2 border-brand-teal text-brand-teal transition-colors cursor-pointer"
                >
                    <?php esc_html_e( 'Join Platform', 'angel-network' ); ?>
                </button>
                <button 
                    id="modal-tab-login" 
                    type="button" 
                    onclick="window.AngelModal.switchTab('login')"
                    class="flex-1 py-3 text-xs font-sans font-semibold uppercase tracking-wider border-b-2 border-transparent text-brand-light hover:text-brand-dark transition-colors cursor-pointer"
                >
                    <?php esc_html_e( 'Sign In', 'angel-network' ); ?>
                </button>
            </div>
        </div>

        <div class="p-8 max-h-[80vh] overflow-y-auto">
            <!-- ================= REGISTER FORM ================= -->
            <form id="modal-form-register" action="#" method="POST" class="space-y-4" onsubmit="event.preventDefault(); alert('Demo Mode: Ready for Phase 2 database integration.');">
                <!-- Role Selector -->
                <div>
                    <label class="block text-[11px] font-sans font-semibold uppercase tracking-widest text-brand-muted mb-2">
                        <?php esc_html_e( 'Select Membership Role', 'angel-network' ); ?>
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <label id="label-role-investor" class="flex items-center justify-center gap-2 p-3 border border-brand-teal bg-brand-teal-light text-brand-teal rounded cursor-pointer font-sans font-medium text-xs transition-all">
                            <input type="radio" name="account_role" id="role-investor" value="investor" checked class="text-brand-teal focus:ring-brand-teal">
                            <span><?php esc_html_e( 'Accredited Investor', 'angel-network' ); ?></span>
                        </label>
                        <label id="label-role-entrepreneur" class="flex items-center justify-center gap-2 p-3 border border-brand-border text-brand-muted rounded cursor-pointer font-sans font-medium text-xs transition-all hover:border-brand-teal">
                            <input type="radio" name="account_role" id="role-entrepreneur" value="entrepreneur" class="text-brand-teal focus:ring-brand-teal">
                            <span><?php esc_html_e( 'Startup Founder', 'angel-network' ); ?></span>
                        </label>
                    </div>
                </div>

                <!-- Name Inputs -->
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-brand-dark mb-1"><?php esc_html_e( 'First Name *', 'angel-network' ); ?></label>
                        <input type="text" required placeholder="Elena" class="form-input-quiet">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-brand-dark mb-1"><?php esc_html_e( 'Last Name *', 'angel-network' ); ?></label>
                        <input type="text" required placeholder="Vance" class="form-input-quiet">
                    </div>
                </div>

                <!-- Email Input -->
                <div>
                    <label class="block text-xs font-medium text-brand-dark mb-1"><?php esc_html_e( 'Work Email *', 'angel-network' ); ?></label>
                    <input type="email" required placeholder="elena@company.com" class="form-input-quiet">
                </div>

                <!-- Password Input -->
                <div>
                    <label class="block text-xs font-medium text-brand-dark mb-1"><?php esc_html_e( 'Password *', 'angel-network' ); ?></label>
                    <input type="password" required minlength="8" placeholder="••••••••" class="form-input-quiet">
                </div>

                <!-- Investor Accreditation Notice -->
                <div id="investor-accreditation-clause" class="p-3 bg-brand-subtle border border-brand-border rounded text-xs text-brand-muted space-y-2">
                    <div class="flex items-start gap-2">
                        <input type="checkbox" id="investor-cert" required class="mt-0.5 rounded text-brand-teal focus:ring-brand-teal">
                        <label for="investor-cert" class="cursor-pointer text-[11px] leading-relaxed">
                            <?php esc_html_e( 'I attest that I meet accredited investor criteria under applicable Canadian exempt distribution regulations (NI 45-106).', 'angel-network' ); ?>
                        </label>
                    </div>
                </div>

                <!-- Terms Agreement -->
                <div class="flex items-start gap-2 text-xs text-brand-muted">
                    <input type="checkbox" id="terms-agree" required class="mt-0.5 rounded text-brand-teal focus:ring-brand-teal">
                    <label for="terms-agree" class="cursor-pointer text-[11px] leading-relaxed">
                        <?php esc_html_e( 'I agree to the Terms of Service, Privacy Policy, and platform due diligence confidentiality rules.', 'angel-network' ); ?>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-full mt-2">
                    <?php esc_html_e( 'Create Account →', 'angel-network' ); ?>
                </button>
            </form>

            <!-- ================= LOGIN FORM ================= -->
            <form id="modal-form-login" action="#" method="POST" class="space-y-4 hidden" onsubmit="event.preventDefault(); alert('Demo Mode: Ready for Phase 2 database integration.');">
                <div>
                    <label class="block text-xs font-medium text-brand-dark mb-1"><?php esc_html_e( 'Email Address', 'angel-network' ); ?></label>
                    <input type="email" required placeholder="your.name@example.com" class="form-input-quiet">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="text-xs font-medium text-brand-dark"><?php esc_html_e( 'Password', 'angel-network' ); ?></label>
                        <a href="#" class="text-xs text-brand-teal hover:underline"><?php esc_html_e( 'Forgot password?', 'angel-network' ); ?></a>
                    </div>
                    <input type="password" required placeholder="••••••••" class="form-input-quiet">
                </div>

                <div class="flex items-center justify-between text-xs text-brand-muted">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="rounded text-brand-teal focus:ring-brand-teal">
                        <span><?php esc_html_e( 'Remember session', 'angel-network' ); ?></span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-full mt-2">
                    <?php esc_html_e( 'Sign In to Portal →', 'angel-network' ); ?>
                </button>
            </form>
        </div>
    </div>
</div>
