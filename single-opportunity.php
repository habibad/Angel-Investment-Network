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
            <div class="flex items-center gap-3">
                <a 
                    href="<?php echo esc_url( home_url( '/contact/?type=investor&opportunity=' . urlencode( $deal['title'] ) ) ); ?>" 
                    class="btn btn-accent btn-lg font-bold shadow-lg hover:shadow-xl transition-all"
                >
                    <?php esc_html_e( 'Request Business Introduction →', 'angel-network' ); ?>
                </a>
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
                        <a 
                            href="<?php echo esc_url( home_url( '/contact/?type=investor&opportunity=' . urlencode( $deal['title'] ) ) ); ?>" 
                            class="btn btn-accent btn-lg w-full font-bold shadow-md hover:shadow-lg transition-all text-center"
                        >
                            <?php esc_html_e( 'Request Introduction', 'angel-network' ); ?>
                        </a>
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

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
