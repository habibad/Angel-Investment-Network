<?php
/**
 * Primary Navigation Template Part
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$region_label = get_theme_mod( 'angel_region_label', 'Canada' );
?>

<div class="flex items-center justify-between w-full h-20">
    <!-- Brand Logo & Regional Tag -->
    <div class="flex items-center gap-3">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 group focus:outline-none focus:ring-2 focus:ring-primary rounded-lg p-1">
            <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white font-heading font-extrabold text-xl shadow-md group-hover:bg-primary-light transition-colors">
                <span class="text-accent text-2xl leading-none">▲</span>
            </div>
            <div class="flex flex-col">
                <span class="font-heading font-extrabold text-xl leading-tight text-primary tracking-tight">
                    Angel<span class="text-accent">Network</span>
                </span>
                <span class="text-[10px] font-semibold text-slate-500 tracking-wider uppercase flex items-center gap-1">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-accent"></span>
                    <?php echo esc_html( $region_label ); ?> Syndicate
                </span>
            </div>
        </a>
    </div>

    <!-- Desktop Navigation Menu -->
    <nav class="hidden lg:flex items-center gap-1 xl:gap-2" aria-label="<?php esc_attr_e( 'Primary Menu', 'angel-network' ); ?>">
        <!-- Invest Dropdown -->
        <div class="relative nav-item-dropdown group">
            <button type="button" class="nav-dropdown-toggle flex items-center gap-1.5 px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors focus:outline-none focus:ring-2 focus:ring-primary/20">
                <span><?php esc_html_e( 'Invest', 'angel-network' ); ?></span>
                <?php echo angel_get_svg_icon( 'chevron-down', 'w-4 h-4 text-slate-400 group-hover:text-primary transition-transform duration-200 group-hover:rotate-180' ); ?>
            </button>
            <div class="absolute top-full left-0 w-64 pt-2 hidden group-hover:block transition-all duration-200 z-50">
                <div class="bg-white rounded-xl border border-slate-200 shadow-xl p-2 flex flex-col gap-1">
                    <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="flex flex-col p-2.5 rounded-lg hover:bg-slate-50 transition-colors">
                        <span class="text-sm font-semibold text-slate-800"><?php esc_html_e( 'Browse Deals Hub', 'angel-network' ); ?></span>
                        <span class="text-xs text-slate-500"><?php esc_html_e( 'Explore verified active startup pitches', 'angel-network' ); ?></span>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/invest/#criteria' ) ); ?>" class="flex flex-col p-2.5 rounded-lg hover:bg-slate-50 transition-colors">
                        <span class="text-sm font-semibold text-slate-800"><?php esc_html_e( 'Investor Criteria & FAQ', 'angel-network' ); ?></span>
                        <span class="text-xs text-slate-500"><?php esc_html_e( 'Accreditation guidelines & ticket sizes', 'angel-network' ); ?></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Fundraise Dropdown -->
        <div class="relative nav-item-dropdown group">
            <button type="button" class="nav-dropdown-toggle flex items-center gap-1.5 px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors focus:outline-none focus:ring-2 focus:ring-primary/20">
                <span><?php esc_html_e( 'Fundraise', 'angel-network' ); ?></span>
                <?php echo angel_get_svg_icon( 'chevron-down', 'w-4 h-4 text-slate-400 group-hover:text-primary transition-transform duration-200 group-hover:rotate-180' ); ?>
            </button>
            <div class="absolute top-full left-0 w-64 pt-2 hidden group-hover:block transition-all duration-200 z-50">
                <div class="bg-white rounded-xl border border-slate-200 shadow-xl p-2 flex flex-col gap-1">
                    <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="flex flex-col p-2.5 rounded-lg hover:bg-slate-50 transition-colors">
                        <span class="text-sm font-semibold text-slate-800"><?php esc_html_e( 'Pitch Your Startup', 'angel-network' ); ?></span>
                        <span class="text-xs text-slate-500"><?php esc_html_e( 'Raise seed or growth capital from angels', 'angel-network' ); ?></span>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/fundraise/#pricing' ) ); ?>" class="flex flex-col p-2.5 rounded-lg hover:bg-slate-50 transition-colors">
                        <span class="text-sm font-semibold text-slate-800"><?php esc_html_e( 'Listing Tiers & Pricing', 'angel-network' ); ?></span>
                        <span class="text-xs text-slate-500"><?php esc_html_e( 'Standard, Pro & Global Syndicate options', 'angel-network' ); ?></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Services -->
        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors">
            <?php esc_html_e( 'How It Works', 'angel-network' ); ?>
        </a>

        <!-- About Us -->
        <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors">
            <?php esc_html_e( 'About Us', 'angel-network' ); ?>
        </a>

        <!-- Insights -->
        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors">
            <?php esc_html_e( 'Insights', 'angel-network' ); ?>
        </a>

        <!-- Contact -->
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="px-3.5 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors">
            <?php esc_html_e( 'Contact', 'angel-network' ); ?>
        </a>
    </nav>

    <!-- Header Actions (Login / Join Modal Triggers) -->
    <div class="hidden lg:flex items-center gap-3">
        <button 
            type="button" 
            data-open-modal="auth-modal" 
            data-modal-tab="login"
            class="px-4 py-2 text-sm font-semibold text-slate-700 hover:text-primary rounded-lg hover:bg-slate-50 transition-colors cursor-pointer"
        >
            <?php esc_html_e( 'Log In', 'angel-network' ); ?>
        </button>

        <button 
            type="button" 
            data-open-modal="auth-modal" 
            data-modal-tab="register" 
            data-modal-role="investor"
            class="btn btn-primary"
        >
            <?php esc_html_e( 'Join Network', 'angel-network' ); ?>
        </button>
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
<div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 bg-white py-4 px-2 shadow-lg transition-all duration-300">
    <div class="flex flex-col gap-1">
        <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="px-3 py-2 text-base font-semibold text-slate-800 hover:bg-slate-50 rounded-lg">
            <?php esc_html_e( 'Invest in Startups', 'angel-network' ); ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="px-3 py-2 text-base font-semibold text-slate-800 hover:bg-slate-50 rounded-lg">
            <?php esc_html_e( 'Raise Capital', 'angel-network' ); ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="px-3 py-2 text-base font-semibold text-slate-800 hover:bg-slate-50 rounded-lg">
            <?php esc_html_e( 'How It Works', 'angel-network' ); ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="px-3 py-2 text-base font-semibold text-slate-800 hover:bg-slate-50 rounded-lg">
            <?php esc_html_e( 'About Us', 'angel-network' ); ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="px-3 py-2 text-base font-semibold text-slate-800 hover:bg-slate-50 rounded-lg">
            <?php esc_html_e( 'Venture Insights', 'angel-network' ); ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="px-3 py-2 text-base font-semibold text-slate-800 hover:bg-slate-50 rounded-lg">
            <?php esc_html_e( 'Contact Desk', 'angel-network' ); ?>
        </a>
    </div>

    <div class="mt-4 pt-4 border-t border-slate-100 flex flex-col gap-2 px-2">
        <button 
            type="button" 
            data-open-modal="auth-modal" 
            data-modal-tab="login"
            class="btn btn-secondary w-full"
        >
            <?php esc_html_e( 'Log In', 'angel-network' ); ?>
        </button>
        <button 
            type="button" 
            data-open-modal="auth-modal" 
            data-modal-tab="register" 
            data-modal-role="investor"
            class="btn btn-primary w-full"
        >
            <?php esc_html_e( 'Create Free Account', 'angel-network' ); ?>
        </button>
    </div>
</div>
