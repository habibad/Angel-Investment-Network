<?php
/**
 * Authentication Modal (Login / Register with Role Selector: Investor vs Business Owner)
 * Fully functional AJAX-powered modal matching approved theme design.
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cuban_provinces = [
    'La Habana'           => 'La Habana (Havana)',
    'Santiago de Cuba'    => 'Santiago de Cuba',
    'Holguín'             => 'Holguín',
    'Matanzas'            => 'Matanzas (Varadero)',
    'Villa Clara'         => 'Villa Clara (Santa Clara)',
    'Camagüey'            => 'Camagüey',
    'Cienfuegos'          => 'Cienfuegos',
    'Pinar del Río'       => 'Pinar del Río',
    'Sancti Spíritus'     => 'Sancti Spíritus (Trinidad)',
    'Ciego de Ávila'      => 'Ciego de Ávila',
    'Las Tunas'           => 'Las Tunas',
    'Granma'              => 'Granma (Bayamo)',
    'Guantánamo'          => 'Guantánamo',
    'Artemisa'            => 'Artemisa',
    'Mayabeque'           => 'Mayabeque',
    'Isla de la Juventud' => 'Isla de la Juventud',
];

$countries = [
    'United States'  => 'United States',
    'Spain'          => 'Spain',
    'Canada'         => 'Canada',
    'United Kingdom' => 'United Kingdom',
    'Mexico'         => 'Mexico',
    'Panama'         => 'Panama',
    'Italy'          => 'Italy',
    'France'         => 'France',
    'Germany'        => 'Germany',
    'Switzerland'    => 'Switzerland',
    'Other'          => 'Other Country',
];
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
                <span class="text-[10px] uppercase font-bold tracking-wider text-primary bg-primary-50 px-2.5 py-1 rounded-md">
                    <?php esc_html_e( 'Opportunity Portal', 'angel-network' ); ?>
                </span>
            </div>

            <!-- Tab Buttons -->
            <div id="modal-tab-nav" class="flex border-b border-slate-200">
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

        <div class="p-6 max-h-[82vh] overflow-y-auto">

            <!-- ================= REGISTER VIEW ================= -->
            <div id="modal-view-register" class="space-y-4">

                <!-- Success Confirmation State -->
                <div id="modal-register-success" class="hidden p-5 bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-xl text-center space-y-3">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto text-xl font-bold">✓</div>
                    <h3 class="text-base font-bold text-emerald-900"><?php esc_html_e( 'Registration Received!', 'angel-network' ); ?></h3>
                    <p id="modal-register-success-msg" class="text-xs text-emerald-800 leading-relaxed">
                        <?php esc_html_e( 'A verification email has been dispatched to your email address. Please check your inbox and verify your account.', 'angel-network' ); ?>
                    </p>
                    <button type="button" onclick="window.AngelModal.switchTab('login')" class="btn btn-primary btn-sm px-6 font-bold shadow-sm">
                        <?php esc_html_e( 'Proceed to Log In', 'angel-network' ); ?>
                    </button>
                </div>

                <!-- Error Alert Box -->
                <div id="modal-register-error" class="hidden p-3.5 bg-red-50 border border-red-200 text-red-800 rounded-xl text-xs flex items-start gap-2.5">
                    <span class="font-bold text-red-600 mt-0.5">⚠️</span>
                    <span id="modal-register-error-msg" class="leading-relaxed"></span>
                </div>

                <!-- Registration Form -->
                <form id="modal-form-register" action="#" method="POST" class="space-y-4" novalidate>
                    <!-- Role Selector (Investor vs Business Owner) -->
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
                                <span><?php esc_html_e( 'Join as Business Owner', 'angel-network' ); ?></span>
                            </label>
                        </div>
                    </div>

                    <!-- Name Inputs -->
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="reg-first-name" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'First Name *', 'angel-network' ); ?></label>
                            <input type="text" id="reg-first-name" name="first_name" required placeholder="Elena" class="form-input text-xs sm:text-sm">
                        </div>
                        <div>
                            <label for="reg-last-name" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Last Name *', 'angel-network' ); ?></label>
                            <input type="text" id="reg-last-name" name="last_name" required placeholder="Vance" class="form-input text-xs sm:text-sm">
                        </div>
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="reg-email" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Email Address *', 'angel-network' ); ?></label>
                        <input type="email" id="reg-email" name="email" required placeholder="your.name@example.com" class="form-input text-xs sm:text-sm">
                    </div>

                    <!-- Password Inputs -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label for="reg-password" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Password (min. 8 chars) *', 'angel-network' ); ?></label>
                            <div class="relative">
                                <input type="password" id="reg-password" name="password" required minlength="8" placeholder="••••••••" class="form-input text-xs sm:text-sm pr-9">
                                <button type="button" class="absolute inset-y-0 right-0 pr-2.5 flex items-center text-slate-400 hover:text-slate-600" onclick="const p=document.getElementById('reg-password'); p.type = p.type==='password'?'text':'password';">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label for="reg-password-confirm" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Confirm Password *', 'angel-network' ); ?></label>
                            <div class="relative">
                                <input type="password" id="reg-password-confirm" name="password_confirm" required minlength="8" placeholder="••••••••" class="form-input text-xs sm:text-sm pr-9">
                                <button type="button" class="absolute inset-y-0 right-0 pr-2.5 flex items-center text-slate-400 hover:text-slate-600" onclick="const p=document.getElementById('reg-password-confirm'); p.type = p.type==='password'?'text':'password';">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Role-Specific Fields: Investor (Country & Clause) -->
                    <div id="modal-investor-fields" class="space-y-3">
                        <div>
                            <label for="reg-country" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Country of Residence *', 'angel-network' ); ?></label>
                            <select id="reg-country" name="country" class="form-input text-xs sm:text-sm">
                                <option value=""><?php esc_html_e( '— Select Your Country —', 'angel-network' ); ?></option>
                                <?php foreach ( $countries as $c_val => $c_label ) : ?>
                                    <option value="<?php echo esc_attr( $c_val ); ?>"><?php echo esc_html( $c_label ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div id="investor-accreditation-clause" class="p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-600">
                            <div class="flex items-start gap-2">
                                <input type="checkbox" id="investor-cert" checked class="mt-0.5 rounded text-accent focus:ring-accent">
                                <label for="investor-cert" class="cursor-pointer text-[11px] leading-relaxed text-slate-600">
                                    <?php esc_html_e( 'I confirm that I am exploring private business opportunities in accordance with applicable laws in my jurisdiction.', 'angel-network' ); ?>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Role-Specific Fields: Business Owner (Business Name & Location) -->
                    <div id="modal-business-fields" class="space-y-3 hidden">
                        <div>
                            <label for="reg-business-name" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Business / Enterprise Name *', 'angel-network' ); ?></label>
                            <input type="text" id="reg-business-name" name="business_name" placeholder="e.g. Caribe Logistics S.R.L." class="form-input text-xs sm:text-sm">
                        </div>
                        <div>
                            <label for="reg-business-location" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Business Location / Province *', 'angel-network' ); ?></label>
                            <select id="reg-business-location" name="business_location" class="form-input text-xs sm:text-sm">
                                <option value=""><?php esc_html_e( '— Select Cuban Province —', 'angel-network' ); ?></option>
                                <?php foreach ( $cuban_provinces as $p_val => $p_name ) : ?>
                                    <option value="<?php echo esc_attr( $p_val ); ?>"><?php echo esc_html( $p_name ); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Legal Consent -->
                    <div class="space-y-2 pt-1 text-xs text-slate-600">
                        <div class="flex items-start gap-2">
                            <input type="checkbox" id="terms-agree" name="terms_agree" required class="mt-0.5 rounded text-primary focus:ring-primary">
                            <label for="terms-agree" class="cursor-pointer text-[11px] leading-relaxed text-slate-600">
                                <?php printf( 
                                    esc_html__( 'I agree to the %sTerms of Service%s and %sPrivacy Policy%s.', 'angel-network' ),
                                    '<a href="' . esc_url( home_url( '/terms-of-service/' ) ) . '" target="_blank" class="text-primary font-bold hover:underline">', '</a>',
                                    '<a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '" target="_blank" class="text-primary font-bold hover:underline">', '</a>'
                                ); ?>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        id="modal-reg-submit" 
                        type="submit" 
                        class="btn btn-primary w-full btn-lg mt-2 font-bold shadow-md cursor-pointer flex items-center justify-center gap-2"
                    >
                        <span id="modal-reg-btn-text"><?php esc_html_e( 'Create Free Account', 'angel-network' ); ?></span>
                        <svg id="modal-reg-spinner" class="animate-spin h-4 w-4 text-white hidden" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    </button>

                    <!-- Switch to Login -->
                    <p class="text-xs text-center text-slate-500 pt-1">
                        <?php esc_html_e( 'Already registered?', 'angel-network' ); ?> 
                        <button type="button" onclick="window.AngelModal.switchTab('login')" class="text-primary font-bold hover:underline cursor-pointer ml-1">
                            <?php esc_html_e( 'Log In', 'angel-network' ); ?> &rarr;
                        </button>
                    </p>
                </form>
            </div>

            <!-- ================= LOGIN VIEW ================= -->
            <div id="modal-view-login" class="space-y-4 hidden">

                <!-- Error Alert Box -->
                <div id="modal-login-error" class="hidden p-3.5 bg-red-50 border border-red-200 text-red-800 rounded-xl text-xs flex flex-col gap-2">
                    <div class="flex items-start gap-2">
                        <span class="font-bold text-red-600 mt-0.5">⚠️</span>
                        <span id="modal-login-error-msg" class="leading-relaxed"></span>
                    </div>
                    <!-- Quick Resend Button if account is pending verification -->
                    <div id="modal-resend-box" class="hidden pl-6 pt-1 border-t border-red-200/60">
                        <button type="button" id="modal-resend-btn" class="text-xs font-bold text-red-700 hover:underline cursor-pointer">
                            <?php esc_html_e( 'Resend verification link to my email &rarr;', 'angel-network' ); ?>
                        </button>
                        <span id="modal-resend-feedback" class="block text-[11px] text-emerald-700 mt-1 font-semibold hidden"></span>
                    </div>
                </div>

                <!-- Success Alert Box -->
                <div id="modal-login-success" class="hidden p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs flex items-center gap-2">
                    <span class="font-bold text-emerald-600">✓</span>
                    <span><?php esc_html_e( 'Authenticated successfully! Redirecting to portal...', 'angel-network' ); ?></span>
                </div>

                <!-- Login Form -->
                <form id="modal-form-login" action="#" method="POST" class="space-y-4" novalidate>
                    <div>
                        <label for="login-username" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Email Address or Username *', 'angel-network' ); ?></label>
                        <input type="text" id="login-username" name="username" required autocomplete="username" placeholder="your.name@example.com" class="form-input text-xs sm:text-sm">
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label for="login-password" class="text-xs font-medium text-slate-700"><?php esc_html_e( 'Password *', 'angel-network' ); ?></label>
                            <button type="button" id="modal-trigger-forgot" class="text-xs text-primary font-semibold hover:underline cursor-pointer">
                                <?php esc_html_e( 'Forgot password?', 'angel-network' ); ?>
                            </button>
                        </div>
                        <div class="relative">
                            <input type="password" id="login-password" name="password" required autocomplete="current-password" placeholder="••••••••" class="form-input text-xs sm:text-sm pr-9">
                            <button type="button" class="absolute inset-y-0 right-0 pr-2.5 flex items-center text-slate-400 hover:text-slate-600" onclick="const p=document.getElementById('login-password'); p.type = p.type==='password'?'text':'password';">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-xs text-slate-600">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="login-remember" name="remember" class="rounded text-primary focus:ring-primary">
                            <span><?php esc_html_e( 'Keep me signed in', 'angel-network' ); ?></span>
                        </label>
                    </div>

                    <button 
                        id="modal-login-submit" 
                        type="submit" 
                        class="btn btn-primary w-full btn-lg mt-2 font-bold shadow-md cursor-pointer flex items-center justify-center gap-2"
                    >
                        <span id="modal-login-btn-text"><?php esc_html_e( 'Sign In to Portal', 'angel-network' ); ?></span>
                        <svg id="modal-login-spinner" class="animate-spin h-4 w-4 text-white hidden" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    </button>

                    <!-- Switch to Register -->
                    <p class="text-xs text-center text-slate-500 pt-1">
                        <?php esc_html_e( 'New to the network?', 'angel-network' ); ?> 
                        <button type="button" onclick="window.AngelModal.switchTab('register')" class="text-accent font-bold hover:underline cursor-pointer ml-1">
                            <?php esc_html_e( 'Join Network', 'angel-network' ); ?> &rarr;
                        </button>
                    </p>
                </form>
            </div>

            <!-- ================= FORGOT PASSWORD VIEW ================= -->
            <div id="modal-view-forgot" class="space-y-4 hidden">
                <div class="text-center mb-2">
                    <h3 class="text-lg font-heading font-extrabold text-primary"><?php esc_html_e( 'Reset Your Password', 'angel-network' ); ?></h3>
                    <p class="text-xs text-slate-600 mt-1"><?php esc_html_e( 'Enter your registered email address and we will dispatch password recovery instructions.', 'angel-network' ); ?></p>
                </div>

                <div id="modal-forgot-feedback" class="hidden p-3 bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-xl text-xs leading-relaxed"></div>

                <form id="modal-form-forgot" action="#" method="POST" class="space-y-4" novalidate>
                    <div>
                        <label for="forgot-email" class="block text-xs font-medium text-slate-700 mb-1"><?php esc_html_e( 'Registered Email *', 'angel-network' ); ?></label>
                        <input type="email" id="forgot-email" name="email" required placeholder="your.name@example.com" class="form-input text-xs sm:text-sm">
                    </div>

                    <button 
                        id="modal-forgot-submit" 
                        type="submit" 
                        class="btn btn-primary w-full btn-lg font-bold shadow-md cursor-pointer flex items-center justify-center gap-2"
                    >
                        <span id="modal-forgot-btn-text"><?php esc_html_e( 'Send Recovery Link', 'angel-network' ); ?></span>
                        <svg id="modal-forgot-spinner" class="animate-spin h-4 w-4 text-white hidden" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    </button>

                    <div class="text-center pt-1">
                        <button type="button" id="modal-back-login" class="text-xs font-bold text-slate-600 hover:text-primary">
                            &larr; <?php esc_html_e( 'Back to Log In', 'angel-network' ); ?>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Fallback Alias for choice-modal -->
<div id="choice-modal" class="hidden"></div>
