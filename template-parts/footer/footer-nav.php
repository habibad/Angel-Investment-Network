<?php
/**
 * Footer Navigation - Clean Editorial Design
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$region_label = get_theme_mod( 'angel_region_label', 'Canada' );
?>

<div class="py-20 bg-brand-canvas text-brand-dark border-t border-brand-border">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 mb-16">
            
            <!-- Brand Column (4 cols) -->
            <div class="lg:col-span-4 flex flex-col items-start">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-baseline gap-2 mb-4">
                    <span class="font-serif text-2xl font-bold tracking-tight text-brand-dark">
                        Angel<span class="font-sans font-light text-brand-muted text-lg ml-1">Network</span>
                    </span>
                    <span class="text-[10px] uppercase font-sans font-semibold tracking-widest text-brand-light pl-2 border-l border-brand-border">
                        <?php echo esc_html( $region_label ); ?>
                    </span>
                </a>

                <p class="text-xs font-sans text-brand-muted leading-relaxed max-w-sm mb-6">
                    A dedicated capital and advisory networking platform connecting accredited investors with ambitious founders building high-growth enterprises.
                </p>

                <p class="text-xs font-sans text-brand-light">
                    &copy; <?php echo esc_html( date( 'Y' ) ); ?> Angel Investment Network. All rights reserved.
                </p>
            </div>

            <!-- Column 1: Company (2 cols) -->
            <div class="lg:col-span-2">
                <p class="text-xs font-sans font-semibold uppercase tracking-widest text-brand-dark mb-4">
                    <?php esc_html_e( 'Company', 'angel-network' ); ?>
                </p>
                <ul class="space-y-3 text-xs font-sans text-brand-muted">
                    <li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="hover:text-brand-teal transition-colors"><?php esc_html_e( 'About Us', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-brand-teal transition-colors"><?php esc_html_e( 'How It Works', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hover:text-brand-teal transition-colors"><?php esc_html_e( 'Contact Desk', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="hover:text-brand-teal transition-colors"><?php esc_html_e( 'Privacy Policy', 'angel-network' ); ?></a></li>
                </ul>
            </div>

            <!-- Column 2: Investors (2 cols) -->
            <div class="lg:col-span-2">
                <p class="text-xs font-sans font-semibold uppercase tracking-widest text-brand-dark mb-4">
                    <?php esc_html_e( 'Investors', 'angel-network' ); ?>
                </p>
                <ul class="space-y-3 text-xs font-sans text-brand-muted">
                    <li><a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="hover:text-brand-teal transition-colors"><?php esc_html_e( 'Browse Deals', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/invest/#criteria' ) ); ?>" class="hover:text-brand-teal transition-colors"><?php esc_html_e( 'Accreditation', 'angel-network' ); ?></a></li>
                    <li><button type="button" data-open-modal="auth-modal" data-modal-tab="register" data-modal-role="investor" class="hover:text-brand-teal transition-colors text-left cursor-pointer"><?php esc_html_e( 'Join as Angel', 'angel-network' ); ?></button></li>
                </ul>
            </div>

            <!-- Column 3: Entrepreneurs (2 cols) -->
            <div class="lg:col-span-2">
                <p class="text-xs font-sans font-semibold uppercase tracking-widest text-brand-dark mb-4">
                    <?php esc_html_e( 'Entrepreneurs', 'angel-network' ); ?>
                </p>
                <ul class="space-y-3 text-xs font-sans text-brand-muted">
                    <li><a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="hover:text-brand-teal transition-colors"><?php esc_html_e( 'Pitch Your Startup', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/#pricing' ) ); ?>" class="hover:text-brand-teal transition-colors"><?php esc_html_e( 'Listing Rates', 'angel-network' ); ?></a></li>
                    <li><button type="button" data-open-modal="auth-modal" data-modal-tab="register" data-modal-role="entrepreneur" class="hover:text-brand-teal transition-colors text-left cursor-pointer"><?php esc_html_e( 'Submit Pitch', 'angel-network' ); ?></button></li>
                </ul>
            </div>

            <!-- Column 4: Newsletter (2 cols) -->
            <div class="lg:col-span-2">
                <p class="text-xs font-sans font-semibold uppercase tracking-widest text-brand-dark mb-4">
                    <?php esc_html_e( 'Intelligence', 'angel-network' ); ?>
                </p>
                <p class="text-xs font-sans text-brand-muted mb-3">
                    <?php esc_html_e( 'Quarterly angel investment research and dealflow summaries.', 'angel-network' ); ?>
                </p>
                <form action="#" onsubmit="event.preventDefault(); alert('Subscribed to quarterly angel intelligence.');" class="flex flex-col gap-2">
                    <input type="email" required placeholder="Enter work email" class="form-input-quiet text-xs py-2">
                    <button type="submit" class="btn btn-secondary text-xs py-2 w-full">
                        Subscribe
                    </button>
                </form>
            </div>

        </div>

        <!-- Subtle Bottom Border & Legal Links -->
        <div class="pt-8 border-t border-brand-border flex flex-col sm:flex-row items-center justify-between text-[11px] font-sans text-brand-light gap-4">
            <div class="flex items-center gap-4">
                <a href="<?php echo esc_url( home_url( '/terms-and-conditions/' ) ); ?>" class="hover:underline">Terms of Use</a>
                <span>•</span>
                <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="hover:underline">Privacy Policy</a>
                <span>•</span>
                <span>OSC Rule 45-501 & NI 45-106 Framework</span>
            </div>
            <div class="flex items-center gap-2">
                <span>Verified Private Capital Network</span>
            </div>
        </div>
    </div>
</div>
