<?php
/**
 * Template Name: Invest Hub
 *
 * @package AngelNetwork
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
    'title'    => esc_html__( 'Explore Verified Investment Dealflow', 'angel-network' ),
    'subtitle' => esc_html__( 'Discover high-potential early-stage companies raising seed and growth capital across technology, healthcare, and industrial sectors.', 'angel-network' ),
    'badge'    => esc_html__( 'Accredited Dealflow Hub', 'angel-network' ),
    'bg_image' => 'https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<!-- Opportunities Marketplace Hub -->
<section class="py-16 bg-slate-50">
    <div class="container mx-auto">
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
                            placeholder="<?php esc_attr_e( 'Search deals by keyword, location, company...', 'angel-network' ); ?>" 
                            class="form-input pl-10"
                        >
                    </div>
                </div>

                <!-- Sector Filter Dropdown or Quick Pills -->
                <div class="md:col-span-6 flex items-center justify-start md:justify-end gap-2 overflow-x-auto">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider hidden lg:inline">Sector:</span>
                    <button type="button" data-filter-sector="all" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-primary text-white border-primary shadow-xs">
                        All
                    </button>
                    <button type="button" data-filter-sector="cleantech" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                        CleanTech
                    </button>
                    <button type="button" data-filter-sector="ai" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                        AI / ML
                    </button>
                    <button type="button" data-filter-sector="healthcare" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                        HealthTech
                    </button>
                    <button type="button" data-filter-sector="fintech" class="px-3.5 py-2 rounded-lg text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                        FinTech
                    </button>
                </div>
            </div>
        </div>

        <!-- Deals Grid -->
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
            <h3 class="text-base font-heading font-bold text-primary mb-2">No Deals Found</h3>
            <p class="text-xs text-slate-500 mb-4">Try adjusting your keyword search or clear sector filters.</p>
            <button type="button" onclick="document.querySelector('[data-filter-sector=\'all\']').click(); document.getElementById('opportunity-search-input').value = '';" class="btn btn-secondary btn-sm">
                Reset Filters
            </button>
        </div>
    </div>
</section>

<!-- Investor Criteria & Accreditation Section -->
<section id="criteria" class="py-16 bg-white">
    <div class="container mx-auto max-w-4xl">
        <div class="text-center mb-10">
            <span class="badge badge-primary mb-2"><?php esc_html_e( 'Compliance & Eligibility', 'angel-network' ); ?></span>
            <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-primary">
                Who Can Invest on Angel Network?
            </h2>
        </div>

        <div class="space-y-6 text-sm text-slate-600 leading-relaxed bg-slate-50 p-8 rounded-2xl border border-slate-200">
            <p>
                Under Canadian securities regulations, opportunities listed on the Angel Investment Network are private placements offered pursuant to exemptions from prospectus requirements (such as the <strong>Accredited Investor Exemption</strong> under National Instrument 45-106).
            </p>
            <p>
                An individual is generally considered an accredited investor if they satisfy one of the following criteria:
            </p>
            <ul class="list-disc pl-6 space-y-2 text-slate-700">
                <li>Net financial assets (cash and securities excluding primary residence) exceeding <strong>CA$ 1,000,000</strong>; OR</li>
                <li>Net income before taxes exceeding <strong>CA$ 200,000</strong> (or CA$ 300,000 combined with spouse) in each of the two most recent calendar years with reasonable expectation of the same in the current year; OR</li>
                <li>Net assets (including real estate) of at least <strong>CA$ 5,000,000</strong>.</li>
            </ul>
            <div class="pt-4 border-t border-slate-200 flex items-center justify-between">
                <span class="text-xs text-slate-500">Need clarification on your provincial qualification status?</span>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-xs font-semibold text-primary hover:underline">Contact Compliance Desk →</a>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
