<?php
/**
 * Regulatory Disclaimer Alert Template Part
 * Displays as an interactive compliance alert banner above the footer on page load
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!-- Regulatory Disclaimer Alert Banner (Floating above footer on page load) -->
<aside 
    id="regulatory-disclaimer-alert" 
    role="alert" 
    aria-live="polite" 
    class="fixed bottom-0 inset-x-0 z-50 transform translate-y-full opacity-0 transition-all duration-500 ease-out bg-slate-950 border-t-2 border-gold shadow-[0_-10px_35px_rgba(0,0,0,0.8)] text-slate-300"
>
    <div class="container mx-auto py-3 sm:py-4 px-4 sm:px-6 max-w-6xl">
        <div class="p-4 sm:p-5 rounded-xl bg-slate-900 border border-slate-800 shadow-xl relative">
            <!-- Header Row with Icon, Title, Badge, and Close Button -->
            <div class="flex items-start justify-between gap-3 mb-2.5">
                <div class="flex items-center gap-2.5">
                    <span class="p-1.5 rounded-lg bg-gold/15 text-gold border border-gold/30 flex items-center justify-center shrink-0">
                        <?php echo angel_get_svg_icon( 'shield', 'w-4 h-4' ); ?>
                    </span>
                    <div>
                        <div class="flex flex-wrap items-center gap-2">
                            <h4 class="font-heading font-bold text-white uppercase tracking-wider text-xs sm:text-sm">
                                <?php esc_html_e( 'Regulatory Notice & Private Securities Disclaimer', 'angel-network' ); ?>
                            </h4>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-gold/20 text-gold border border-gold/30">
                                <?php esc_html_e( 'Compliance Alert', 'angel-network' ); ?>
                            </span>
                        </div>
                        <span class="text-[11px] text-slate-400 font-medium">
                            <?php esc_html_e( 'National Instrument 45-106 & Ontario Securities Commission Rule 45-501', 'angel-network' ); ?>
                        </span>
                    </div>
                </div>

                <!-- Close Icon Button -->
                <button 
                    type="button" 
                    id="dismiss-disclaimer-btn" 
                    class="p-1 text-slate-400 hover:text-white rounded-lg hover:bg-slate-800 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-gold shrink-0"
                    aria-label="<?php esc_attr_e( 'Close regulatory alert', 'angel-network' ); ?>"
                >
                    <?php echo angel_get_svg_icon( 'close', 'w-5 h-5' ); ?>
                </button>
            </div>

            <!-- Disclaimer Body Copy -->
            <div class="text-xs text-slate-300 leading-relaxed space-y-2 max-h-36 overflow-y-auto pr-2">
                <p>
                    <?php esc_html_e( 'Investment Network is an online platform facilitating direct private introductions between accredited investors and businesses seeking capital. Any equity, debt, or convertible loan financing transactions consummated as a result of contacts made via this platform constitute "exempt distributions" under Canadian provincial securities commission frameworks (including National Instrument 45-106 and Ontario Securities Commission Rule 45-501).', 'angel-network' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'There is no formal government-regulated "Prospectus Offering" in effect for listings presented on this platform. investing carries significant financial risk, including potential illiquidity, lack of dividends, dilution, and total loss of invested capital. All participants must conduct independent financial, legal, and operational due diligence prior to entering into binding investment agreements.', 'angel-network' ); ?>
                </p>
            </div>

            <!-- Action & Acknowledgment Footer Bar -->
            <div class="flex flex-wrap items-center justify-between gap-3 pt-2.5 mt-2.5 border-t border-slate-800">
                <div class="flex items-center gap-2 text-[11px] text-slate-400">
                    <span class="inline-block w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                    <span><?php esc_html_e( 'Mandatory Risk Disclosure • Accredited Investors & Founders', 'angel-network' ); ?></span>
                </div>

                <div class="flex items-center gap-2">
                    <button 
                        type="button" 
                        id="acknowledge-disclaimer-btn" 
                        class="btn btn-sm btn-accent text-xs px-4 py-1.5 rounded-lg font-bold shadow hover:shadow-md transition-all cursor-pointer"
                    >
                        <?php esc_html_e( 'I Understand & Acknowledge', 'angel-network' ); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Floating Mini Badge (Allows user to reopen notice after dismissing) -->
<button 
    type="button" 
    id="reopen-disclaimer-btn" 
    class="fixed bottom-4 left-4 z-40 hidden items-center gap-2 px-3 py-1.5 rounded-full bg-slate-900 hover:bg-slate-800 text-slate-300 hover:text-white border border-slate-700 shadow-xl text-[11px] font-semibold transition-all duration-200 cursor-pointer group"
    aria-label="<?php esc_attr_e( 'View Regulatory Notice', 'angel-network' ); ?>"
>
    <span class="text-gold group-hover:scale-110 transition-transform"><?php echo angel_get_svg_icon( 'shield', 'w-3.5 h-3.5' ); ?></span>
    <span><?php esc_html_e( 'Regulatory Notice', 'angel-network' ); ?></span>
</button>
