<?php
/**
 * Front Page Template - Light Editorial Redesign
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Fetch Data via Phase 1 Abstraction Gateway
$opportunities = angel_get_opportunities();
$lead_deal     = isset( $opportunities[0] ) ? $opportunities[0] : null;
$supporting_deals = array_slice( $opportunities, 1, 2 );
?>

<!-- 1. Hero: Asymmetric Editorial Composition -->
<?php get_template_part( 'template-parts/hero/hero-home' ); ?>

<!-- 2. Featured Opportunities: Curated Visual Showcase (Not identical 3-card grid) -->
<section id="opportunities" class="py-24 lg:py-32 bg-brand-canvas border-b border-brand-border">
    <div class="container mx-auto">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="max-w-xl">
                <p class="text-xs font-sans font-semibold uppercase tracking-widest-plus text-brand-teal mb-3">
                    <?php esc_html_e( 'Featured Opportunities', 'angel-network' ); ?>
                </p>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-brand-dark leading-[1.15] tracking-tight">
                    Discover High-Potential<br>
                    <span class="italic font-normal">Investment Opportunities</span>
                </h2>
                <p class="text-sm font-sans text-brand-muted leading-relaxed mt-3">
                    <?php esc_html_e( 'A curated selection of verified growth ventures actively raising seed and expansion capital.', 'angel-network' ); ?>
                </p>
            </div>

            <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="btn-link text-xs mt-6 md:mt-0">
                <span><?php esc_html_e( 'View All Opportunities', 'angel-network' ); ?></span>
                <span>→</span>
            </a>
        </div>

        <!-- Curated Showcase with Editorial Hierarchy -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- First Opportunity: Dominant Lead Feature -->
            <?php if ( $lead_deal ) : ?>
                <?php get_template_part( 'template-parts/cards/card-opportunity', null, [ 'deal' => $lead_deal, 'is_lead' => true ] ); ?>
            <?php endif; ?>

            <!-- Second and Third Opportunities: Balanced Companion Cards -->
            <?php foreach ( $supporting_deals as $deal ) : ?>
                <div class="lg:col-span-6 flex">
                    <?php get_template_part( 'template-parts/cards/card-opportunity', null, [ 'deal' => $deal, 'is_lead' => false ] ); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 3. Trust & Media: Minimal Horizontal Credibility Strip -->
<?php get_template_part( 'template-parts/sections/trust-marquee' ); ?>

<!-- 4. Community: Editorial Text + Two Image-Led Audience Panels -->
<?php get_template_part( 'template-parts/sections/dual-pathway' ); ?>

<!-- 5. Impact: The Single Dark Contrast Statement -->
<?php get_template_part( 'template-parts/sections/impact' ); ?>

<!-- 6. Industry Sectors: Editorial Investment-Sector Browser -->
<?php get_template_part( 'template-parts/sections/industry-matrix' ); ?>

<!-- 7. Testimonials: Human Editorial Stories -->
<?php get_template_part( 'template-parts/sections/testimonials' ); ?>

<!-- 8. Final CTA: Calm, Aspirational Editorial Conclusion -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
