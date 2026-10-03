<?php
/**
 * Footer Navigation & Trust Badges Component
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$region_label = get_theme_mod( 'angel_region_label', 'Cuba' );
?>

<div class="py-16 bg-slate-900 text-slate-300 border-t border-slate-800">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8 mb-16">
            <!-- Brand Column -->
            <div class="lg:col-span-2">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center mb-4 group focus:outline-none focus:ring-2 focus:ring-accent rounded-lg" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    <img 
                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-white.png' ); ?>" 
                        alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
                        class="h-12 sm:h-14 w-auto object-contain transition-opacity duration-200 group-hover:opacity-90"
                    >
                </a>

                <p class="text-[11px] font-semibold text-accent tracking-wider uppercase flex items-center gap-1.5 mb-5">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-accent"></span>
                    <?php esc_html_e( 'Connecting Cuba with the World', 'angel-network' ); ?>
                </p>

                <p class="text-sm text-slate-400 leading-relaxed max-w-sm mb-6">
                    <?php esc_html_e( 'A platform connecting investors with Cuban business owners seeking capital, expertise, and international partnerships.', 'angel-network' ); ?>
                </p>

                <div class="flex items-center gap-3">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-800 text-xs font-semibold text-slate-300 border border-slate-700">
                        <span class="text-accent">🔒</span> <?php esc_html_e( 'Secure Platform', 'angel-network' ); ?>
                    </div>
                </div>
            </div>

            <!-- Column 1: Invest -->
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider mb-5">
                    <?php esc_html_e( 'Invest', 'angel-network' ); ?>
                </h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li><a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Explore Opportunities', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/invest/#eligibility' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Investor Registration', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Investment Process', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/invest/#eligibility' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Investor FAQ', 'angel-network' ); ?></a></li>
                </ul>
            </div>

            <!-- Column 2: Business Owners -->
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider mb-5">
                    <?php esc_html_e( 'Business Owners', 'angel-network' ); ?>
                </h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li><a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Submit Your Business', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/fundraise/#before-you-apply' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Application Process', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/fundraise/#before-you-apply' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Preparation Guide', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/#business-owners' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Business Owner FAQ', 'angel-network' ); ?></a></li>
                </ul>
            </div>

            <!-- Column 3: Platform -->
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider mb-5">
                    <?php esc_html_e( 'Platform', 'angel-network' ); ?>
                </h4>
                <ul class="space-y-3 text-sm text-slate-400 mb-5">
                    <li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'About Us', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'How It Works', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Market Insights', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Contact Us', 'angel-network' ); ?></a></li>
                </ul>

                <!-- Social Links -->
                <div class="flex items-center gap-2.5">
                    <a 
                        href="<?php echo esc_url( get_theme_mod( 'angel_social_linkedin', 'https://www.linkedin.com' ) ); ?>" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="w-8 h-8 rounded-lg bg-slate-800 text-slate-400 hover:text-white hover:bg-slate-700 hover:border-slate-600 border border-slate-700 flex items-center justify-center transition-all duration-200 group"
                        title="<?php esc_attr_e( 'LinkedIn', 'angel-network' ); ?>"
                        aria-label="<?php esc_attr_e( 'LinkedIn', 'angel-network' ); ?>"
                    >
                        <?php echo angel_get_svg_icon( 'linkedin', 'w-4 h-4 transition-transform duration-200 group-hover:scale-110' ); ?>
                    </a>
                    <a 
                        href="<?php echo esc_url( get_theme_mod( 'angel_social_facebook', 'https://www.facebook.com' ) ); ?>" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="w-8 h-8 rounded-lg bg-slate-800 text-slate-400 hover:text-white hover:bg-slate-700 hover:border-slate-600 border border-slate-700 flex items-center justify-center transition-all duration-200 group"
                        title="<?php esc_attr_e( 'Facebook', 'angel-network' ); ?>"
                        aria-label="<?php esc_attr_e( 'Facebook', 'angel-network' ); ?>"
                    >
                        <?php echo angel_get_svg_icon( 'facebook', 'w-4 h-4 transition-transform duration-200 group-hover:scale-110' ); ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright & Trust Logos -->
        <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-6 text-xs text-slate-400">
            <div class="flex flex-wrap items-center gap-6">
                <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Investment Network. All rights reserved.</span>
                <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Privacy Policy', 'angel-network' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/terms-and-conditions/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Terms of Service', 'angel-network' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/risk-disclosure/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Risk Disclosure', 'angel-network' ); ?></a>
            </div>

            <!-- Independent Platform Indicator (Removed unverified payment brands) -->
            <div class="flex items-center gap-2.5 text-xs text-slate-400">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span class="font-medium text-slate-300"><?php esc_html_e( 'Connecting Cuba with the World', 'angel-network' ); ?></span>
            </div>
        </div>
    </div>
</div>
