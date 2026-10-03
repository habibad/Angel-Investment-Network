<?php
/**
 * Template Name: Risk Disclosure
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$title    = get_the_title() ? get_the_title() : esc_html__( 'Risk Disclosure', 'angel-network' );
$badge    = esc_html__( 'Investment Notice', 'angel-network' );
$subtitle = esc_html__( 'Important disclosures regarding private business opportunities, illiquidity, and cross-border regulatory considerations.', 'angel-network' );

get_template_part( 'template-parts/hero/hero-page', null, [
    'title'           => $title,
    'subtitle'        => $subtitle,
    'badge'           => $badge,
    'breadcrumb_text' => esc_html__( 'Risk Disclosure', 'angel-network' ),
    'bg_image'        => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<section class="py-16 sm:py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <div class="prose prose-slate max-w-none text-slate-700 text-base leading-relaxed space-y-6">
            <?php
            $has_content = false;
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    $raw_content = get_the_content();
                    if ( ! empty( trim( $raw_content ) ) ) {
                        the_content();
                        $has_content = true;
                    }
                }
            }
            if ( ! $has_content ) {
                echo function_exists( 'angel_get_risk_disclosure_content' ) ? angel_get_risk_disclosure_content() : '';
            }
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
