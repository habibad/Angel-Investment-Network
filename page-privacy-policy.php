<?php
/**
 * Template Name: Privacy Policy
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$title    = get_the_title() ? get_the_title() : esc_html__( 'Privacy Policy', 'angel-network' );
$badge    = esc_html__( 'Legal & Governance', 'angel-network' );
$subtitle = esc_html__( 'How Cuba Investment Network collects, uses, and safeguards personal and business information.', 'angel-network' );

get_template_part( 'template-parts/hero/hero-page', null, [
    'title'           => $title,
    'subtitle'        => $subtitle,
    'badge'           => $badge,
    'breadcrumb_text' => esc_html__( 'Privacy Policy', 'angel-network' ),
    'bg_image'        => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1600&q=80',
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
                echo function_exists( 'angel_get_privacy_policy_content' ) ? angel_get_privacy_policy_content() : '';
            }
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
