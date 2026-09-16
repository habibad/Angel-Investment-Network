<?php
/**
 * Primary Navigation Template Part - Editorial Redesign
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$region_label = get_theme_mod( 'angel_region_label', 'Canada' );
?>

<div class="flex items-center justify-between w-full h-20">
    <!-- Brand Wordmark -->
    <div class="flex items-center gap-3">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-baseline gap-2 group focus:outline-none">
            <span class="font-serif text-2xl font-bold tracking-tight text-brand-dark group-hover:text-brand-teal transition-colors">
                Angel<span class="font-sans font-light tracking-normal text-brand-muted text-lg ml-1">Network</span>
            </span>
            <span class="hidden sm:inline-block text-[10px] uppercase font-sans font-semibold tracking-widest text-brand-light pl-2 border-l border-brand-border">
                <?php echo esc_html( $region_label ); ?>
            </span>
        </a>
    </div>

    <!-- Editorial Desktop Navigation -->
    <nav class="hidden lg:flex items-center gap-8 text-sm font-sans font-medium text-brand-muted" aria-label="<?php esc_attr_e( 'Primary Menu', 'angel-network' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-brand-dark hover:text-brand-teal transition-colors">
            <?php esc_html_e( 'Home', 'angel-network' ); ?>
        </a>

        <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="hover:text-brand-teal transition-colors">
            <?php esc_html_e( 'Invest', 'angel-network' ); ?>
        </a>

        <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="hover:text-brand-teal transition-colors">
            <?php esc_html_e( 'Fundraise', 'angel-network' ); ?>
        </a>

        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-brand-teal transition-colors">
            <?php esc_html_e( 'Services', 'angel-network' ); ?>
        </a>

        <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="hover:text-brand-teal transition-colors">
            <?php esc_html_e( 'About Us', 'angel-network' ); ?>
        </a>

        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="hover:text-brand-teal transition-colors">
            <?php esc_html_e( 'Blog', 'angel-network' ); ?>
        </a>

        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hover:text-brand-teal transition-colors">
            <?php esc_html_e( 'Contact', 'angel-network' ); ?>
        </a>
    </nav>

    <!-- Header Actions (Search, Login, Join Platform) -->
    <div class="hidden lg:flex items-center gap-6">
        <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="text-brand-muted hover:text-brand-teal transition-colors" title="<?php esc_attr_e( 'Search Opportunities', 'angel-network' ); ?>">
            <?php echo angel_get_svg_icon( 'search', 'w-4 h-4' ); ?>
        </a>

        <button 
            type="button" 
            data-open-modal="auth-modal" 
            data-modal-tab="login"
            class="text-sm font-sans font-medium text-brand-dark hover:text-brand-teal transition-colors cursor-pointer"
        >
            <?php esc_html_e( 'Log In', 'angel-network' ); ?>
        </button>

        <button 
            type="button" 
            data-open-modal="auth-modal" 
            data-modal-tab="register" 
            data-modal-role="investor"
            class="btn btn-primary btn-sm"
        >
            <?php esc_html_e( 'Join Platform', 'angel-network' ); ?>
        </button>
    </div>

    <!-- Mobile Menu Button -->
    <div class="flex lg:hidden items-center gap-3">
        <button 
            id="mobile-menu-btn" 
            type="button" 
            aria-expanded="false" 
            aria-controls="mobile-menu" 
            aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'angel-network' ); ?>"
            class="p-2 text-brand-dark hover:text-brand-teal rounded focus:outline-none cursor-pointer"
        >
            <?php echo angel_get_svg_icon( 'menu', 'w-6 h-6' ); ?>
        </button>
    </div>
</div>

<!-- Mobile Navigation Drawer -->
<div id="mobile-menu" class="hidden lg:hidden border-t border-brand-border bg-brand-canvas py-6 px-4 transition-all duration-300">
    <div class="flex flex-col gap-4 text-base font-sans font-medium text-brand-dark">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-brand-teal"><?php esc_html_e( 'Home', 'angel-network' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="hover:text-brand-teal"><?php esc_html_e( 'Invest', 'angel-network' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="hover:text-brand-teal"><?php esc_html_e( 'Fundraise', 'angel-network' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-brand-teal"><?php esc_html_e( 'Services', 'angel-network' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="hover:text-brand-teal"><?php esc_html_e( 'About Us', 'angel-network' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="hover:text-brand-teal"><?php esc_html_e( 'Blog', 'angel-network' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hover:text-brand-teal"><?php esc_html_e( 'Contact', 'angel-network' ); ?></a>
    </div>

    <div class="mt-6 pt-6 border-t border-brand-border flex flex-col gap-3">
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
            <?php esc_html_e( 'Join Platform', 'angel-network' ); ?>
        </button>
    </div>
</div>
