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
                    <span class="text-xs font-heading font-bold text-accent uppercase tracking-wider"><?php esc_html_e( 'For Investors', 'angel-network' ); ?></span>
                    <h3 class="text-2xl font-heading font-bold text-primary mt-1 mb-4">
                        <?php esc_html_e( 'Discover Curated Private-Market Opportunities', 'angel-network' ); ?>
                    </h3>
                    <p class="text-sm text-slate-600 leading-relaxed mb-6">
                        <?php esc_html_e( 'Explore pre-seed, seed, and growth-stage opportunities across CleanTech, AI, HealthTech, and B2B SaaS. Connect directly with business owners and review confidential investment materials—without intermediary fees.', 'angel-network' ); ?>
                    </p>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span><?php esc_html_e( 'Standardized cap tables and financial information', 'angel-network' ); ?></span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span><?php esc_html_e( 'Direct founder communication and pitch-deck access', 'angel-network' ); ?></span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span><?php esc_html_e( 'No platform carry or management fees on your investments', 'angel-network' ); ?></span>
                        </li>
                    </ul>
                </div>

                <div class="relative z-10 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Explore Opportunities →', 'angel-network' ); ?>
                    </a>
                    <span class="text-xs font-semibold text-slate-400"><?php esc_html_e( 'Free for Investors', 'angel-network' ); ?></span>
                </div>
            </div>

            <!-- Pathway 2: For Business -->
            <div class="bg-white rounded-2xl border border-slate-200 p-8 sm:p-10 shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col justify-between relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-accent-50 rounded-bl-full -z-0 group-hover:scale-110 transition-transform"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-accent text-white flex items-center justify-center mb-6 shadow-md">
                        <?php echo angel_get_svg_icon( 'cpu', 'w-6 h-6 text-white' ); ?>
                    </div>
                    <span class="text-xs font-heading font-bold text-accent-700 uppercase tracking-wider"><?php esc_html_e( 'For Business', 'angel-network' ); ?></span>
                    <h3 class="text-2xl font-heading font-bold text-primary mt-1 mb-4">
                        <?php esc_html_e( 'Connect with Investors Who Understand Your Market', 'angel-network' ); ?>
                    </h3>
                    <p class="text-sm text-slate-600 leading-relaxed mb-6">
                        <?php esc_html_e( 'Present your business to investors seeking promising early-stage and growth opportunities. Share your pitch, connect directly, and build relationships that can support your company’s next stage.', 'angel-network' ); ?>
                    </p>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span><?php esc_html_e( 'Guided pitch-building process designed for investor clarity', 'angel-network' ); ?></span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span><?php esc_html_e( 'Exposure across regional and sector-focused investor networks', 'angel-network' ); ?></span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                            <span><?php esc_html_e( 'Keep 100% of the capital you raise—no success fees', 'angel-network' ); ?></span>
                        </li>
                    </ul>
                </div>

                <div class="relative z-10 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="btn btn-accent">
                        <?php esc_html_e( 'Submit Your Pitch →', 'angel-network' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
