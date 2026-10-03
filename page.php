<?php
/**
 * Default Page Template
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<?php 
$slug = get_post_field( 'post_name', get_post() );
$badge = esc_html__( 'Platform Information', 'angel-network' );
$subtitle = '';

if ( 'privacy-policy' === $slug ) {
    $badge = esc_html__( 'Legal & Governance', 'angel-network' );
    $subtitle = esc_html__( 'How Cuba Investment Network collects, uses, and safeguards personal and business information.', 'angel-network' );
} elseif ( 'terms-and-conditions' === $slug || 'terms-of-service' === $slug ) {
    $badge = esc_html__( 'Terms of Service', 'angel-network' );
    $subtitle = esc_html__( 'Operating rules, platform limitations, and user responsibilities across the network.', 'angel-network' );
} elseif ( 'risk-disclosure' === $slug ) {
    $badge = esc_html__( 'Investment Notice', 'angel-network' );
    $subtitle = esc_html__( 'Important disclosures regarding private business opportunities, illiquidity, and cross-border regulatory considerations.', 'angel-network' );
}

get_template_part( 'template-parts/hero/hero-page', null, [
    'title'    => get_the_title(),
    'subtitle' => $subtitle,
    'badge'    => $badge,
    'bg_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<section class="py-16 sm:py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-6">
            <?php
            $has_content = false;
            while ( have_posts() ) :
                the_post();
                $content = get_the_content();
                if ( ! empty( trim( $content ) ) ) {
                    the_content();
                    $has_content = true;
                }
            endwhile;

            // Fallback content for legal pages if post content is empty in DB
            if ( ! $has_content ) {
                if ( 'privacy-policy' === $slug && function_exists( 'angel_get_privacy_policy_content' ) ) {
                    echo angel_get_privacy_policy_content();
                } elseif ( ( 'terms-and-conditions' === $slug || 'terms-of-service' === $slug ) && function_exists( 'angel_get_terms_content' ) ) {
                    echo angel_get_terms_content();
                } elseif ( 'risk-disclosure' === $slug && function_exists( 'angel_get_risk_disclosure_content' ) ) {
                    echo angel_get_risk_disclosure_content();
                }
            }
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
