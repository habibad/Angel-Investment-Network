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
?>

<div class="flex items-center justify-between w-full h-20">
    <!-- Brand Wordmark & Regional Tag -->
    <div class="flex items-center gap-3 shrink-0">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2.5 group focus:outline-none focus:ring-2 focus:ring-primary rounded-lg p-1">
            <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white font-heading font-extrabold text-xl shadow-md group-hover:bg-primary-light transition-colors">
                <span class="text-accent text-2xl leading-none">▲</span>
            </div>
            <div class="flex flex-col">
                <span class="font-heading font-extrabold text-xl leading-tight text-primary tracking-tight">
                    Investment<span class="text-accent">Network</span>
                </span>
                <span class="text-[10px] font-semibold text-slate-500 tracking-wider uppercase flex items-center gap-1">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-accent"></span>
                    <?php echo esc_html( $region_label ); ?>
                </span>
            </div>
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

    <!-- Header Actions (Language Switcher & Join Network) -->
    <div class="hidden lg:flex items-center gap-3 shrink-0">
        <!-- Language Switcher -->
        <div class="header-language-switcher flex items-center">
            <?php echo do_shortcode( '[gtranslate]' ); ?>
        </div>

        <!-- Join Network Action Button (Opens Auth Modal) -->
        <button 
            type="button" 
            data-open-modal="auth-modal" 
            data-modal-tab="register" 
            data-modal-role="investor"
            class="btn btn-primary btn-sm px-4 py-2 font-bold shadow-xs hover:shadow-md transition-all cursor-pointer"
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
                <?php echo do_shortcode( '[gtranslate]' ); ?>
            </div>
        </div>

        <!-- Mobile Join Network -->
        <div>
            <button 
                type="button" 
                data-open-modal="auth-modal" 
                data-modal-tab="register" 
                data-modal-role="investor"
                class="btn btn-primary w-full text-xs font-bold py-3 shadow-sm cursor-pointer"
            >
                <?php esc_html_e( 'Join Network', 'angel-network' ); ?>
            </button>
        </div>
    </div>
</div>
