<?php
/**
 * Primary Navigation Template Part
 * Conforms to Cuba Investment Network audit guidelines (PDF Pages 20, 27, 30, 34)
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$region_label = get_theme_mod( 'angel_region_label', 'Cuba' );
$is_logged_in = is_user_logged_in();
$current_user = $is_logged_in ? wp_get_current_user() : null;
$dashboard_url = home_url( '/dashboard/' );
if ( $is_logged_in && class_exists( '\CubaInvestment\Core\Auth\AuthManager' ) ) {
    $dashboard_url = \CubaInvestment\Core\Auth\AuthManager::get_user_dashboard_url( $current_user );
}

$user_id = $is_logged_in ? $current_user->ID : 0;
$first_name = $is_logged_in ? ( get_user_meta( $user_id, 'first_name', true ) ?: $current_user->first_name ) : '';
$last_name  = $is_logged_in ? ( get_user_meta( $user_id, 'last_name', true ) ?: $current_user->last_name ) : '';
$display_name = trim( "{$first_name} {$last_name}" ) ?: ( $current_user ? $current_user->display_name : '' );
$roles = $is_logged_in ? (array) $current_user->roles : [];

$is_investor = in_array( 'cin_investor', $roles, true ) || ( class_exists( '\CubaInvestment\Core\Common\Constants' ) && in_array( \CubaInvestment\Core\Common\Constants::ROLE_INVESTOR, $roles, true ) );
$is_business = in_array( 'cin_business_owner', $roles, true ) || ( class_exists( '\CubaInvestment\Core\Common\Constants' ) && in_array( \CubaInvestment\Core\Common\Constants::ROLE_BUSINESS_OWNER, $roles, true ) );

$profile_url = $is_investor ? home_url( '/investor/profile/' ) : ( $is_business ? home_url( '/business-owner/profile/' ) : home_url( '/account/' ) );

$avatar_url = $is_logged_in ? get_user_meta( $user_id, '_cin_avatar_url', true ) : '';
if ( empty( $avatar_url ) && $is_business ) {
    $avatar_url = get_user_meta( $user_id, '_cin_company_logo_url', true );
}

$initials = $is_logged_in ? strtoupper( substr( $first_name ?: ( $current_user->user_login ?? 'U' ), 0, 1 ) . substr( $last_name ?: '', 0, 1 ) ) : 'U';
if ( empty( $initials ) ) {
    $initials = 'CIN';
}
$role_badge = $is_investor ? __( 'Verified Investor', 'angel-network' ) : ( $is_business ? __( 'Verified Business Owner', 'angel-network' ) : __( 'Member', 'angel-network' ) );
?>

<div class="flex items-center justify-between w-full h-20">
    <!-- Brand Logo -->
    <div class="flex items-center shrink-0">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center group focus:outline-none focus:ring-2 focus:ring-primary rounded-lg p-1" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            <img 
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" 
                alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
                class="h-11 sm:h-12 w-auto object-contain transition-opacity duration-200 group-hover:opacity-90"
            >
        </a>
    </div>

    <!-- Desktop Navigation Menu (Organized & Styled) -->
    <nav class="hidden lg:flex items-center gap-1 xl:gap-1.5" aria-label="<?php esc_attr_e( 'Primary Menu', 'angel-network' ); ?>">
        <!-- Opportunities -->
        <a 
            href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" 
            class="px-3 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors"
        >
            <?php esc_html_e( 'Opportunities', 'angel-network' ); ?>
        </a>

        <!-- For Investors -->
        <a 
            href="<?php echo esc_url( home_url( '/invest/#eligibility' ) ); ?>" 
            class="px-3 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors"
        >
            <?php esc_html_e( 'For Investors', 'angel-network' ); ?>
        </a>

        <!-- For Business Owners -->
        <a 
            href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" 
            class="px-3 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors"
        >
            <?php esc_html_e( 'For Business Owners', 'angel-network' ); ?>
        </a>

        <!-- How It Works -->
        <a 
            href="<?php echo esc_url( home_url( '/services/' ) ); ?>" 
            class="px-3 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors"
        >
            <?php esc_html_e( 'How It Works', 'angel-network' ); ?>
        </a>

        <!-- Insights -->
        <a 
            href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" 
            class="px-3 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors"
        >
            <?php esc_html_e( 'Insights', 'angel-network' ); ?>
        </a>

        <!-- About Us -->
        <a 
            href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" 
            class="px-3 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors"
        >
            <?php esc_html_e( 'About', 'angel-network' ); ?>
        </a>

        <!-- Contact -->
        <a 
            href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" 
            class="px-3 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors"
        >
            <?php esc_html_e( 'Contact', 'angel-network' ); ?>
        </a>
    </nav>

    <!-- Header Actions -->
    <div class="hidden lg:flex items-center gap-3 shrink-0">
        <!-- Language Switcher -->
        <div class="header-language-switcher flex items-center">
            <?php 
            if ( shortcode_exists( 'gtranslate' ) ) {
                echo do_shortcode( '[gtranslate]' );
            } else {
                echo '<div class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg border border-slate-200 transition-colors" title="' . esc_attr__( 'Multi-Language Supported', 'angel-network' ) . '">';
                echo '<span class="text-sm">🌐</span> <span>EN / ES</span>';
                echo '</div>';
            }
            ?>
        </div>

        <?php if ( $is_logged_in ) : ?>
            <!-- User Profile Dropdown (Hover & Click to Expand) -->
            <div class="relative group nav-item-dropdown" id="header-user-menu">
                <button 
                    type="button" 
                    id="header-user-menu-btn"
                    aria-expanded="false" 
                    aria-haspopup="true"
                    class="nav-dropdown-toggle flex items-center gap-2.5 py-1.5 pl-2 pr-3 rounded-full border border-slate-200/90 bg-white hover:bg-slate-50 hover:border-slate-300 text-slate-700 hover:text-slate-900 shadow-2xs transition-all duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1"
                >
                    <!-- User Avatar Image / Initials Badge -->
                    <?php if ( ! empty( $avatar_url ) ) : ?>
                        <img 
                            src="<?php echo esc_url( $avatar_url ); ?>" 
                            alt="<?php echo esc_attr( $display_name ); ?>" 
                            class="w-7 h-7 rounded-full object-cover border border-slate-200 shrink-0"
                        >
                    <?php else : ?>
                        <span class="w-7 h-7 rounded-full bg-primary/10 text-primary font-bold text-xs flex items-center justify-center shrink-0 border border-primary/20">
                            <?php echo esc_html( $initials ); ?>
                        </span>
                    <?php endif; ?>

                    <!-- Profile Label -->
                    <span class="text-xs sm:text-sm font-semibold tracking-tight text-slate-800 group-hover:text-primary transition-colors">
                        <?php esc_html_e( 'Profile', 'angel-network' ); ?>
                    </span>

                    <!-- Dropdown Chevron Icon -->
                    <svg class="header-chevron-icon w-3.5 h-3.5 text-slate-400 group-hover:text-primary group-hover:rotate-180 transition-transform duration-200 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Expanded Dropdown Panel -->
                <div 
                    id="header-user-dropdown-panel"
                    class="header-user-dropdown-panel absolute right-0 top-full pt-2 w-64 opacity-0 invisible translate-y-1.5 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 transition-all duration-200 ease-out z-50 pointer-events-none group-hover:pointer-events-auto group-focus-within:pointer-events-auto"
                    role="menu"
                    aria-orientation="vertical"
                >
                    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 py-2 divide-y divide-slate-100 overflow-hidden ring-1 ring-black/5">
                        <!-- User Header Info -->
                        <div class="px-4 py-3 bg-slate-50/70">
                            <p class="text-xs font-bold text-slate-900 truncate"><?php echo esc_html( $display_name ); ?></p>
                            <p class="text-[11px] text-slate-500 truncate mt-0.5"><?php echo esc_html( $current_user->user_email ); ?></p>
                            <div class="mt-2">
                                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <?php echo esc_html( $role_badge ); ?>
                                </span>
                            </div>
                        </div>

                        <!-- Dropdown Navigation Links -->
                        <div class="py-1">
                            <!-- Dashboard -->
                            <a 
                                href="<?php echo esc_url( $dashboard_url ); ?>" 
                                class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-medium text-slate-700 hover:text-primary hover:bg-slate-50 transition-colors"
                                role="menuitem"
                            >
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span><?php esc_html_e( 'Dashboard', 'angel-network' ); ?></span>
                            </a>

                            <!-- View Profile -->
                            <a 
                                href="<?php echo esc_url( $profile_url ); ?>" 
                                class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-medium text-slate-700 hover:text-primary hover:bg-slate-50 transition-colors"
                                role="menuitem"
                            >
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span><?php esc_html_e( 'My Profile', 'angel-network' ); ?></span>
                            </a>

                            <?php if ( $is_business ) : ?>
                                <!-- Business Profile -->
                                <a 
                                    href="<?php echo esc_url( home_url( '/business-owner/business-profile/' ) ); ?>" 
                                    class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-medium text-slate-700 hover:text-primary hover:bg-slate-50 transition-colors"
                                    role="menuitem"
                                >
                                    <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span><?php esc_html_e( 'Business Profile', 'angel-network' ); ?></span>
                                </a>
                            <?php endif; ?>

                            <!-- Account Settings -->
                            <a 
                                href="<?php echo esc_url( home_url( '/account/' ) ); ?>" 
                                class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-medium text-slate-700 hover:text-primary hover:bg-slate-50 transition-colors"
                                role="menuitem"
                            >
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.065-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span><?php esc_html_e( 'Account Settings', 'angel-network' ); ?></span>
                            </a>
                        </div>

                        <!-- Divider & Log Out -->
                        <div class="py-1">
                            <a 
                                href="<?php echo esc_url( home_url( '/logout/' ) ); ?>" 
                                class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-semibold text-red-600 hover:bg-red-50 transition-colors"
                                role="menuitem"
                            >
                                <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span><?php esc_html_e( 'Log Out', 'angel-network' ); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <button 
                type="button" 
                data-open-modal="auth-modal" 
                data-modal-tab="login"
                class="px-3 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors cursor-pointer"
            >
                <?php esc_html_e( 'Log In', 'angel-network' ); ?>
            </button>
            <button 
                type="button" 
                data-open-modal="auth-modal" 
                data-modal-tab="register" 
                data-modal-role="investor"
                class="btn btn-primary btn-sm px-4 py-2 font-bold shadow-xs hover:shadow-md transition-all cursor-pointer"
            >
                <?php esc_html_e( 'Join Network', 'angel-network' ); ?>
            </button>
        <?php endif; ?>
    </div>

    <!-- Mobile Menu Button -->
    <div class="flex lg:hidden items-center gap-2">
        <button 
            id="mobile-menu-btn" 
            type="button" 
            aria-expanded="false" 
            aria-controls="mobile-menu" 
            aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'angel-network' ); ?>"
            class="p-2 text-slate-700 hover:text-primary hover:bg-slate-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary cursor-pointer"
        >
            <?php echo angel_get_svg_icon( 'menu', 'w-6 h-6' ); ?>
        </button>
    </div>
</div>

<!-- Mobile Navigation Drawer -->
<div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 bg-white py-4 px-3 shadow-xl transition-all duration-300">
    <div class="flex flex-col gap-1">
        <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="flex items-center justify-between px-3.5 py-2.5 text-sm font-semibold text-slate-800 hover:text-primary hover:bg-slate-50 rounded-lg transition-colors">
            <span><?php esc_html_e( 'Opportunities', 'angel-network' ); ?></span>
            <span class="text-slate-400">&rarr;</span>
        </a>
        <a href="<?php echo esc_url( home_url( '/invest/#eligibility' ) ); ?>" class="flex items-center justify-between px-3.5 py-2.5 text-sm font-semibold text-slate-800 hover:text-primary hover:bg-slate-50 rounded-lg transition-colors">
            <span><?php esc_html_e( 'For Investors', 'angel-network' ); ?></span>
            <span class="text-slate-400">&rarr;</span>
        </a>
        <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="flex items-center justify-between px-3.5 py-2.5 text-sm font-semibold text-slate-800 hover:text-primary hover:bg-slate-50 rounded-lg transition-colors">
            <span><?php esc_html_e( 'For Business Owners', 'angel-network' ); ?></span>
            <span class="text-slate-400">&rarr;</span>
        </a>
        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="flex items-center justify-between px-3.5 py-2.5 text-sm font-semibold text-slate-800 hover:text-primary hover:bg-slate-50 rounded-lg transition-colors">
            <span><?php esc_html_e( 'How It Works', 'angel-network' ); ?></span>
            <span class="text-slate-400">&rarr;</span>
        </a>
        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="flex items-center justify-between px-3.5 py-2.5 text-sm font-semibold text-slate-800 hover:text-primary hover:bg-slate-50 rounded-lg transition-colors">
            <span><?php esc_html_e( 'Insights', 'angel-network' ); ?></span>
            <span class="text-slate-400">&rarr;</span>
        </a>
        <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="flex items-center justify-between px-3.5 py-2.5 text-sm font-semibold text-slate-800 hover:text-primary hover:bg-slate-50 rounded-lg transition-colors">
            <span><?php esc_html_e( 'About', 'angel-network' ); ?></span>
            <span class="text-slate-400">&rarr;</span>
        </a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="flex items-center justify-between px-3.5 py-2.5 text-sm font-semibold text-slate-800 hover:text-primary hover:bg-slate-50 rounded-lg transition-colors">
            <span><?php esc_html_e( 'Contact', 'angel-network' ); ?></span>
            <span class="text-slate-400">&rarr;</span>
        </a>
    </div>

    <div class="mt-4 pt-4 border-t border-slate-100 flex flex-col gap-2.5 px-1">
        <!-- Mobile Language Switcher -->
        <div class="mobile-language-switcher flex items-center justify-between px-3 py-2 bg-slate-50 rounded-lg border border-slate-200">
            <span class="text-xs font-semibold uppercase tracking-wider text-slate-500 flex items-center gap-1.5">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                <?php esc_html_e( 'Language', 'angel-network' ); ?>
            </span>
            <div class="w-auto">
                <?php 
                if ( shortcode_exists( 'gtranslate' ) ) {
                    echo do_shortcode( '[gtranslate]' );
                } else {
                    echo '<span class="text-xs font-semibold text-slate-700 bg-white px-2.5 py-1 rounded border border-slate-200">EN / ES</span>';
                }
                ?>
            </div>
        </div>

        <?php if ( $is_logged_in ) : ?>
            <div class="flex flex-col gap-2 pt-1">
                <!-- Mobile User Summary Card -->
                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-200/80 mb-1">
                    <?php if ( ! empty( $avatar_url ) ) : ?>
                        <img 
                            src="<?php echo esc_url( $avatar_url ); ?>" 
                            alt="<?php echo esc_attr( $display_name ); ?>" 
                            class="w-10 h-10 rounded-full object-cover border border-slate-200 shrink-0"
                        >
                    <?php else : ?>
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary font-bold text-xs flex items-center justify-center shrink-0 border border-primary/20">
                            <?php echo esc_html( $initials ); ?>
                        </span>
                    <?php endif; ?>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs font-bold text-slate-900 truncate"><?php echo esc_html( $display_name ); ?></p>
                        <p class="text-[11px] text-slate-500 truncate mt-0.5"><?php echo esc_html( $current_user->user_email ); ?></p>
                        <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700 mt-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <?php echo esc_html( $role_badge ); ?>
                        </span>
                    </div>
                </div>

                <!-- Dashboard -->
                <a 
                    href="<?php echo esc_url( $dashboard_url ); ?>" 
                    class="flex items-center justify-between px-3.5 py-2.5 text-xs font-bold text-primary bg-primary-50 rounded-lg transition-colors"
                >
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span><?php esc_html_e( 'Dashboard', 'angel-network' ); ?></span>
                    </span>
                    <span class="text-primary font-bold">&rarr;</span>
                </a>

                <!-- My Profile -->
                <a 
                    href="<?php echo esc_url( $profile_url ); ?>" 
                    class="flex items-center justify-between px-3.5 py-2.5 text-xs font-semibold text-slate-700 bg-slate-50 hover:bg-slate-100 rounded-lg transition-colors"
                >
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span><?php esc_html_e( 'My Profile', 'angel-network' ); ?></span>
                    </span>
                    <span class="text-slate-400">&rarr;</span>
                </a>

                <?php if ( $is_business ) : ?>
                    <!-- Business Profile -->
                    <a 
                        href="<?php echo esc_url( home_url( '/business-owner/business-profile/' ) ); ?>" 
                        class="flex items-center justify-between px-3.5 py-2.5 text-xs font-semibold text-slate-700 bg-slate-50 hover:bg-slate-100 rounded-lg transition-colors"
                    >
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span><?php esc_html_e( 'Business Profile', 'angel-network' ); ?></span>
                        </span>
                        <span class="text-slate-400">&rarr;</span>
                    </a>
                <?php endif; ?>

                <!-- Account Settings -->
                <a 
                    href="<?php echo esc_url( home_url( '/account/' ) ); ?>" 
                    class="flex items-center justify-between px-3.5 py-2.5 text-xs font-semibold text-slate-700 bg-slate-50 hover:bg-slate-100 rounded-lg transition-colors"
                >
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.065-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span><?php esc_html_e( 'Account Settings', 'angel-network' ); ?></span>
                    </span>
                    <span class="text-slate-400">&rarr;</span>
                </a>

                <!-- Log Out -->
                <a 
                    href="<?php echo esc_url( home_url( '/logout/' ) ); ?>" 
                    class="btn btn-outline w-full text-center text-xs font-semibold py-2.5 text-red-600 border-red-200 hover:bg-red-50 mt-1 block"
                >
                    <?php esc_html_e( 'Log Out', 'angel-network' ); ?>
                </a>
            </div>
        <?php else : ?>
            <div class="grid grid-cols-2 gap-2 pt-1">
                <button 
                    type="button" 
                    data-open-modal="auth-modal" 
                    data-modal-tab="login"
                    class="btn btn-outline w-full text-center text-xs font-bold py-2.5 shadow-sm block cursor-pointer"
                >
                    <?php esc_html_e( 'Log In', 'angel-network' ); ?>
                </button>
                <button 
                    type="button" 
                    data-open-modal="auth-modal" 
                    data-modal-tab="register" 
                    data-modal-role="investor"
                    class="btn btn-primary w-full text-center text-xs font-bold py-2.5 shadow-sm block cursor-pointer"
                >
                    <?php esc_html_e( 'Join Network', 'angel-network' ); ?>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>
