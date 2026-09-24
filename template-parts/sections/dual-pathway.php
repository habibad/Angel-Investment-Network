<?php
/**
 * Dual Pathway Section Component
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="py-20 bg-slate-50">
    <div class="container mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
            <span class="badge badge-primary mb-3"><?php esc_html_e( 'The Dual Ecosystem', 'angel-network' ); ?></span>
            <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-4">
                Tailored for Both Sides of the Venture Table
            </h2>
            <p class="text-slate-600 text-base leading-relaxed">
                Whether you are deploying private capital or building the next industry leader, our infrastructure removes friction and accelerates connection.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 lg:gap-12" data-reveal-group>
            <!-- Pathway 1: For Investors -->
            <div class="bg-white rounded-2xl border border-slate-200 p-8 sm:p-10 shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col justify-between relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-primary-50 rounded-bl-full -z-0 group-hover:scale-110 transition-transform"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-primary text-white flex items-center justify-center mb-6 shadow-md">
                        <?php echo angel_get_svg_icon( 'sparkles', 'w-6 h-6 text-accent' ); ?>
                    </div>
                    <span class="text-xs font-heading font-bold text-accent uppercase tracking-wider"><?php esc_html_e( 'For Accredited Angels & Family Offices', 'angel-network' ); ?></span>
                    <h3 class="text-2xl font-heading font-bold text-primary mt-1 mb-4">
                        Discover Curated, High-Conviction Dealflow
                    </h3>
                    <p class="text-sm text-slate-600 leading-relaxed mb-6">
                        Access vetted pre-seed, seed, and growth rounds across CleanTech, AI, HealthTech, and B2B SaaS. Engage directly with founders through confidential data rooms without intermediary broker markups.
                    </p>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span>Standardized cap table & financial metrics</span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span>Direct founder messaging & pitch deck access</span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span>Zero carry, zero management fees on your checks</span>
                        </li>
                    </ul>
                </div>

                <div class="relative z-10 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Browse Opportunities →', 'angel-network' ); ?>
                    </a>
                    <span class="text-xs font-semibold text-slate-400"><?php esc_html_e( 'Free for Angels', 'angel-network' ); ?></span>
                </div>
            </div>

            <!-- Pathway 2: For Entrepreneurs -->
            <div class="bg-white rounded-2xl border border-slate-200 p-8 sm:p-10 shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col justify-between relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-accent-50 rounded-bl-full -z-0 group-hover:scale-110 transition-transform"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-accent text-white flex items-center justify-center mb-6 shadow-md">
                        <?php echo angel_get_svg_icon( 'cpu', 'w-6 h-6 text-white' ); ?>
                    </div>
                    <span class="text-xs font-heading font-bold text-accent-700 uppercase tracking-wider"><?php esc_html_e( 'For Startup Founders & CEOs', 'angel-network' ); ?></span>
                    <h3 class="text-2xl font-heading font-bold text-primary mt-1 mb-4">
                        Secure Smart Capital from 15,200+ Angels
                    </h3>
                    <p class="text-sm text-slate-600 leading-relaxed mb-6">
                        Put your business in front of verified investors who have the capital, domain connections, and governance expertise to propel your company from early traction to sustainable scale.
                    </p>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span>Guided pitch wizard designed for investor clarity</span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span>Capital distribution across provincial angel networks</span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span>Keep 100% of your round — zero success commissions</span>
                        </li>
                    </ul>
                </div>

                <div class="relative z-10 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="btn btn-accent">
                        <?php esc_html_e( 'Apply for Funding →', 'angel-network' ); ?>
                    </a>
                    <span class="text-xs font-semibold text-slate-400"><?php esc_html_e( 'Verified Publishing', 'angel-network' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
