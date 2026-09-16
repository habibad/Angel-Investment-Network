<?php
/**
 * Investor Card Component
 *
 * @param array $investor
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$investor = isset( $args['investor'] ) ? $args['investor'] : [];

if ( empty( $investor ) ) {
    return;
}
?>

<article class="card p-6 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
    <div>
        <!-- Top Row: Avatar & Details -->
        <div class="flex items-start gap-4 mb-4">
            <div class="relative">
                <img 
                    src="<?php echo esc_url( $investor['avatar'] ); ?>" 
                    alt="<?php echo esc_attr( $investor['name'] ); ?>" 
                    class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-md"
                >
                <?php if ( ! empty( $investor['verified'] ) ) : ?>
                    <span class="absolute -bottom-1 -right-1 bg-white rounded-full p-0.5 shadow-xs" title="<?php esc_attr_e( 'Verified Accredited Angel', 'angel-network' ); ?>">
                        <?php echo angel_get_svg_icon( 'verified', 'w-5 h-5 text-accent' ); ?>
                    </span>
                <?php endif; ?>
            </div>

            <div class="flex flex-col">
                <div class="flex items-center gap-2">
                    <h3 class="text-base font-heading font-bold text-primary"><?php echo esc_html( $investor['name'] ); ?></h3>
                    <span class="badge badge-accent text-[10px] py-0.5 px-2"><?php esc_html_e( 'Active Angel', 'angel-network' ); ?></span>
                </div>
                <span class="text-xs text-slate-500 font-medium"><?php echo esc_html( $investor['role_title'] ); ?></span>
                <span class="text-xs text-slate-400 flex items-center gap-1 mt-0.5">
                    <?php echo angel_get_svg_icon( 'location', 'w-3 h-3 text-slate-400' ); ?>
                    <?php echo esc_html( $investor['location'] ); ?>
                </span>
            </div>
        </div>

        <!-- Investment Ticket Range Box -->
        <div class="bg-primary-50/60 border border-primary-100 rounded-xl p-3 mb-4">
            <span class="block text-[11px] text-primary-600 font-semibold uppercase tracking-wider"><?php esc_html_e( 'Typical Check Size', 'angel-network' ); ?></span>
            <p class="text-sm font-heading font-extrabold text-primary">
                <?php echo esc_html( $investor['investment_range'] ); ?>
            </p>
        </div>

        <!-- Experience / Thesis -->
        <p class="text-xs text-slate-600 leading-relaxed line-clamp-3 mb-4">
            <?php echo esc_html( $investor['experience'] ); ?>
        </p>

        <!-- Preferred Sectors -->
        <div class="mb-4">
            <span class="block text-[11px] text-slate-400 font-medium mb-1.5"><?php esc_html_e( 'Sector Thesis:', 'angel-network' ); ?></span>
            <div class="flex flex-wrap gap-1.5">
                <?php foreach ( $investor['industries'] as $sector ) : ?>
                    <span class="badge badge-slate text-[11px] py-0.5 px-2">
                        <?php echo esc_html( $sector ); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Action Button -->
    <div class="pt-4 border-t border-slate-100">
        <button 
            type="button" 
            data-open-modal="auth-modal" 
            data-modal-tab="register" 
            data-modal-role="entrepreneur"
            class="btn btn-outline-primary btn-sm w-full hover:bg-primary hover:text-white transition-colors"
        >
            <?php esc_html_e( 'Send Pitch to Investor', 'angel-network' ); ?>
        </button>
    </div>
</article>
