<?php
/**
 * Single Opportunity / Business Listing Detail Template
 * Conforms to Cuba Investment Network audit requirements (PDF Pages 30 & 35)
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Retrieve deal data from query var or route
$slug = get_query_var( 'angel_opportunity' );
$all_deals = angel_get_opportunities();
$deal = null;

if ( ! empty( $slug ) ) {
    foreach ( $all_deals as $d ) {
        if ( $d['slug'] === $slug ) {
            $deal = $d;
            break;
        }
    }
}

// Fallback to first deal if not matched
if ( ! $deal && ! empty( $all_deals ) ) {
    $deal = $all_deals[0];
}

$currency       = isset( $deal['currency'] ) ? $deal['currency'] : 'USD';
$capital_sought = isset( $deal['capital_sought'] ) ? $deal['capital_sought'] : ( isset( $deal['total_required'] ) ? $deal['total_required'] : 0 );
$status         = isset( $deal['status'] ) ? $deal['status'] : 'Under Review';
$status_label   = isset( $deal['status_label'] ) ? $deal['status_label'] : $status;
$ownership      = isset( $deal['ownership_structure'] ) ? $deal['ownership_structure'] : 'Private Cuban Enterprise (MIPYME)';
$partnership    = isset( $deal['partnership_type'] ) ? $deal['partnership_type'] : 'Direct Investment / Partnership';
$purpose        = isset( $deal['capital_purpose'] ) ? $deal['capital_purpose'] : 'Operational expansion & equipment modernization';
$history        = isset( $deal['operating_history'] ) ? $deal['operating_history'] : 'Operating Business';
$last_updated   = isset( $deal['last_updated'] ) ? $deal['last_updated'] : 'September 2026';
$info_source    = isset( $deal['info_source'] ) ? $deal['info_source'] : 'Information supplied by the business owner';

$current_user_id = get_current_user_id();
$deal_id         = ! empty( $deal['id'] ) ? (int) $deal['id'] : 0;
$is_user_inv     = class_exists( '\CubaInvestment\Core\Auth\Permissions' ) && ( \CubaInvestment\Core\Auth\Permissions::is_investor( $current_user_id ) || \CubaInvestment\Core\Auth\Permissions::is_admin_or_reviewer( $current_user_id ) );
$is_deal_saved   = ( $current_user_id && $deal_id && class_exists( '\CubaInvestment\Core\Services\SavedOpportunityService' ) ) ? \CubaInvestment\Core\Services\SavedOpportunityService::is_saved( $current_user_id, $deal_id ) : false;
$is_owner        = ( ! empty( $deal['author_id'] ) && (int) $deal['author_id'] === (int) $current_user_id );
?>

<!-- Opportunity Breadcrumb & Sub-Hero -->
<div class="bg-primary text-white py-12 lg:py-16 relative overflow-hidden">
    <div class="container mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs text-slate-300 mb-6" aria-label="<?php esc_attr_e( 'Breadcrumb', 'angel-network' ); ?>">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="hover:text-white transition-colors">Opportunities</a>
            <span>/</span>
            <span class="text-accent truncate max-w-xs"><?php echo esc_html( $deal['title'] ); ?></span>
        </nav>

        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div>
                <div class="flex flex-wrap items-center gap-2 mb-3">
                    <span class="badge badge-accent font-bold">
                        <?php echo esc_html( $status_label ); ?>
                    </span>
                    <span class="badge badge-slate bg-white/15 text-white border-white/20">
                        <?php echo esc_html( $deal['industry'] ); ?>
                    </span>
                    <span class="text-xs text-slate-300 flex items-center gap-1 ml-2">
                        <?php echo angel_get_svg_icon( 'location', 'w-3.5 h-3.5 text-accent' ); ?>
                        <?php echo esc_html( $deal['location'] ); ?>, Cuba
                    </span>
                </div>

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-heading font-extrabold text-white tracking-tight mb-2">
                    <?php echo esc_html( $deal['title'] ); ?>
                </h1>
                <p class="text-sm font-medium text-slate-300">
                    <?php echo esc_html( $deal['company_name'] ); ?> &bull; <?php echo esc_html( $ownership ); ?>
                </p>
            </div>

            <!-- Header Action -->
            <div class="flex flex-wrap items-center gap-3">
                <?php if ( is_user_logged_in() && $is_user_inv ) : ?>
                    <button 
                        type="button" 
                        onclick="cinToggleSingleBookmark(<?php echo esc_attr( $deal_id ); ?>)"
                        id="cin-header-bookmark-btn" 
                        class="px-4 py-3 rounded-xl border border-white/30 text-white hover:bg-white/10 font-bold text-sm transition-all flex items-center gap-2 cursor-pointer <?php echo $is_deal_saved ? 'bg-white/20' : ''; ?>"
                    >
                        <svg id="cin-header-bookmark-icon" class="w-5 h-5 <?php echo $is_deal_saved ? 'text-accent fill-accent' : 'text-white fill-none'; ?>" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        <span id="cin-header-bookmark-label"><?php echo $is_deal_saved ? esc_html__( 'Saved in Dealflow', 'angel-network' ) : esc_html__( 'Save Opportunity', 'angel-network' ); ?></span>
                    </button>
                <?php endif; ?>

                <button 
                    type="button" 
                    onclick="cinOpenEnquiryModal()" 
                    class="btn btn-accent btn-lg font-bold shadow-lg hover:shadow-xl transition-all cursor-pointer"
                >
                    <?php esc_html_e( 'Request Business Introduction →', 'angel-network' ); ?>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Main Detail Body -->
<section class="py-16 bg-slate-50">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-10">
            <!-- Left Column: Summary, Highlights, Structure (8 cols) -->
            <div class="lg:col-span-8 space-y-8">
                <!-- Cover Image -->
                <div class="rounded-2xl overflow-hidden shadow-md bg-white border border-slate-200 aspect-16/9">
                    <img 
                        src="<?php echo esc_url( $deal['image'] ); ?>" 
                        alt="<?php echo esc_attr( $deal['title'] ); ?>" 
                        class="w-full h-full object-cover"
                    >
                </div>

                <!-- Transparency Information Notice Box (PDF Page 35) -->
                <div class="p-4 rounded-xl bg-white border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs text-slate-500 shadow-xs">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-accent"></span>
                        <span class="font-medium text-slate-700"><?php echo esc_html( $info_source ); ?></span>
                    </div>
                    <div>
                        <span><?php printf( esc_html__( 'Last updated: %s', 'angel-network' ), esc_html( $last_updated ) ); ?></span>
                    </div>
                </div>

                <!-- Business Overview -->
                <div class="card p-8 bg-white border border-slate-200">
                    <h2 class="text-xl font-heading font-bold text-primary mb-4">
                        <?php esc_html_e( 'Business Overview', 'angel-network' ); ?>
                    </h2>
                    <p class="text-sm sm:text-base text-slate-700 leading-relaxed mb-6">
                        <?php echo esc_html( $deal['description'] ); ?>
                    </p>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        <?php esc_html_e( 'The enterprise operates in accordance with Cuban private enterprise regulations (MIPYME framework). Direct capital and strategic partnership support are requested to scale operational capacity and modernize commercial infrastructure.', 'angel-network' ); ?>
                    </p>
                </div>

                <!-- Key Highlights & Milestones -->
                <div class="card p-8 bg-white border border-slate-200">
                    <h2 class="text-xl font-heading font-bold text-primary mb-4">
                        <?php esc_html_e( 'Operating Highlights & Capabilities', 'angel-network' ); ?>
                    </h2>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <?php foreach ( $deal['highlights'] as $highlight ) : ?>
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="text-accent mt-0.5 shrink-0"><?php echo angel_get_svg_icon( 'check', 'w-5 h-5' ); ?></span>
                                <span class="text-xs sm:text-sm text-slate-700 font-medium leading-snug"><?php echo esc_html( $highlight ); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Operational & Partnership Parameters -->
                <div class="card p-8 bg-white border border-slate-200">
                    <h2 class="text-xl font-heading font-bold text-primary mb-4">
                        <?php esc_html_e( 'Proposed Partnership & Capital Structure', 'angel-network' ); ?>
                    </h2>
                    <div class="grid sm:grid-cols-3 gap-4 text-center">
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="block text-xs text-slate-500 font-medium uppercase tracking-wider"><?php esc_html_e( 'Partnership Type', 'angel-network' ); ?></span>
                            <span class="text-sm font-heading font-bold text-primary mt-1 block"><?php echo esc_html( $partnership ); ?></span>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="block text-xs text-slate-500 font-medium uppercase tracking-wider"><?php esc_html_e( 'Operating History', 'angel-network' ); ?></span>
                            <span class="text-sm font-heading font-bold text-primary mt-1 block"><?php echo esc_html( $history ); ?></span>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="block text-xs text-slate-500 font-medium uppercase tracking-wider"><?php esc_html_e( 'Listing Status', 'angel-network' ); ?></span>
                            <span class="text-sm font-heading font-bold text-accent mt-1 block"><?php echo esc_html( $status_label ); ?></span>
                        </div>
                    </div>

                    <div class="mt-4 p-4 rounded-xl bg-slate-50 border border-slate-100 text-xs text-slate-600 leading-relaxed">
                        <span class="font-bold text-slate-800 block mb-1"><?php esc_html_e( 'Use of Funds Objective:', 'angel-network' ); ?></span>
                        <?php echo esc_html( $purpose ); ?>
                    </div>
                </div>

                <!-- Cross-Border & Due Diligence Advisory Box (PDF Page 35 & 37) -->
                <div class="p-6 rounded-2xl bg-slate-900 text-white border border-slate-800 space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-gold animate-pulse"></span>
                        <h4 class="font-heading font-bold text-xs uppercase tracking-wider text-gold">
                            <?php esc_html_e( 'Cross-Border & Sanctions Notice', 'angel-network' ); ?>
                        </h4>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        <?php esc_html_e( 'U.S. persons face comprehensive Cuba-related legal restrictions under OFAC sanctions regulations and generally cannot invest or conduct business in Cuba without specific authorization from the U.S. government. International participants in other jurisdictions must independently verify compliance with local foreign investment, currency-transfer, and tax requirements.', 'angel-network' ); ?>
                    </p>
                    <p class="text-xs text-slate-400">
                        <?php esc_html_e( 'The platform does not verify financial statements, audit claims, or provide investment advice. All discussions and agreements take place directly between parties.', 'angel-network' ); ?>
                    </p>
                </div>
            </div>

            <!-- Right Column: Capital Ask & Contact Actions (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Sticky Capital Ask Card -->
                <div class="card p-6 bg-white border border-slate-200 shadow-md sticky top-24">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-4">
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider"><?php esc_html_e( 'Listing Status', 'angel-network' ); ?></span>
                        <span class="badge badge-accent font-bold"><?php echo esc_html( $status_label ); ?></span>
                    </div>

                    <!-- Capital Parameters (PDF Page 35: Capital Sought, neutral currency) -->
                    <div class="space-y-3 mb-6 bg-slate-50 p-4 rounded-xl border border-slate-100">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-500 font-medium"><?php esc_html_e( 'Capital Sought:', 'angel-network' ); ?></span>
                            <span class="font-heading font-extrabold text-primary text-base">
                                <?php echo esc_html( angel_format_currency( $capital_sought, $currency ) ); ?>
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-xs pt-2 border-t border-slate-200">
                            <span class="text-slate-500 font-medium"><?php esc_html_e( 'Min. Investment:', 'angel-network' ); ?></span>
                            <span class="font-heading font-bold text-slate-800 text-sm">
                                <?php echo esc_html( angel_format_currency( $deal['minimum_investment'], $currency ) ); ?>
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-xs pt-2 border-t border-slate-200">
                            <span class="text-slate-500 font-medium"><?php esc_html_e( 'Transaction Currency:', 'angel-network' ); ?></span>
                            <span class="font-bold text-slate-700 text-xs"><?php echo esc_html( $currency ); ?></span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <button 
                            type="button"
                            onclick="cinOpenEnquiryModal()"
                            id="cin-sidebar-enquiry-btn"
                            class="btn btn-accent btn-lg w-full font-bold shadow-md hover:shadow-lg transition-all text-center cursor-pointer"
                        >
                            <?php esc_html_e( 'Request Introduction', 'angel-network' ); ?>
                        </button>

                        <?php if ( is_user_logged_in() && $is_user_inv ) : ?>
                            <button 
                                type="button" 
                                onclick="cinToggleSingleBookmark(<?php echo esc_attr( $deal_id ); ?>)"
                                id="cin-sidebar-bookmark-btn" 
                                class="btn btn-outline-primary btn-sm w-full font-bold text-center flex items-center justify-center gap-2 cursor-pointer transition-all <?php echo $is_deal_saved ? 'bg-primary/5 text-accent border-accent' : ''; ?>"
                            >
                                <svg id="cin-sidebar-bookmark-icon" class="w-4 h-4 <?php echo $is_deal_saved ? 'text-accent fill-accent' : 'text-slate-600 fill-none'; ?>" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                                <span id="cin-sidebar-bookmark-label"><?php echo $is_deal_saved ? esc_html__( 'Saved in Dealflow', 'angel-network' ) : esc_html__( 'Save Opportunity', 'angel-network' ); ?></span>
                            </button>
                        <?php endif; ?>

                        <a 
                            href="<?php echo esc_url( home_url( '/risk-disclosure/' ) ); ?>" 
                            class="btn btn-outline-primary btn-sm w-full text-center"
                        >
                            <?php esc_html_e( 'Read Risk Disclosure', 'angel-network' ); ?>
                        </a>
                    </div>

                    <!-- Report Notice (PDF Page 35) -->
                    <div class="pt-4 mt-4 border-t border-slate-100 text-center">
                        <a 
                            href="<?php echo esc_url( home_url( '/contact/?subject=' . urlencode( 'Listing Notice: ' . $deal['title'] ) ) ); ?>" 
                            class="text-[11px] text-slate-400 hover:text-red-600 transition-colors"
                        >
                            <?php esc_html_e( 'Report misleading claim or conflict →', 'angel-network' ); ?>
                        </a>
                    </div>
                </div>

                <!-- Business Leadership Box -->
                <div class="card p-6 bg-white border border-slate-200">
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">
                        <?php esc_html_e( 'Enterprise Ownership', 'angel-network' ); ?>
                    </h3>
                    <p class="text-sm font-heading font-bold text-primary mb-1">
                        <?php echo esc_html( $deal['company_name'] ); ?>
                    </p>
                    <p class="text-xs text-slate-500 mb-3"><?php echo esc_html( $deal['owner_title'] ); ?></p>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        <?php esc_html_e( 'Registered private commercial enterprise in Cuba. Operational details and supporting materials are provided for evaluation at the business owner’s discretion.', 'angel-network' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================================= -->
<!-- INVESTOR ENQUIRY MODAL                                    -->
<!-- ========================================================= -->
<div id="cin-enquiry-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs hidden" role="dialog" aria-modal="true" aria-labelledby="cin-modal-title">
    <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden border border-slate-200 animate-fadeIn">
        <!-- Modal Header -->
        <div class="p-5 border-b border-slate-100 flex items-start justify-between bg-slate-50/50">
            <div>
                <span class="text-[11px] font-bold text-accent uppercase tracking-wider block mb-0.5">
                    <?php esc_html_e( 'Direct Deal Inquiry', 'angel-network' ); ?>
                </span>
                <h3 id="cin-modal-title" class="text-lg font-heading font-bold text-slate-900">
                    <?php esc_html_e( 'Contact Business Owner', 'angel-network' ); ?>
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">
                    <?php echo esc_html( $deal['title'] ); ?> &bull; <?php echo esc_html( $deal['company_name'] ); ?>
                </p>
            </div>
            <button type="button" onclick="cinCloseEnquiryModal()" class="text-slate-400 hover:text-slate-700 p-1.5 rounded-lg hover:bg-slate-100 transition-colors" aria-label="<?php esc_attr_e( 'Close', 'angel-network' ); ?>">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal Body / Form -->
        <form id="cin-enquiry-form" onsubmit="cinSubmitEnquiry(event)" class="p-6 space-y-4">
            <div id="cin-enquiry-alert" class="hidden p-3 rounded-xl text-xs font-medium"></div>

            <?php if ( is_user_logged_in() ) : 
                $curr_user = wp_get_current_user();
                $inv_name  = trim( $curr_user->first_name . ' ' . $curr_user->last_name ) ?: $curr_user->display_name;
            ?>
                <!-- Investor Info Preview Strip -->
                <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between text-xs text-slate-600">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 block"><?php esc_html_e( 'Inquiring As', 'angel-network' ); ?></span>
                        <span class="font-bold text-slate-800"><?php echo esc_html( $inv_name ); ?></span>
                    </div>
                    <span class="badge badge-accent text-[10px] font-bold"><?php esc_html_e( 'Registered Investor', 'angel-network' ); ?></span>
                </div>
            <?php endif; ?>

            <div>
                <label for="cin-enquiry-subject" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    <?php esc_html_e( 'Subject', 'angel-network' ); ?> <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="cin-enquiry-subject" 
                    name="subject" 
                    required 
                    value="<?php echo esc_attr( sprintf( __( 'Investment Inquiry: %s', 'angel-network' ), $deal['title'] ) ); ?>" 
                    class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs sm:text-sm font-medium focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none"
                >
            </div>

            <div>
                <label for="cin-enquiry-message" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    <?php esc_html_e( 'Message to Founder', 'angel-network' ); ?> <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="cin-enquiry-message" 
                    name="message" 
                    rows="4" 
                    required 
                    placeholder="<?php esc_attr_e( 'Introduce yourself, state your investment interest, proposed capital range, and any preliminary questions...', 'angel-network' ); ?>"
                    class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs sm:text-sm font-medium focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none resize-none"
                ></textarea>
                <p class="text-[11px] text-slate-400 mt-1">
                    <?php esc_html_e( 'Please provide clear, professional context. Do not include sensitive banking details.', 'angel-network' ); ?>
                </p>
            </div>

            <div class="text-[11px] text-slate-400 leading-relaxed bg-amber-50/60 p-2.5 rounded-lg border border-amber-100 text-amber-800">
                <?php esc_html_e( 'Submitting an inquiry does not constitute a commitment. All discussions occur directly between parties.', 'angel-network' ); ?>
            </div>

            <!-- Modal Footer -->
            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-3">
                <button 
                    type="button" 
                    onclick="cinCloseEnquiryModal()" 
                    class="px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors"
                >
                    <?php esc_html_e( 'Cancel', 'angel-network' ); ?>
                </button>
                <button 
                    type="submit" 
                    id="cin-enquiry-submit-btn" 
                    class="btn btn-accent btn-sm font-bold shadow-md hover:shadow-lg transition-all flex items-center gap-2"
                >
                    <span id="cin-enquiry-submit-label"><?php esc_html_e( 'Send Enquiry', 'angel-network' ); ?></span>
                    <svg id="cin-enquiry-spinner" class="w-4 h-4 animate-spin hidden" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let cinIsDealSaved = <?php echo $is_deal_saved ? 'true' : 'false'; ?>;
const cinDealId = <?php echo esc_js( $deal_id ); ?>;
const cinIsLoggedIn = <?php echo is_user_logged_in() ? 'true' : 'false'; ?>;
const cinIsInvestor = <?php echo $is_user_inv ? 'true' : 'false'; ?>;
const cinRestNonce = '<?php echo esc_js( wp_create_nonce( 'wp_rest' ) ); ?>';
const cinRestBase = '<?php echo esc_js( rest_url( 'cin/v1' ) ); ?>';

function cinToggleSingleBookmark(dealId) {
    if (!cinIsLoggedIn) {
        window.location.href = '<?php echo esc_url( home_url( '/login/?redirect_to=' . urlencode( $_SERVER['REQUEST_URI'] ?? '' ) ) ); ?>';
        return;
    }
    if (!cinIsInvestor) {
        alert('<?php echo esc_js( __( 'Only registered investors can save opportunities.', 'angel-network' ) ); ?>');
        return;
    }

    const method = cinIsDealSaved ? 'DELETE' : 'POST';
    const headerBtn = document.getElementById('cin-header-bookmark-btn');
    const sidebarBtn = document.getElementById('cin-sidebar-bookmark-btn');

    if (headerBtn) headerBtn.style.opacity = '0.5';
    if (sidebarBtn) sidebarBtn.style.opacity = '0.5';

    fetch(`${cinRestBase}/opportunities/${dealId}/save`, {
        method: method,
        headers: {
            'X-WP-Nonce': cinRestNonce,
            'Content-Type': 'application/json'
        }
    })
    .then(r => r.json())
    .then(data => {
        if (data.is_saved !== undefined) {
            cinIsDealSaved = !!data.is_saved;
        } else if (data.saved !== undefined) {
            cinIsDealSaved = !!data.saved;
        } else {
            cinIsDealSaved = !cinIsDealSaved;
        }
        updateBookmarkUI();
    })
    .catch(err => {
        console.error('Bookmark error:', err);
        alert('Could not update saved status. Please try again.');
    })
    .finally(() => {
        if (headerBtn) headerBtn.style.opacity = '1';
        if (sidebarBtn) sidebarBtn.style.opacity = '1';
    });
}

function updateBookmarkUI() {
    const headerIcon = document.getElementById('cin-header-bookmark-icon');
    const headerLabel = document.getElementById('cin-header-bookmark-label');
    const headerBtn = document.getElementById('cin-header-bookmark-btn');
    const sidebarIcon = document.getElementById('cin-sidebar-bookmark-icon');
    const sidebarLabel = document.getElementById('cin-sidebar-bookmark-label');
    const sidebarBtn = document.getElementById('cin-sidebar-bookmark-btn');

    const labelText = cinIsDealSaved ? '<?php echo esc_js( __( 'Saved in Dealflow', 'angel-network' ) ); ?>' : '<?php echo esc_js( __( 'Save Opportunity', 'angel-network' ) ); ?>';

    if (headerLabel) headerLabel.textContent = labelText;
    if (sidebarLabel) sidebarLabel.textContent = labelText;

    if (headerIcon) {
        if (cinIsDealSaved) {
            headerIcon.classList.remove('text-white', 'fill-none');
            headerIcon.classList.add('text-accent', 'fill-accent');
            if (headerBtn) headerBtn.classList.add('bg-white/20');
        } else {
            headerIcon.classList.remove('text-accent', 'fill-accent');
            headerIcon.classList.add('text-white', 'fill-none');
            if (headerBtn) headerBtn.classList.remove('bg-white/20');
        }
    }

    if (sidebarIcon) {
        if (cinIsDealSaved) {
            sidebarIcon.classList.remove('text-slate-600', 'fill-none');
            sidebarIcon.classList.add('text-accent', 'fill-accent');
            if (sidebarBtn) sidebarBtn.classList.add('bg-primary/5', 'text-accent', 'border-accent');
        } else {
            sidebarIcon.classList.remove('text-accent', 'fill-accent');
            sidebarIcon.classList.add('text-slate-600', 'fill-none');
            if (sidebarBtn) sidebarBtn.classList.remove('bg-primary/5', 'text-accent', 'border-accent');
        }
    }
}

function cinOpenEnquiryModal() {
    if (!cinIsLoggedIn) {
        window.location.href = '<?php echo esc_url( home_url( '/login/?redirect_to=' . urlencode( $_SERVER['REQUEST_URI'] ?? '' ) ) ); ?>';
        return;
    }
    if (!cinIsInvestor) {
        alert('<?php echo esc_js( __( 'Business owners cannot submit investment enquiries. Please log in with an Investor account.', 'angel-network' ) ); ?>');
        return;
    }
    <?php if ( $is_owner ) : ?>
        alert('<?php echo esc_js( __( 'You cannot submit an inquiry to your own opportunity.', 'angel-network' ) ); ?>');
        return;
    <?php endif; ?>

    const modal = document.getElementById('cin-enquiry-modal');
    if (modal) modal.classList.remove('hidden');
}

function cinCloseEnquiryModal() {
    const modal = document.getElementById('cin-enquiry-modal');
    if (modal) modal.classList.add('hidden');
}

function cinSubmitEnquiry(e) {
    e.preventDefault();
    const alertBox = document.getElementById('cin-enquiry-alert');
    const submitBtn = document.getElementById('cin-enquiry-submit-btn');
    const spinner = document.getElementById('cin-enquiry-spinner');
    const label = document.getElementById('cin-enquiry-submit-label');
    const subject = document.getElementById('cin-enquiry-subject').value.trim();
    const message = document.getElementById('cin-enquiry-message').value.trim();

    if (!subject || !message) {
        alertBox.className = 'p-3 rounded-xl text-xs font-medium bg-red-50 text-red-700 border border-red-200 block';
        alertBox.textContent = 'Please fill in both subject and message fields.';
        return;
    }

    if (message.length < 10) {
        alertBox.className = 'p-3 rounded-xl text-xs font-medium bg-red-50 text-red-700 border border-red-200 block';
        alertBox.textContent = 'Please provide a more detailed inquiry message (at least 10 characters).';
        return;
    }

    submitBtn.disabled = true;
    spinner.classList.remove('hidden');
    label.textContent = 'Sending...';
    alertBox.className = 'hidden';

    fetch(`${cinRestBase}/inquiries`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': cinRestNonce
        },
        body: JSON.stringify({
            opportunity_id: cinDealId,
            subject: subject,
            message: message
        })
    })
    .then(async res => {
        const data = await res.json();
        if (!res.ok) {
            throw new Error(data.message || 'Failed to submit inquiry.');
        }
        return data;
    })
    .then(data => {
        alertBox.className = 'p-3 rounded-xl text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 block';
        alertBox.textContent = 'Your enquiry has been successfully delivered to the business owner! Redirecting to your enquiries dashboard...';
        setTimeout(() => {
            window.location.href = '<?php echo esc_url( home_url( '/investor/enquiries/' ) ); ?>';
        }, 1200);
    })
    .catch(err => {
        alertBox.className = 'p-3 rounded-xl text-xs font-medium bg-red-50 text-red-700 border border-red-200 block';
        alertBox.textContent = err.message || 'An error occurred while submitting your enquiry.';
        submitBtn.disabled = false;
        spinner.classList.add('hidden');
        label.textContent = 'Send Enquiry';
    });
}
</script>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();

