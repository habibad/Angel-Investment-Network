<?php
/**
 * Platform Benefits & Standards Component
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="py-20 bg-slate-900 text-white relative overflow-hidden">
    <!-- Ambient glowing accents -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary-light/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto relative z-10">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
            <span class="badge badge-accent bg-accent/20 text-accent-300 border-accent/30 mb-3">
                <?php esc_html_e( 'Network Standards', 'angel-network' ); ?>
            </span>
            <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-white mb-4">
                <?php esc_html_e( 'The Principles That Guide Our Network', 'angel-network' ); ?>
            </h2>
            <p class="text-slate-400 text-base leading-relaxed">
                <?php esc_html_e( 'Our approach emphasizes clear information, consistent review processes, responsible practices, and direct communication between business owners and investors.', 'angel-network' ); ?>
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8" data-reveal-group>
            <!-- Pillar 1 -->
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-accent/40 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-accent/20 text-accent flex items-center justify-center mb-5">
                    <?php echo angel_get_svg_icon( 'shield', 'w-6 h-6' ); ?>
                </div>
                <h3 class="text-lg font-heading font-bold text-white mb-2">
                    <?php esc_html_e( 'Verified Investors', 'angel-network' ); ?>
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    <?php esc_html_e( 'Investors create profiles outlining their interests, experience, and investment preferences before accessing private opportunities.', 'angel-network' ); ?>
                </p>
            </div>

            <!-- Pillar 2 -->
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-accent/40 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-primary-400/20 text-primary-300 flex items-center justify-center mb-5">
                    <?php echo angel_get_svg_icon( 'sparkles', 'w-6 h-6' ); ?>
                </div>
                <h3 class="text-lg font-heading font-bold text-white mb-2">
                    <?php esc_html_e( 'Confidential Deal Rooms', 'angel-network' ); ?>
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    <?php esc_html_e( 'Business plans, financial information, and supporting documents are shared securely with approved investors.', 'angel-network' ); ?>
                </p>
            </div>

            <!-- Pillar 3 -->
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-accent/40 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-gold/20 text-gold flex items-center justify-center mb-5">
                    <?php echo angel_get_svg_icon( 'credit-card', 'w-6 h-6' ); ?>
                </div>
                <h3 class="text-lg font-heading font-bold text-white mb-2">
                    <?php esc_html_e( 'Direct Connections', 'angel-network' ); ?>
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    <?php esc_html_e( 'Business owners and investors communicate directly, enabling transparent discussions without unnecessary intermediaries.', 'angel-network' ); ?>
                </p>
            </div>

            <!-- Pillar 4 -->
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-accent/40 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-accent/20 text-accent flex items-center justify-center mb-5">
                    <?php echo angel_get_svg_icon( 'activity', 'w-6 h-6' ); ?>
                </div>
                <h3 class="text-lg font-heading font-bold text-white mb-2">
                    <?php esc_html_e( 'Efficient Introductions', 'angel-network' ); ?>
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    <?php esc_html_e( 'The network connects promising Cuban businesses with investors whose interests align with their sector, development stage, and objectives.', 'angel-network' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>
