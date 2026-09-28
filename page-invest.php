<?php
/**
 * Template Name: Invest Hub / Explore Opportunities
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$opportunities = angel_get_opportunities();
?>

<!-- Subpage Hero -->
<?php 
get_template_part( 'template-parts/hero/hero-page', null, [
    'title'           => esc_html__( 'Explore Business Opportunities in Cuba', 'angel-network' ),
    'subtitle'        => esc_html__( 'Discover Cuban businesses seeking capital, strategic expertise, and international partnerships across a range of sectors.', 'angel-network' ),
    'badge'           => esc_html__( 'Cuba Investment Opportunities', 'angel-network' ),
    'breadcrumb_text' => esc_html__( 'Investment Opportunities', 'angel-network' ),
] ); 
?>

<!-- Opportunities Discovery Hub -->
<section id="opportunities" class="py-16 bg-slate-50">
    <div class="container mx-auto">
        <!-- Pre-Launch Notice Banner -->
        <div class="mb-10 p-6 rounded-2xl bg-white border border-slate-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-accent-50 text-accent flex items-center justify-center shrink-0">
                    <?php echo angel_get_svg_icon( 'sparkles', 'w-6 h-6' ); ?>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="badge badge-accent text-[11px] font-bold"><?php esc_html_e( 'Launch Phase', 'angel-network' ); ?></span>
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider"><?php esc_html_e( 'Initial Listing Review', 'angel-network' ); ?></span>
                    </div>
                    <h2 class="text-base sm:text-lg font-heading font-bold text-primary">
                        <?php esc_html_e( 'Business Listings Currently Under Review', 'angel-network' ); ?>
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 mt-1 max-w-2xl leading-relaxed">
                        <?php esc_html_e( 'We are onboarding Cuban enterprises and reviewing business profiles for completeness and clarity. Published summaries represent opportunities supplied directly by business owners.', 'angel-network' ); ?>
                    </p>
                </div>
            </div>
            <div class="shrink-0 flex items-center gap-3">
                <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="btn btn-accent btn-sm font-bold whitespace-nowrap">
                    <?php esc_html_e( 'Submit Your Business →', 'angel-network' ); ?>
                </a>
            </div>
        </div>

        <!-- Filter Controls Bar -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm mb-12">
            <div class="grid md:grid-cols-12 gap-4 items-center">
                <!-- Search Box -->
                <div class="md:col-span-6">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                            <?php echo angel_get_svg_icon( 'search', 'w-4 h-4' ); ?>
                        </span>
                        <input 
                            type="text" 
                            id="opportunity-search-input" 
                            placeholder="<?php esc_attr_e( 'Search opportunities by sector, location, keyword...', 'angel-network' ); ?>" 
                            class="form-input pl-10"
                        >
                    </div>
                </div>

                <!-- Sector Filter Dropdown or Quick Pills -->
                <div class="md:col-span-6 flex items-center justify-start md:justify-end gap-2 overflow-x-auto pb-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider hidden lg:inline"><?php esc_html_e( 'Sector:', 'angel-network' ); ?></span>
                    <button type="button" data-filter-sector="all" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-primary text-white border-primary shadow-xs">
                        <?php esc_html_e( 'All Sectors', 'angel-network' ); ?>
                    </button>
                    <button type="button" data-filter-sector="agriculture" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                        <?php esc_html_e( 'Agriculture', 'angel-network' ); ?>
                    </button>
                    <button type="button" data-filter-sector="cleantech" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                        <?php esc_html_e( 'Clean Energy', 'angel-network' ); ?>
                    </button>
                    <button type="button" data-filter-sector="logistics" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                        <?php esc_html_e( 'Logistics', 'angel-network' ); ?>
                    </button>
                    <button type="button" data-filter-sector="manufacturing" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                        <?php esc_html_e( 'Manufacturing', 'angel-network' ); ?>
                    </button>
                </div>
            </div>
        </div>

        <!-- Opportunities Grid -->
        <div id="opportunities-grid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ( $opportunities as $deal ) : ?>
                <?php get_template_part( 'template-parts/cards/card-opportunity', null, [ 'deal' => $deal ] ); ?>
            <?php endforeach; ?>
        </div>

        <!-- Empty State -->
        <div id="filter-empty-state" class="hidden py-16 text-center bg-white rounded-2xl border border-slate-200 p-8 max-w-md mx-auto mt-6">
            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mx-auto mb-4">
                <?php echo angel_get_svg_icon( 'search', 'w-6 h-6' ); ?>
            </div>
            <h3 class="text-base font-heading font-bold text-primary mb-2"><?php esc_html_e( 'No Matching Opportunities', 'angel-network' ); ?></h3>
            <p class="text-xs text-slate-500 mb-4"><?php esc_html_e( 'Try adjusting your search query or selecting a different sector filter.', 'angel-network' ); ?></p>
            <button type="button" onclick="document.querySelector('[data-filter-sector=\'all\']').click(); document.getElementById('opportunity-search-input').value = '';" class="btn btn-secondary btn-sm">
                <?php esc_html_e( 'Reset Filters', 'angel-network' ); ?>
            </button>
        </div>
    </div>
</section>

<!-- Investor Eligibility Section (PDF Page 8-9 Jurisdiction-Neutral) -->
<section id="eligibility" class="py-16 bg-white border-t border-slate-200">
    <span id="criteria" class="sr-only"></span><!-- Anchor alias for legacy links -->
    <div class="container mx-auto max-w-4xl">
        <div class="text-center mb-10">
            <span class="badge badge-primary mb-2"><?php esc_html_e( 'Investor Eligibility', 'angel-network' ); ?></span>
            <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-primary">
                <?php esc_html_e( 'Who Can Explore Investment Opportunities?', 'angel-network' ); ?>
            </h2>
        </div>

        <div class="space-y-6 text-sm text-slate-600 leading-relaxed bg-slate-50 p-8 rounded-2xl border border-slate-200">
            <p class="text-base font-medium text-slate-800">
                <?php esc_html_e( 'Investment Network Cuba is intended for adults and organizations legally permitted to consider private business opportunities in their jurisdiction. Access to a listing does not mean that a user is legally eligible or financially qualified to invest.', 'angel-network' ); ?>
            </p>

            <p class="font-semibold text-primary">
                <?php esc_html_e( 'Before pursuing an opportunity, investors must:', 'angel-network' ); ?>
            </p>

            <ul class="list-disc pl-6 space-y-2 text-slate-700">
                <li><?php esc_html_e( 'Be at least 18 years old and have the legal capacity to enter into agreements.', 'angel-network' ); ?></li>
                <li><?php esc_html_e( 'Confirm that the proposed activity is permitted under the laws applicable to them.', 'angel-network' ); ?></li>
                <li><?php esc_html_e( 'Consider cross-border investment, sanctions, currency-transfer and foreign-ownership restrictions.', 'angel-network' ); ?></li>
                <li><?php esc_html_e( 'Conduct independent financial, legal, tax and operational due diligence.', 'angel-network' ); ?></li>
                <li><?php esc_html_e( 'Obtain qualified professional advice before entering into an investment agreement.', 'angel-network' ); ?></li>
            </ul>

            <p class="text-xs text-slate-500 pt-2 border-t border-slate-200">
                <?php esc_html_e( 'Investment Network Cuba does not determine a user’s legal eligibility, recommend investments or guarantee any opportunity.', 'angel-network' ); ?>
            </p>

            <!-- Cross-Border & Sanctions Alert Box -->
            <div class="p-4 bg-white rounded-xl border-l-4 border-gold border border-slate-200 text-xs text-slate-700 space-y-1.5">
                <p class="font-bold text-primary"><?php esc_html_e( 'Notice Regarding Cross-Border Restrictions (U.S. & International):', 'angel-network' ); ?></p>
                <p>
                    <?php esc_html_e( 'Persons subject to United States jurisdiction face Cuba-related restrictions under U.S. sanctions regulations (OFAC) and generally cannot invest or conduct business in Cuba without specific authorization. International investors must independently determine that participation complies with their domestic laws and foreign investment regulations.', 'angel-network' ); ?>
                </p>
            </div>

            <div class="pt-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                <span class="text-xs text-slate-500">
                    <?php esc_html_e( 'Eligibility depends on your jurisdiction and individual circumstances.', 'angel-network' ); ?>
                </span>
                <div class="flex items-center gap-4">
                    <a href="<?php echo esc_url( home_url( '/risk-disclosure/' ) ); ?>" class="text-xs font-bold text-primary hover:text-accent transition-colors">
                        <?php esc_html_e( 'Read the Investment Notice →', 'angel-network' ); ?>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-xs font-semibold text-slate-600 hover:text-primary transition-colors">
                        <?php esc_html_e( 'Support →', 'angel-network' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
