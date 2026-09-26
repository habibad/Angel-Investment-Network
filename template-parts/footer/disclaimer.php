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
                                <?php esc_html_e( 'Important Investment Notice', 'angel-network' ); ?>
                            </h4>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-gold/20 text-gold border border-gold/30">
                                <?php esc_html_e( 'Disclosure', 'angel-network' ); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Close Icon Button -->
                <button 
                    type="button" 
                    id="dismiss-disclaimer-btn" 
                    class="p-1 text-slate-400 hover:text-white rounded-lg hover:bg-slate-800 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-gold shrink-0"
                    aria-label="<?php esc_attr_e( 'Close investment notice', 'angel-network' ); ?>"
                >
                    <?php echo angel_get_svg_icon( 'close', 'w-5 h-5' ); ?>
                </button>
            </div>

            <!-- Disclaimer Body Copy -->
            <div class="text-xs text-slate-300 leading-relaxed space-y-2 max-h-40 overflow-y-auto pr-2">
                <p>
                    <?php esc_html_e( 'Investment Network is an online platform designed to introduce investors to business owners seeking capital. Information published on the platform is provided for general informational purposes and does not constitute investment, financial, legal, or tax advice. A listing does not represent an offer, recommendation, endorsement, or guarantee of any investment.', 'angel-network' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'Private investments involve substantial risk, including limited liquidity, dilution, uncertain returns, and the possible loss of all invested capital. Investment Network does not guarantee the accuracy or completeness of information submitted by users or the future performance of any business.', 'angel-network' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'Investors and business owners are responsible for conducting independent financial, legal, tax, and operational reviews before entering into any agreement. Each participant must also ensure compliance with the laws and regulations applicable to the participant and the proposed transaction, including cross-border investment, sanctions, currency-transfer, and foreign-ownership requirements.', 'angel-network' ); ?>
                </p>
            </div>

            <!-- Action & Acknowledgment Footer Bar -->
            <div class="flex flex-wrap items-center justify-between gap-3 pt-2.5 mt-2.5 border-t border-slate-800">
                <div class="flex items-center gap-2 text-[11px] text-slate-400">
                    <span class="inline-block w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                    <span><?php esc_html_e( 'General Risk Disclosure • Investors & Business Owners', 'angel-network' ); ?></span>
                </div>

                <div class="flex items-center gap-2">
                    <button 
                        type="button" 
                        id="acknowledge-disclaimer-btn" 
                        class="btn btn-sm btn-accent text-xs px-4 py-1.5 rounded-lg font-bold shadow hover:shadow-md transition-all cursor-pointer"
                    >
                        <?php esc_html_e( 'I Understand', 'angel-network' ); ?>
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
    aria-label="<?php esc_attr_e( 'View Investment Notice', 'angel-network' ); ?>"
>
    <span class="text-gold group-hover:scale-110 transition-transform"><?php echo angel_get_svg_icon( 'shield', 'w-3.5 h-3.5' ); ?></span>
    <span><?php esc_html_e( 'Investment Notice', 'angel-network' ); ?></span>
</button>
