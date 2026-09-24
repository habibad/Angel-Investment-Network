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
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="badge badge-accent bg-accent/20 text-accent-300 border-accent/30 mb-3">
                <?php esc_html_e( 'Institutional Governance', 'angel-network' ); ?>
            </span>
            <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-white mb-4">
                The Standards That Define Our Network
            </h2>
            <p class="text-slate-400 text-base leading-relaxed">
                We combine the rigorous diligence of traditional venture syndicates with the speed and reach of a modern financial technology platform.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Pillar 1 -->
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-accent/40 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-accent/20 text-accent flex items-center justify-center mb-5">
                    <?php echo angel_get_svg_icon( 'shield', 'w-6 h-6' ); ?>
                </div>
                <h3 class="text-lg font-heading font-bold text-white mb-2">
                    Accredited Only
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    Investors must attest to sophisticated investor status under provincial and federal securities exempt distribution rules before accessing private financials.
                </p>
            </div>

            <!-- Pillar 2 -->
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-accent/40 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-primary-400/20 text-primary-300 flex items-center justify-center mb-5">
                    <?php echo angel_get_svg_icon( 'sparkles', 'w-6 h-6' ); ?>
                </div>
                <h3 class="text-lg font-heading font-bold text-white mb-2">
                    Confidential Rooms
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    Founder cap tables, patent filings, and unit economics are protected behind electronic NDAs and explicit founder permissions.
                </p>
            </div>

            <!-- Pillar 3 -->
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-accent/40 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-gold/20 text-gold flex items-center justify-center mb-5">
                    <?php echo angel_get_svg_icon( 'credit-card', 'w-6 h-6' ); ?>
                </div>
                <h3 class="text-lg font-heading font-bold text-white mb-2">
                    Direct Terms
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    Zero intermediary fees, zero carried interest, and zero hidden platform broker cuts. 100% of investor capital goes straight to the company.
                </p>
            </div>

            <!-- Pillar 4 -->
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-accent/40 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-accent/20 text-accent flex items-center justify-center mb-5">
                    <?php echo angel_get_svg_icon( 'activity', 'w-6 h-6' ); ?>
                </div>
                <h3 class="text-lg font-heading font-bold text-white mb-2">
                    Rapid Syndication
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    Average time from pitch publication to lead investor meeting is just 14 days, with 68% of verified rounds reaching close within 45 days.
                </p>
            </div>
        </div>
    </div>
</section>
