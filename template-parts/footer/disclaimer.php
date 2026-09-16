<?php
/**
 * Regulatory Disclaimer Template Part
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="py-8 bg-slate-950 border-t border-slate-800/80 text-slate-400 text-xs leading-relaxed">
    <div class="container mx-auto">
        <div class="p-6 rounded-xl bg-slate-900/60 border border-slate-800">
            <h4 class="font-heading font-bold text-slate-300 uppercase tracking-wider text-[11px] mb-2 flex items-center gap-2">
                <span class="text-gold"><?php echo angel_get_svg_icon( 'shield', 'w-4 h-4' ); ?></span>
                <?php esc_html_e( 'Regulatory Notice & Private Securities Disclaimer', 'angel-network' ); ?>
            </h4>
            <p class="mb-3">
                <?php esc_html_e( 'Angel Investment Network is an online platform facilitating direct private introductions between accredited investors and businesses seeking capital. Any equity, debt, or convertible loan financing transactions consummated as a result of contacts made via this platform constitute "exempt distributions" under Canadian provincial securities commission frameworks (including National Instrument 45-106 and Ontario Securities Commission Rule 45-501).', 'angel-network' ); ?>
            </p>
            <p>
                <?php esc_html_e( 'There is no formal government-regulated "Prospectus Offering" in effect for listings presented on this platform. Angel investing carries significant financial risk, including potential illiquidity, lack of dividends, dilution, and total loss of invested capital. All participants must conduct independent financial, legal, and operational due diligence prior to entering into binding investment agreements.', 'angel-network' ); ?>
            </p>
        </div>
    </div>
</div>
