<?php
/**
 * Footer Navigation & Trust Badges Component
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$region_label = get_theme_mod( 'angel_region_label', 'Canada' );
?>

<div class="py-16 bg-slate-900 text-slate-300 border-t border-slate-800">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8 mb-16">
            <!-- Brand Column -->
            <div class="lg:col-span-2">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white font-heading font-extrabold text-xl shadow-md">
                        <span class="text-accent text-2xl leading-none">▲</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-heading font-extrabold text-xl text-white tracking-tight">
                            Investment<span class="text-accent">Network</span>
                        </span>
                        <span class="text-[10px] font-semibold text-slate-400 tracking-wider uppercase">
                            <?php echo esc_html( $region_label ); ?> Authority
                        </span>
                    </div>
                </a>

                <p class="text-sm text-slate-400 leading-relaxed max-w-sm mb-6">
                    Cuba’s premier investment and venture capital network connecting accredited private investors with ambitious startups across CleanTech, AI, HealthTech, and B2B SaaS.
                </p>

                <div class="flex items-center gap-3">
                    <div class="px-3 py-1.5 rounded-lg bg-slate-800 text-xs font-semibold text-slate-300 border border-slate-700">
                        🔒 256-Bit SSL Encrypted
                    </div>
                    <div class="px-3 py-1.5 rounded-lg bg-slate-800 text-xs font-semibold text-slate-300 border border-slate-700">
                        ✓ NACO Syndicate Standards
                    </div>
                </div>
            </div>

            <!-- Column 1: Invest -->
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider mb-5">
                    <?php esc_html_e( 'Invest', 'angel-network' ); ?>
                </h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li><a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Browse Dealflow', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/invest/#criteria' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Accreditation Guide', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Syndicate Diligence', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/invest/#faq' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Investor FAQ', 'angel-network' ); ?></a></li>
                </ul>
            </div>

            <!-- Column 2: Fundraise -->
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider mb-5">
                    <?php esc_html_e( 'Fundraise', 'angel-network' ); ?>
                </h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li><a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Pitch Your Startup', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/fundraise/#pricing' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Listing Tiers & Rates', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Founder Valuation Guide', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/fundraise/#faq' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Fundraising FAQ', 'angel-network' ); ?></a></li>
                </ul>
            </div>

            <!-- Column 3: Platform -->
            <div>
                <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider mb-5">
                    <?php esc_html_e( 'Platform', 'angel-network' ); ?>
                </h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'About Us', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'How It Works', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Venture Insights', 'angel-network' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Contact Desk', 'angel-network' ); ?></a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Copyright & Payment Trust Logos -->
        <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-6 text-xs text-slate-400">
            <div class="flex flex-wrap items-center gap-6">
                <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Investment Network Inc. All rights reserved.</span>
                <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Privacy Policy', 'angel-network' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/terms-and-conditions/' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Terms of Service', 'angel-network' ); ?></a>
            </div>

            <!-- Verified Payment & Affiliate Badges -->
            <div class="flex items-center gap-4 text-[11px] text-slate-400 font-semibold tracking-wider uppercase">
                <span>Visa</span>
                <span>•</span>
                <span>Mastercard</span>
                <span>•</span>
                <span>Amex</span>
                <span>•</span>
                <span>Wire Transfer</span>
                <span>•</span>
                <span class="text-accent font-bold">NACO Partner</span>
            </div>
        </div>
    </div>
</div>
