<?php
/**
 * Front Page Template
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Fetch Data via Phase 1 Abstraction Gateway
$opportunities = angel_get_opportunities();
$investors     = angel_get_investors();
$testimonials  = angel_get_testimonials();
$stats         = angel_get_stats();
$articles      = angel_get_blog_posts();
?>

<!-- 1. Hero Section -->
<?php get_template_part( 'template-parts/hero/hero-home' ); ?>

<!-- 2. Trust & Media Marquee -->
<?php get_template_part( 'template-parts/sections/trust-marquee' ); ?>

<!-- 3. Featured Investment Opportunities Grid with Filter Engine -->
<section id="opportunities" class="py-20 bg-slate-50">
    <div class="container mx-auto">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <span class="badge badge-accent mb-3"><?php esc_html_e( 'Vetted Dealflow', 'angel-network' ); ?></span>
                <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary">
                    <?php esc_html_e( 'Featured Investment Opportunities', 'angel-network' ); ?>
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2 max-w-xl">
                    <?php esc_html_e( 'Browse verified seed and growth-stage startup pitches actively raising capital across North America.', 'angel-network' ); ?>
                </p>
            </div>

            <!-- Search Bar Input -->
            <div class="mt-4 md:mt-0 w-full md:w-72">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                        <?php echo angel_get_svg_icon( 'search', 'w-4 h-4' ); ?>
                    </span>
                    <input 
                        type="text" 
                        id="opportunity-search-input" 
                        placeholder="<?php esc_attr_e( 'Search by sector, keyword...', 'angel-network' ); ?>" 
                        class="form-input pl-9 text-xs"
                    >
                </div>
            </div>
        </div>

        <!-- Quick Filter Pills -->
        <div class="flex flex-wrap items-center gap-2 mb-10 overflow-x-auto pb-2">
            <button type="button" data-filter-sector="all" class="px-4 py-2 rounded-full text-xs font-heading font-bold border transition-colors cursor-pointer bg-primary text-white border-primary shadow-xs">
                <?php esc_html_e( 'All Sectors', 'angel-network' ); ?>
            </button>
            <button type="button" data-filter-sector="cleantech" class="px-4 py-2 rounded-full text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                <?php esc_html_e( 'CleanTech & Energy', 'angel-network' ); ?>
            </button>
            <button type="button" data-filter-sector="ai" class="px-4 py-2 rounded-full text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                <?php esc_html_e( 'Artificial Intelligence', 'angel-network' ); ?>
            </button>
            <button type="button" data-filter-sector="healthcare" class="px-4 py-2 rounded-full text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                <?php esc_html_e( 'Healthcare / MedTech', 'angel-network' ); ?>
            </button>
            <button type="button" data-filter-sector="fintech" class="px-4 py-2 rounded-full text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                <?php esc_html_e( 'FinTech', 'angel-network' ); ?>
            </button>
            <button type="button" data-filter-sector="agriculture" class="px-4 py-2 rounded-full text-xs font-heading font-bold border transition-colors cursor-pointer bg-white text-slate-700 border-slate-200 hover:border-slate-300">
                <?php esc_html_e( 'AgTech & Food', 'angel-network' ); ?>
            </button>
        </div>

        <!-- Opportunities Grid -->
        <div id="opportunities-grid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ( $opportunities as $deal ) : ?>
                <?php get_template_part( 'template-parts/cards/card-opportunity', null, [ 'deal' => $deal ] ); ?>
            <?php endforeach; ?>
        </div>

        <!-- Empty State (Shown via JS when search yields 0) -->
        <div id="filter-empty-state" class="hidden py-16 text-center bg-white rounded-2xl border border-slate-200 p-8 max-w-md mx-auto mt-6">
            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mx-auto mb-4">
                <?php echo angel_get_svg_icon( 'search', 'w-6 h-6' ); ?>
            </div>
            <h3 class="text-base font-heading font-bold text-primary mb-2">No Matching Opportunities</h3>
            <p class="text-xs text-slate-500 mb-4">Try clearing your search query or selecting a different industry sector filter.</p>
            <button type="button" onclick="document.querySelector('[data-filter-sector=\'all\']').click(); document.getElementById('opportunity-search-input').value = '';" class="btn btn-secondary btn-sm">
                Reset All Filters
            </button>
        </div>

        <!-- Hub Action -->
        <div class="mt-14 text-center">
            <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="btn btn-primary btn-lg">
                <span><?php esc_html_e( 'View All Investment Pitches →', 'angel-network' ); ?></span>
            </a>
        </div>
    </div>
</section>

<!-- 4. Platform Aggregate Key Statistics Bar -->
<section class="py-16 bg-primary text-white">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center divide-y lg:divide-y-0 lg:divide-x divide-white/10">
            <?php foreach ( $stats as $stat ) : ?>
                <div class="pt-6 lg:pt-0 px-4">
                    <p class="text-3xl sm:text-4xl lg:text-5xl font-heading font-extrabold text-white tracking-tight mb-2">
                        <?php echo esc_html( $stat['value'] ); ?>
                    </p>
                    <p class="text-sm font-semibold text-accent mb-1"><?php echo esc_html( $stat['label'] ); ?></p>
                    <p class="text-xs text-slate-300"><?php echo esc_html( $stat['sub'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 5. Dual Pathway Section (For Investors vs For Entrepreneurs) -->
<?php get_template_part( 'template-parts/sections/dual-pathway' ); ?>

<!-- 6. Verified Investor Showcase -->
<section id="investors" class="py-20 bg-white">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="badge badge-primary mb-3"><?php esc_html_e( 'Accredited Network', 'angel-network' ); ?></span>
                <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary">
                    <?php esc_html_e( 'Meet Active Private Angels', 'angel-network' ); ?>
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2 max-w-xl">
                    <?php esc_html_e( 'Connect with verified individuals, family offices, and lead investors actively seeking high-conviction allocations.', 'angel-network' ); ?>
                </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="mt-4 md:mt-0 text-sm font-semibold text-primary hover:text-accent flex items-center gap-1.5 transition-colors">
                <span><?php esc_html_e( 'Pitch to Our Network', 'angel-network' ); ?></span>
                <?php echo angel_get_svg_icon( 'arrow-right', 'w-4 h-4' ); ?>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ( $investors as $investor ) : ?>
                <?php get_template_part( 'template-parts/cards/card-investor', null, [ 'investor' => $investor ] ); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 7. Industry Matrix Section -->
<?php get_template_part( 'template-parts/sections/industry-matrix' ); ?>

<!-- 8. Testimonials & Verified Case Studies -->
<?php get_template_part( 'template-parts/sections/testimonials' ); ?>

<!-- 9. Institutional Benefits & Diligence Standards -->
<?php get_template_part( 'template-parts/sections/benefits' ); ?>

<!-- 10. Latest Venture Insights & Market Analysis -->
<section class="py-20 bg-white">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="badge badge-primary mb-3"><?php esc_html_e( 'Research Desk', 'angel-network' ); ?></span>
                <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary">
                    <?php esc_html_e( 'Venture Insights & Market Analysis', 'angel-network' ); ?>
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2 max-w-xl">
                    <?php esc_html_e( 'Quarterly valuation benchmarks, SAFE term sheet guidance, and sector theses from leading angel investment leaders.', 'angel-network' ); ?>
                </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="mt-4 md:mt-0 text-sm font-semibold text-primary hover:text-accent flex items-center gap-1.5 transition-colors">
                <span><?php esc_html_e( 'Read All Articles', 'angel-network' ); ?></span>
                <?php echo angel_get_svg_icon( 'arrow-right', 'w-4 h-4' ); ?>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ( $articles as $article ) : ?>
                <?php get_template_part( 'template-parts/cards/card-article', null, [ 'article' => $article ] ); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 11. Conversion CTA Banner -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
