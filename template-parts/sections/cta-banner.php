<?php
/**
 * Bottom Conversion CTA Banner Component
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$region_label = get_theme_mod( 'angel_region_label', 'Canada' );
?>

<section class="py-20 lg:py-24 bg-gradient-to-br from-primary-900 via-primary to-primary-950 text-white relative overflow-hidden">
    <!-- Subtle geometric background lines -->
    <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -left-20 -top-20 w-96 h-96 bg-primary-light/40 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto relative z-10 text-center max-w-3xl">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-xs font-heading font-semibold tracking-wider text-accent uppercase mb-6">
            <span><?php echo esc_html( $region_label ); ?>’s Leading Venture Marketplace</span>
        </div>

        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-heading font-extrabold text-white tracking-tight leading-tight mb-6">
            Ready to Back or Build the Next Market Champion?
        </h2>

        <p class="text-base sm:text-lg text-slate-300 leading-relaxed mb-10 max-w-2xl mx-auto">
            Join over 15,200 accredited private angels and thousands of Canadian founders already collaborating on deals that shape our economic future.
        </p>

        <!-- Dual CTA Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <button 
                type="button" 
                data-open-modal="auth-modal" 
                data-modal-tab="register" 
                data-modal-role="investor"
                class="btn btn-primary btn-lg w-full sm:w-auto bg-white text-primary hover:bg-slate-100 shadow-lg font-bold"
            >
                <?php esc_html_e( 'Join as an Investor', 'angel-network' ); ?>
            </button>

            <button 
                type="button" 
                data-open-modal="auth-modal" 
                data-modal-tab="register" 
                data-modal-role="entrepreneur"
                class="btn btn-accent btn-lg w-full sm:w-auto font-bold shadow-lg"
            >
                <?php esc_html_e( 'Apply as an Entrepreneur', 'angel-network' ); ?>
            </button>
        </div>

        <p class="text-xs text-slate-400 mt-6">
            <?php esc_html_e( 'Registration is free for investors. Pitches subject to due diligence verification prior to publishing.', 'angel-network' ); ?>
        </p>
    </div>
</section>
